<?php

$template = [
    'tpl' => 'bootstrap/card-img-top.tpl',
    'name' => 'Card with image on top',
    'title' => 'Bootstrap card with image on top and text',
    'variables' => [
        [
            'placeholder' => 'var_img_src',
            'type' => 'img_select',
            'text' => '{tpl_label_select_img}'
        ],[
            'placeholder' => 'var_img_alt',
            'type' => 'text',
            'text' => '{tpl_label_img_alt}'
        ],[
            'placeholder' => 'var_title',
            'type' => 'text',
            'text' => '{tpl_label_title} <code>.card-body</code>'
        ],[
            'placeholder' => 'var_text',
            'type' => 'html',
            'text' => '{tpl_label_content} <code>.card-body</code>'
        ]
    ]
];