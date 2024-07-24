<?php

/**
 *
 * @var object $blocks_db database
 */

use Medoo\Medoo;

require './_include.php';
include '../../info.inc.php';
include '../include.php';
include '../../../../../core/functions/functions.php';


global $hidden_csrf_token,$lang;
$this_uri = '?tn=addons&sub=blocks.mod&a=start';
$edit_uri = '?tn=addons&sub=blocks.mod&a=blocks';


if(isset($_POST['delete'])) {
    $delete_block = blocks_delete_block($_POST['delete']);
    if($delete_block > 0) {
        echo '<div class="alert alert-info">DELETED ' . $_POST['delete'] . '</div>';
    }
}

$items_start = 0;
$items_per_page = 10;
if(isset($_POST['set_page'])){
    $items_start = $_POST['set_page']*$items_per_page;
}

$count_all_blocks = $blocks_db->count("entries","*");

/**
 * @todo
 * we replace the 'where argument' later
 * maybe with tags or fulltext search
 */

$count_this_blocks = $blocks_db->count("entries",[
    "AND" => [
        "id[>]" => 0,
        "hash[!]" => ''
    ]
]);

$get_blocks = $blocks_db->select("entries", "*", [
    "AND" => [
        "id[>]" => 0,
        "hash[!]" => ''
    ],
    "LIMIT" => [$items_start,$items_per_page]
]);


$nbr_pages = ceil($count_this_blocks / $items_per_page);

$this_page = $items_start/$items_per_page;
$prev_start = $this_page-1;
if($prev_start < 0) {
    $prev_start = 0;
}
$next_start = $this_page+1;
if($next_start > $nbr_pages) {
    $next_start = $nbr_pages;
}

if($nbr_pages > 1) {

    echo '<form class="pagination pagination-sm" hx-post="/content/modules/blocks.mod/backend/ajax/list_blocks.php" hx-target="#blocks">';

    echo '<button class="page-link" name="set_page" value="0"><i class="bi bi-chevron-bar-left"></i></button>';
    echo '<button class="page-link" name="set_page" value="' . $prev_start . '"><i class="bi bi-chevron-left"></i></button>';

    for ($i = 0; $i < $nbr_pages; $i++) {
        $btn_class = '';

        $stop_left = $this_page - 2;
        $stop_right = $this_page + 2;

        if (($i < $stop_left) && ($i < ($this_page - 3))) {
            continue;
        }
        if (($i > $stop_right) && ($i > 4)) {
            continue;
        }

        if ($this_page == $i) {
            $btn_class = 'active';
        }
        echo '<button class="page-link ' . $btn_class . '" name="set_page" value="' . $i . '">' . ($i + 1) . '</button>';
    }
    if($next_start < $nbr_pages) {
        echo '<button class="page-link" name="set_page" value="' . $next_start . '"><i class="bi bi-chevron-right"></i></button>';
    } else {
        echo '<button class="page-link" disabled><i class="bi bi-chevron-right"></i></button>';
    }
    echo '<button class="page-link" name="set_page" value="' . ($nbr_pages - 1) . '"><i class="bi bi-chevron-bar-right"></i></button>';

    echo '<input type="hidden" name="csrf_token" value="' . $_SESSION['token'] . '">';
    echo '</form>';
}

echo '<table class="table">';

foreach ($get_blocks as $block) {
    echo '<tr>';
    echo '<td>' . date("Y-m-d H:i",$block['date']) . '</td>';
    echo '<td>' . $block['title'] . '</td>';
    echo '<td>' . $block['template_src'] . '</td>';
    echo '<td class="text-end">';

    echo '<form action="'.$edit_uri.'" class="d-inline" method="POST">';
    echo '<button class="btn btn-default" name="hash" value="'.$block['hash'].'">'.$icon['edit'].'</button>';
    echo '<input type="hidden" name="csrf_token" value="'.$_SESSION['token'].'">';
    echo '</form>';

    echo '<button hx-post="/content/modules/blocks.mod/backend/ajax/list_blocks.php" hx-include="[name=\'csrf_token\']" class="btn btn-default text-danger" name="delete" value="'.$block['hash'].'" hx-confirm=" '.$lang['msg_confirm_delete'].'">'.$icon['trash'].'</button>';
    echo '<input type="hidden" name="csrf_token" value="'.$_SESSION['token'].'">';

    echo '</td>';
    echo '</tr>';
}

echo '</table>';
