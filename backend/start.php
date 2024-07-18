<?php

echo '<div class="subHeader">blocks.mod</div>';

include_once SE_CONTENT.'/modules/blocks.mod/backend/include.php';
include_once SE_CONTENT.'/modules/blocks.mod/global/functions.php';
include_once SE_CONTENT.'/modules/blocks.mod/install/installer.php';
include_once SE_CONTENT.'/modules/blocks.mod/templates/index.php';

$blocks = blocks_get_entries();
$cnt_blocks = count($blocks);

echo '<div class="card p-3">';

echo '<table class="table table-sm table-hover">';
for($i=0;$i<$cnt_blocks;$i++) {

    $this_hash = $blocks[$i]['hash'];
    $this_tpl_key = $blocks[$i]['template'];

    echo '<tr>';
    echo '<td>'.date("Y-m-d H:i", $blocks[$i]['editdate']).'</td>';
    echo '<td>'.$blocks[$i]['title'].'</td>';
    echo '<td>'.$templates[$this_tpl_key]['tpl'].'</td>';
    echo '<td><a class="btn btn-default btn-sm" href="?tn=addons&sub=blocks.mod&a=blocks&hash='.$this_hash.'">'.$icon['edit'].' '.$lang['edit'].'</a></td>';
    echo '</tr>';
}

echo '</table>';

echo '</div>';