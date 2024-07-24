<?php

/**
 * @var array $template from the tpl info files
 */

$templates = array();

$get_all_tpls = glob(SE_CONTENT.'/modules/blocks.mod/templates/*/*.tpl');

foreach($get_all_tpls as $tpl) {
    $info_file = SE_CONTENT.'/modules/blocks.mod/templates/bootstrap/'.basename($tpl,'.tpl').'.php';
    $this_key = md5($info_file);
    if(is_file($info_file)) {
        include $info_file;
        $templates[] = $template;
    }
}