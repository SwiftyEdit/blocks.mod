<?php

/**
 * blocks.mod Database-Scheme
 * install/update the table for entries
 *
 */

$database = "blocks";
$table_name = "entries";

$cols = array(
    "id"  => 'INTEGER NOT NULL PRIMARY KEY',
    "hash"  => 'VARCHAR',
    "date"  => 'VARCHAR',
    "editdate"  => 'VARCHAR',
    "author"  => 'VARCHAR',
    "title"  => 'VARCHAR',
    "template"  => 'VARCHAR',
    "template_src"  => 'VARCHAR',
    "contents"  => 'VARCHAR'
);