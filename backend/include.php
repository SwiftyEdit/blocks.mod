<?php

$key = '';

use Medoo\Medoo;
if(is_file($mod['database'])) {
    $blocks_db = new Medoo([
        'type' => 'sqlite',
        'database' => $mod['database']
    ]);
} else {
    echo $mod['database'].' not found';
}

include_once SE_CONTENT.'/modules/blocks.mod/global/functions.php';