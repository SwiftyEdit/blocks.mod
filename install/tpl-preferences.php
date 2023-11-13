<?php

/**
 * blocks.mod Database-Scheme
 * install/update the table for preferences
 *
 */

$database = "blocks";
$table_name = "preferences";

$cols = array(
    "id"  => 'INTEGER NOT NULL PRIMARY KEY',
    "key" => 'VARCHAR',
    "value" => 'VARCHAR'
);