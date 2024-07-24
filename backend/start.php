<?php

echo '<div class="subHeader">blocks.mod</div>';

include_once SE_CONTENT.'/modules/blocks.mod/backend/include.php';
include_once SE_CONTENT.'/modules/blocks.mod/global/functions.php';
include_once SE_CONTENT.'/modules/blocks.mod/install/installer.php';
include_once SE_CONTENT.'/modules/blocks.mod/templates/index.php';

$blocks = blocks_get_entries();
$cnt_blocks = count($blocks);

echo '<div class="card p-3">';

echo '<div id="blocks" hx-post="/content/modules/blocks.mod/backend/ajax/list_blocks.php" hx-trigger="load, change" hx-target="#blocks" hx-include="[name=\'csrf_token\']"></div>';
echo $hidden_csrf_token;

echo '</div>';