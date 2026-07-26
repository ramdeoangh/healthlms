<?php

$CI = get_instance();
$CI->load->database();
$CI->load->dbforge();


// 2. CREATE TABLE `announcements` IF NOT EXISTS

$announcements = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
    ),
    'course_ids' => array(
        'type' => 'TEXT',
        'null' => TRUE
    ),
    'title' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => TRUE
    ),
    'description' => array(
        'type' => 'LONGTEXT',
        'null' => TRUE
    ),
    'attachment' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'null' => TRUE
    ),
    'is_pinned' => array(
        'type' => 'TINYINT',
        'constraint' => 1,
        'default' => 0
    ),
    'created_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    )
);

if (!$CI->db->table_exists('announcements')) {

    $CI->dbforge->add_field($announcements);
    $CI->dbforge->add_key('id', TRUE);

    $attributes = array(
        'ENGINE' => 'InnoDB',
        'DEFAULT CHARACTER SET' => 'utf8',
        'COLLATE' => 'utf8_unicode_ci'
    );

    $CI->dbforge->create_table('announcements', TRUE, $attributes);
}

// 3. CREATE TABLE `announcement_courses` IF NOT EXISTS
$announcement_courses = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
    ),
    'announcement_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'null' => TRUE
    ),
    'course_id' => array(
        'type' => 'INT',
        'constraint' => 11,
        'null' => TRUE
    ),
   'created_at' => array(
    'type' => 'VARCHAR',
    'constraint' => '100',
    'default' => null,
    'null' => TRUE
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    )
);

if (! $CI->db->table_exists('announcement_courses')) {

    $CI->dbforge->add_field($announcement_courses);
    $CI->dbforge->add_key('id', TRUE);

    $attributes = array(
        'ENGINE' => 'InnoDB',
        'DEFAULT CHARACTER SET' => 'utf8',
        'COLLATE' => 'utf8_unicode_ci'
    );

    $CI->dbforge->create_table('announcement_courses', TRUE, $attributes);
}

// 4. CREATE TABLE `community_posts` IF NOT EXISTS
$community_posts = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
    ),
    'user_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'description' => array(
        'type' => 'LONGTEXT',
        'default' => null,
        'null' => TRUE
    ),
    'file' => array(
        'type' => 'VARCHAR',
        'constraint' => 255,
        'default' => null,
        'null' => TRUE
    ),
    'file_type' => array(
        'type' => 'ENUM("image","video")',
        'default' => null,
        'null' => TRUE
    ),
    'total_likes' => array(
        'type' => 'INT',
        'constraint' => 11,
        'default' => 0
    ),
    'total_comments' => array(
        'type' => 'INT',
        'constraint' => 11,
        'default' => 0
    ),
    'status' => array(
        'type' => 'INT',
        'constraint' => 11,
        'default' => 0
    ),
    'created_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    )
);

if (! $CI->db->table_exists('community_posts')) {

    $CI->dbforge->add_field($community_posts);
    $CI->dbforge->add_key('id', TRUE);

    $attributes = array(
        'ENGINE' => 'InnoDB',
        'DEFAULT CHARACTER SET' => 'utf8mb4',
        'COLLATE' => 'utf8mb4_unicode_ci'
    );

    $CI->dbforge->create_table('community_posts', TRUE, $attributes);
}

// 5. CREATE TABLE `community_post_comments` IF NOT EXISTS
$community_post_comments = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
    ),
    'post_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'user_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'parent_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'comment' => array(
        'type' => 'LONGTEXT',
        'default' => null,
        'null' => TRUE
    ),
    'status' => array(
        'type' => 'INT',
        'constraint' => 11,
        'default' => 1
    ),
    'created_at' => array(
    'type' => 'VARCHAR',
    'constraint' => '100',
    'default' => null,
    'null' => TRUE
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    )
);

if (! $CI->db->table_exists('community_post_comments')) {

    $CI->dbforge->add_field($community_post_comments);
    $CI->dbforge->add_key('id', TRUE);

    $attributes = array(
        'ENGINE' => 'InnoDB',
        'DEFAULT CHARACTER SET' => 'utf8mb4',
        'COLLATE' => 'utf8mb4_unicode_ci'
    );

    $CI->dbforge->create_table('community_post_comments', TRUE, $attributes);
}

// 6. CREATE TABLE `community_post_likes` IF NOT EXISTS
$community_post_likes = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
    ),
    'post_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'user_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'created_at' => array(
    'type' => 'VARCHAR',
    'constraint' => '100',
    'default' => null,
    'null' => TRUE
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    )
);

if (! $CI->db->table_exists('community_post_likes')) {

    $CI->dbforge->add_field($community_post_likes);
    $CI->dbforge->add_key('id', TRUE);

    $attributes = array(
        'ENGINE' => 'InnoDB',
        'DEFAULT CHARACTER SET' => 'utf8mb4',
        'COLLATE' => 'utf8mb4_unicode_ci'
    );

    $CI->dbforge->create_table('community_post_likes', TRUE, $attributes);
}

// 7. CREATE TABLE `community_saved_posts` IF NOT EXISTS
$community_saved_posts = array(
    'id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'unsigned' => TRUE,
        'auto_increment' => TRUE
    ),
    'post_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'user_id' => array(
        'type' => 'INT',
        'constraint' => 10,
        'default' => null,
        'null' => TRUE
    ),
    'created_at' => array(
    'type' => 'VARCHAR',
    'constraint' => '100',
    'default' => null,
    'null' => TRUE
    ),
    'updated_at' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'default' => null,
        'null' => TRUE
    )
);

if (! $CI->db->table_exists('community_saved_posts')) {

    $CI->dbforge->add_field($community_saved_posts);
    $CI->dbforge->add_key('id', TRUE);

    $attributes = array(
        'ENGINE' => 'InnoDB',
        'DEFAULT CHARACTER SET' => 'utf8mb4',
        'COLLATE' => 'utf8mb4_unicode_ci'
    );

    $CI->dbforge->create_table('community_saved_posts', TRUE, $attributes);
}

// 1. UPDATE VERSION NUMBER INSIDE SETTINGS TABLE
$settings_data = array('value' => '7.2');
$CI->db->where('key', 'version');
$CI->db->update('settings', $settings_data);