<?php
/**
 * PHP 8.1 changed mysqli's default error-reporting mode to throw
 * mysqli_sql_exception on failure instead of returning false. This app
 * (written for PHP 5.3+) has code that expects the old, silent-false
 * behavior (e.g. application/controllers/Install.php's
 * check_database_connection()), so a failed connection currently causes
 * an uncaught fatal error instead of the app's own error handling.
 *
 * Restoring the legacy mode here (via auto_prepend_file) fixes that
 * without touching the app's own source.
 */
if (function_exists('mysqli_report')) {
    mysqli_report(MYSQLI_REPORT_OFF);
}
