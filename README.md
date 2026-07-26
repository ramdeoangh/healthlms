# Academy LMS

Course-based Learning Management System (CodeIgniter 3), by Creativeitem.

This repo is set up to run locally via Docker while you complete the
application's own web-based installer.

## Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed and running
- Your Academy LMS CodeCanyon purchase code (the installer will ask for it)

## 1. Start the containers

From the project root:

```bash
docker compose up -d --build
```

This starts three services:

| Service      | URL                          | Purpose                                  |
|--------------|-------------------------------|-------------------------------------------|
| `app`        | http://localhost:8080          | The Academy LMS site (PHP 8.1 + Apache)   |
| `db`         | localhost:3307 (from host)     | MySQL 8 database                          |
| `phpmyadmin` | http://localhost:8081          | Optional DB admin UI                      |

Give it a few seconds on first run for MySQL to initialize.

## 2. Run the Academy LMS installer

Open **http://localhost:8080** in your browser. You'll land on Academy's
built-in installer. Have these ready:

- **Purchase code**: your CodeCanyon purchase code
- **Database Name**: `academy`
- **Database Username**: `academy`
- **Database Password**: `academy_pass`
- **Database Host**: `db`  ⚠️ **use the service name `db`, not `localhost`.**
  Getting this wrong is the most common failure at this step (see
  Troubleshooting below) — from inside the `app` container, `localhost`
  means the container itself, not the `db` container, so the connection
  fails.

Follow the wizard through to the end ("Set me up" step), where you'll choose
your site name and admin login (email/password) — you'll use these to log
into `/admin` afterwards.

If you'd rather inspect/import data directly, phpMyAdmin is at
http://localhost:8081 (user `root`, password `rootpass`).

### Using your own local MySQL instead of the `db` container

If you already run MySQL directly on your Windows machine (outside Docker)
and want the installer to use that instead:

- **Database Host**: `host.docker.internal` — this is Docker Desktop's
  special DNS name for reaching the host machine from inside a container.
  `localhost` / `127.0.0.1` will **not** work here, since those resolve to
  the `app` container itself, not your Windows host.
- Make sure your local MySQL is listening on `0.0.0.0` (not only
  `127.0.0.1`) and that the account you're using (e.g. `root`) is allowed
  to connect from a non-localhost address.
- The target database must already exist (the installer doesn't create
  it) — create it first if needed, e.g. `CREATE DATABASE healthlms;`.

## Everyday commands

```bash
docker compose up -d          # start (after the first build)
docker compose down           # stop and remove containers (data volume kept)
docker compose logs -f app    # tail app logs
docker compose build app      # rebuild after Dockerfile/php.ini changes
```

Source files are bind-mounted into the container, so editing files on the
host is reflected immediately — no rebuild needed for PHP/view changes.

## Troubleshooting

**`/install/step3/configure_database` returns a blank HTTP 500.**
This happens when the **Database Host** field points somewhere the `app`
container can't actually reach:

- Using the **`db` container** from this compose file → host must be `db`,
  not `localhost` or `127.0.0.1` (those mean the `app` container itself).
- Using **MySQL running on your Windows machine** instead of the `db`
  container → host must be `host.docker.internal`, not `localhost` or
  `127.0.0.1`, for the same reason — from inside a container, those
  addresses never reach the host machine.

Go back to the install step, fix the host value, and resubmit.

**Still a blank HTTP 500 with a correct, reachable host.** This was an
actual bug in Academy LMS's own installer code, already fixed in this
repo (see below) — if you're seeing it, make sure you're on the latest
commit.

### Enabling verbose PHP errors (turning a blank 500 into a real message)

By default the app runs in CodeIgniter's "production" mode, which hides
PHP errors behind a blank HTTP 500 — deliberately, since stack traces can
leak file paths. To see what's actually failing:

1. In `docker/apache-academy.conf`, add:
   ```apache
   SetEnv CI_ENV development
   ```
   (`docker-compose.yml`'s `environment:` key does **not** work for this —
   under Apache/mod_php, `$_SERVER` is populated from Apache's own env
   table via `SetEnv`, not from the container's OS environment, and
   `index.php` specifically checks `$_SERVER['CI_ENV']`.)
2. `docker compose up -d --build app`
3. Reproduce the failing request — the full PHP error, file, line number,
   and backtrace now render in the response instead of a blank page.
4. Remove the `SetEnv` line and rebuild again once you're done, so error
   detail isn't exposed by default.

If a step still fails after that, check the logs:

```bash
docker compose logs -f app
```

### Bugs already patched here for PHP 8.1

This app was written for PHP 5.3–7.x; a couple of its own behaviors
changed in PHP 8, breaking the installer specifically:

- **`application/controllers/Install.php`**: `check_database_connection()`
  called `mysqli_close($link)` even when `$link` was `false` (i.e. the
  connection had just failed). PHP 8's stricter internal-function typing
  turns that into an uncaught `TypeError`, which is what actually produced
  the blank HTTP 500 — regardless of whether the DB host/credentials were
  right or wrong. Fixed by only closing the link when it's a real
  connection.
- **`docker/mysqli-compat.php`** (loaded via `auto_prepend_file` in
  `docker/php.ini`): PHP 8.1 made `mysqli` throw an uncaught
  `mysqli_sql_exception` on connection failure by default, instead of the
  old behavior of returning `false`. This app's error handling (in
  `Install.php` and elsewhere) assumes the old, silent-`false` behavior.
  The prepended script calls `mysqli_report(MYSQLI_REPORT_OFF)` on every
  request to restore it, without modifying the app's own source.
- **`application/models/Addon_model.php`**: `remove_from_uploads()`
  constructed a `RecursiveDirectoryIterator` on a folder without checking
  it exists first, throwing an uncaught `UnexpectedValueException` (→
  blank 500) whenever the addon's `config.json` couldn't be found at the
  path the code guessed. Fixed by returning early if the directory is
  missing.

### Installing an addon (e.g. the Certificate addon)

Use **Admin panel → Addons → Addon Manager → "+Add New Addon"**, not the
`/admin/addon/install` URL directly (that's just the form's submit
target, not a page).

CodeCanyon addon downloads are a wrapper package, not the addon itself:
```
Some-Addon-Name.zip
├── Addon/
│   └── addon-name.zip   ← upload THIS file, not the outer zip
└── Documentation/
    └── ...
```
Uploading the outer package extracts fine but its `config.json` isn't
where the installer looks for it, which is what surfaces as a 500 (see
the `Addon_model.php` fix above — that's the underlying crash this
mistake triggers). Always upload the inner zip from the `Addon/` folder.

Additionally, some addons' own `sql/updater.php` print output directly,
which can break the app's post-install redirect ("headers already sent").
`docker/php.ini` sets `output_buffering = 4096` to buffer any such stray
output so the redirect still works.

### `application/config/database.php` / `routes.php` after installing

The installer overwrites these two files with your real DB credentials
(`install/step4`) and, on the final step, your live routing config. To
keep real credentials out of git, this repo marks them
`git update-index --skip-worktree` — so once you've installed, git will
stop reporting local changes to them, even though they now hold your
real values. Fresh clones still get the original placeholder versions
(required for the installer itself to run).

If you ever need git to track further changes to these files again
(e.g. adjusting the placeholder template itself):
```bash
git update-index --no-skip-worktree application/config/database.php application/config/routes.php
```

## Notes / things to do after installing

- **`uploads/install.sql` is publicly downloadable** once the app is
  deployed (it's inside the web root). After installation completes,
  delete it or block access to it — it contains your full DB schema.
- Default DB credentials above are for local development only — change
  them (and the MySQL root password) before deploying anywhere shared.
- `docker/php.ini` bumps `upload_max_filesize`, `post_max_size`,
  `max_execution_time` per Academy's own admin guide, so video-lesson
  uploads don't get truncated.
- YouTube/Vimeo lesson embedding requires API keys configured later in
  **Admin → Settings → System Settings**.
