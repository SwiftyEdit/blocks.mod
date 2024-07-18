<?php

function blocks_write_prefs($data): void {
    global $blocks_db;

    foreach($data as $key => $val) {

        if($key == '') {
            continue;
        }

        /* check if exists */
        $entry = $blocks_db->get("preferences","*", [
            "key" =>  $key
        ]);

        if($entry['key'] != '') {

            $data = $blocks_db->update("preferences", [
                "value" =>  $val,
            ], [
                "AND" => [
                    "key" => $key
                ]
            ]);

        } else {

            $data = $blocks_db->insert("preferences", [
                "key" => $key,
                "value" =>  $val
            ]);

        }
    }
}

/**
 * @return void
 */
function blocks_get_preferences() {
    global $blocks_db;

    if (!isset($blocks_db)) {
        return;
    }

    $prefs = $blocks_db->query("SELECT key, value FROM preferences")->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_UNIQUE);
    return $prefs;
}

/**
 * @param $data
 * @return string hash of the saved entry
 */
function blocks_save_data($data) {

    global $blocks_db, $templates;

    $title = $data['title'];
    $tpl_key = $data['key'];
    $tpl_data = json_encode($data['data']);
    $hash = md5(time());

    if(isset($data['save'])) {
        // save new entry
        $insert = $blocks_db->insert("entries", [
            "hash" => $hash,
            "date" =>  time(),
            "editdate" =>  time(),
            "title" =>  $title,
            "template" => $tpl_key,
            "contents" => $tpl_data
        ]);

    }

    return $hash;
}

/**
 * @param $data
 * @return mixed hash of the updated entry
 */
function blocks_update_data($data) {
    global $blocks_db, $templates;
    $tpl_key = (int) $data['key'];
    $tpl_data = json_encode($data['data']);
    $hash = $data['hash'];
    $title = $data['title'];

    if(isset($data['update'])) {
        // save new entry
        $update = $blocks_db->update("entries", [
            "contents" => $tpl_data,
            "editdate" =>  time(),
            "title" =>  $title,
        ],[
            "hash" => $hash,
        ]);

    }
    return $hash;
}

/**
 * @param string $hash
 * @return array data of the entry
 */
function blocks_get_data($hash): array {
    global $blocks_db;

    $data = $blocks_db->get("entries","*", [
        "hash" =>  $hash
    ]);

    return $data;
}

function blocks_get_entries() {
    global $blocks_db;

    $data = $blocks_db->select("entries","*");

    return $data;
}



function print_blocks_mod_entry($string) {

    global $blocks_db;

    $data = $blocks_db->get("entries","*", [
        "hash" =>  $string
    ]);

    if(is_array($data)) {

        // include the template config file
        include SE_CONTENT.'/modules/blocks.mod/templates/index.php';
        $tpl_hash = $data['template'];

        $tpl_file_src = SE_CONTENT.'/modules/blocks.mod/templates/'.$templates[$tpl_hash]['tpl'];
        $tpl_file = file_get_contents($tpl_file_src);

        $variables_data = json_decode($data['contents'],true);

        foreach($variables_data as $k => $v) {
            $var_search = '{'.$k.'}';
            $var_replace = $variables_data[$k];
            $tpl_file = str_replace("$var_search","$var_replace",$tpl_file);
        }

    }
    
    return $tpl_file;
}