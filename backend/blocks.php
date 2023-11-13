<?php

include_once SE_CONTENT.'/modules/blocks.mod/backend/include.php';
include_once SE_CONTENT.'/modules/blocks.mod/templates/index.php';

echo '<div class="subHeader">'.$icon['plugin'].' blocks.mod '.$icon['arrow_right_short'].' <small>'.$mod_lang['nav_blocks'].'</small></div>';



echo '<div class="row">';
echo '<div class="col">';

// save new entry
if(isset($_POST) && (isset($_POST['save']))) {
    $hash = blocks_save_data($_POST);
}

// update entry
if(isset($_POST) && (isset($_POST['update']))) {
    $hash = blocks_update_data($_POST);
}

// open an existing entry by $hash
if(isset($_GET['hash'])) {
    $hash = $_GET['hash'];
}

if(isset($hash)) {
    // get data from databese by hash
    $get_data = blocks_get_data($hash);
    $key = $get_data['template'];
    $variables_data = json_decode($get_data['contents'],true);
}

// key of $templates
if(isset($_REQUEST['key'])) {
    $key = $_REQUEST['key'];
}

if($key == '') {
    echo '<div class="alert alert-info">'.$mod_lang['msg_choose_tpl_first'].'</div>';
} else {

    // the relevant data is now in $templates[$key]

    echo '<div class="card">';
    echo '<div class="card-header">';
    echo '<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">';
    echo '<li class="nav-item" role="presentation">';
    echo '<a class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data-tab-pane" aria-current="true" href="#">Data</a>';
    echo '</li>';
    echo '<li class="nav-item" role="presentation">';
    echo '<a class="nav-link" id="preview-tab" data-bs-toggle="tab" data-bs-target="#preview-tab-pane" href="#">Preview</a>';
    echo '</li>';
    echo '</ul>';
    echo '</div>';

    echo '<div class="card-body">';
    echo '<div class="tab-content" id="myTabContent">';
    echo '<div class="tab-pane fade show active" id="data-tab-pane" role="tabpanel" aria-labelledby="data-tab" tabindex="0">';
    // data tab
    echo '<p>Input your data for the template <code>'.$templates[$key]['tpl'].'</code></p>';

    // build the form from $templates[$key]['variables']

    echo '<form action="?tn=addons&sub=blocks.mod&a=blocks" method="POST">';

    echo '<div class="mb-3">';
    echo '<label class="form-label">Title</label>';
    echo '<input type="text" name="title" value="'.$get_data['title'].'" class="form-control">';
    echo '</div><hr>';

    foreach($templates[$key]['variables'] as $form) {

        $var_name = $form['placeholder'];
        $value = '';
        if($variables_data[$var_name]) {
            // saved data
            $value = $variables_data[$var_name];
            $value = htmlentities($value);
        }

        if(isset($form['section'])) {
            echo '<h6 class="heading-line">'.$form['section'].'</h6>';
            continue;
        }

        echo '<div class="mb-3">';
        echo '<label class="form-label">'.$form['text'].'</label>';

        if($form['type'] == 'text') {
            echo '<input type="text" name="data['.$var_name.']" value="'.$value.'" class="form-control">';
        }

        if($form['type'] == 'html') {
            echo '<textarea name="data['.$var_name.']" class="form-control">'.$value.'</textarea>';
        }

        if($form['type'] == 'img_select') {
            echo '<select class="form-control" name="data['.$var_name.']">';

            $get_all_images = se_get_all_images_rec();

            foreach($get_all_images as $img) {
                $img = str_replace("../content/","/content/",$img);
                $selected = '';
                if($value == $img) {
                    $selected = 'selected';
                }
                echo '<option value="'.$img.'" '.$selected.'>'.$img.'</option>';
            }

            echo '</select>';
        }

        echo '</div>';

    }

    if($key != '') {
        echo '<input type="hidden" name="key" value="'.$key.'">';
    }

    echo $hidden_csrf_token;


    if(is_array($variables_data)) {
        // update data
        echo '<input type="submit" class="btn btn-default text-success" name="update" value="'.$lang['update'].'">';
        echo '<input type="hidden" name="hash" value="'.$hash.'">';
    } else {
        echo '<input type="submit" class="btn btn-default text-success" name="save" value="'.$lang['save'].'">';
    }

    echo '</form>';


    echo '</div>';
    echo '<div class="tab-pane fade" id="preview-tab-pane" role="tabpanel" aria-labelledby="preview-tab" tabindex="0">';
    // data tab
    echo '<p>Here is your preview</p>';

    if(is_array($variables_data)) {

        $get_tpl = $templates[$key]['tpl'];
        $get_file = file_get_contents(SE_CONTENT."/modules/blocks.mod/templates/$get_tpl");
        foreach($templates[$key]['variables'] as $form) {
            $key = $form['placeholder'];
            $var_search = '{'.$key.'}';
            $var_replace = $variables_data[$key];
            $get_file = str_replace("$var_search","$var_replace",$get_file);
        }


        echo '<legend>Preview</legend>';
        echo '<div class="p-3 border-1 rounded pseudo-transparent">';
        echo $get_file;
        echo '</div>';

        echo '<div class="alert alert-info my-3">';
        echo '<p>Copy the Shortcode and paste it in your page ...</p>';
        $copy_shortcode = '[block]'.$hash.'[/block]';
        echo '<div class="input-group mb-1">';
        echo '<input type="text" class="form-control" id="copy_sc_block" value="'.$copy_shortcode.'" readonly="">';
        echo '<button type="button" class="btn btn-primary copy-btn" data-clipboard-target="#copy_sc_block"><i class="bi bi-clipboard"></i> copy</button>';
        echo '</div>';

        echo '<p>... or copy the entire source code:</p>';

        echo '<textarea id="copy_sc_code" class="form-control mb-1">';
        echo $get_file;
        echo '</textarea>';
        echo '<button type="button" class="btn btn-primary copy-btn" data-clipboard-target="#copy_sc_code"><i class="bi bi-clipboard"></i> copy</button>';

        echo '</div>';

    }

    echo '</div>'; // tab-pane
    echo '</div>'; // #tab-content

    echo '</div>'; // card-body
    echo '</div>'; // card


}

echo '</div>';

    echo '<div class="col-md-3">';

    echo '<div class="list-group">';
    foreach ($templates as $k => $v) {

        $img = basename($templates[$k]['tpl'], '.tpl') . '.png';

        $active = '';
        if ($key == $k) {
            $active = 'active';
        }

        echo '<a class="list-group-item list-group-item-action ' . $active . '" href="?tn=addons&sub=blocks.mod&a=blocks&key=' . $k . '" title="' . $templates[$k]['title'] . '">';
        echo '<strong>' . $templates[$k]['name'] . '</strong>';
        echo '<div class="hstack gap-3 w-100">';
        echo '<div class="w-25">';
        echo '<img src="/content/modules/blocks.mod/templates/bootstrap/' . $img . '" class="img-fluid rounded-start" alt="...">';
        echo '</div>';
        echo '<div class="w-75">';
        echo '<p><small>' . $templates[$k]['title'] . '</small></p>';
        echo '</div>';
        echo '</div>';

        echo '</a>';

    }

    echo '</div>';
    echo '</div>';

echo '</div>';