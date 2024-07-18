<?php

include_once SE_CONTENT.'/modules/blocks.mod/backend/include.php';
include_once SE_CONTENT.'/modules/blocks.mod/global/functions.php';
include_once SE_CONTENT.'/modules/blocks.mod/install/installer.php';

echo '<div class="subHeader">blocks.mod</div>';

if(isset($_POST['save_settings'])) {

    $save_data['preview_bg'] = (int) $_POST['preview_bg'];
    $save_data['include_comments'] = (int) $_POST['include_comments'];
    blocks_write_prefs($save_data);

}

$blocks_prefs = blocks_get_preferences();

if($blocks_prefs['preview_bg'][1] == 1) {
    $select_preview_bg1 = 'selected="selected"';
} else if($blocks_prefs['preview_bg'][1] == 2) {
    $select_preview_bg2 = 'selected="selected"';
} else {
    $select_preview_bg3 = 'selected="selected"';
}

if($blocks_prefs['include_comments'][1] == 1) {
    $select_comments1 = 'selected="selected"';
} else {
    $select_comments2 = 'selected="selected"';
}

echo '<div class="card">';
echo '<div class="card-header">'.$mod_lang['nav_settings'].'</div>';
echo '<div class="card-body">';

echo '<form action="?tn=addons&sub=blocks.mod&a=settings" method="post">';

echo '<div class="mb-3">';
echo '<label for="preview_bg" class="form-label">Preview background</label>';
echo '<select class="form-select" name="preview_bg" id="preview_bg">';
echo '<option value="1" '.$select_preview_bg1.'>Transparent</option>';
echo '<option value="2" '.$select_preview_bg2.'>Light</option>';
echo '<option value="3" '.$select_preview_bg3.'>Dark</option>';
echo '</select>';
echo '</div>';

echo '<div class="mb-3">';
echo '<label for="preview_bg" class="form-label">Comments in Code</label>';
echo '<select class="form-select" name="include_comments" id="include_comments">';
echo '<option value="1" '.$select_comments1.'>Yes</option>';
echo '<option value="2" '.$select_comments2.'>No</option>';
echo '</select>';
echo '</div>';


echo '<input type="submit" class="btn btn-success" name="save_settings" value="'.$lang['update'].'">';
echo $hidden_csrf_token;
echo '</form>';

echo '</div>';
echo '</div>';