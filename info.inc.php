<?php
/**
 * Advanced Language Packs | SwiftyEdit Addon
 * Configuration File
 *
 * variables
 * @var array $mod_lang from language files alp.mod/lang/..
 * global variables
 * @var string $languagePack
 */

$mod_root = SE_CONTENT.'/modules/blocks.mod/';

include $mod_root.'lang/en.php';

if(is_file($mod_root.'lang/'.$languagePack.'.php')) {
	include $mod_root.'lang/'.$languagePack.'.php';
}


$mod = [
    "name" => "blocks",
    "version" => "0.2",
    "author" => "SwiftyEdit Developers",
    "description" => "Build Blocks for Landingpages",
    "database" => SE_CONTENT."/modules/blocks.mod/data/blocks.sqlite3"
];

$modnav = [
    ['link' => $mod_lang['nav_start'], 'file' => 'start', 'title' => ''],
    ['link' => $mod_lang['nav_blocks'], 'file' => 'blocks', 'title' => '']
];