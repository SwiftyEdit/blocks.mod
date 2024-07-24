<?php

/**
 * blocks.mod - global inject file
 *
 * @var array $page_contents SwiftyEdit variable
 */

use Medoo\Medoo;
error_reporting(E_ALL ^E_NOTICE ^E_WARNING ^E_DEPRECATED);

$blocks_db = new Medoo([
    'type' => 'sqlite',
    'database' => SE_CONTENT."/modules/blocks.mod/data/blocks.sqlite3"
]);

require_once SE_CONTENT.'/modules/blocks.mod/global/functions.php';

if(SE_SECTION === 'frontend') {
    $languagePack = $page_contents['page_language'];

    if(strpos($page_contents['page_content'], "[block]") !== false) {

        /* replace ratings */
        $page_contents['page_content'] = preg_replace_callback(
            '/\[block\](.*?)\[\/block\]/s',
            function ($m) {
                return print_blocks_mod_entry($m[1]);
            },
            $page_contents['page_content']
        );
    }
}