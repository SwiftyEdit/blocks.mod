<?php

$template = [
    'tpl' => 'bootstrap/card-header-link.tpl',
    'name' => 'Card w. header and link',
    'title' => 'Bootstrap card with header, text and a button',
    'variables' => [
        [
            'placeholder' => 'var_header_text',
            'type' => 'text',
            'text' => '{tpl_label_title} <code>.card-header</code>'
        ],[
            'placeholder' => 'var_title',
            'type' => 'text',
            'text' => '{tpl_label_title} <code>.card-body</code>'
        ],[
            'placeholder' => 'var_text',
            'type' => 'html',
            'text' => '{tpl_label_content} <code>.card-body</code>'
        ],[
            'placeholder' => 'var_href',
            'type' => 'text',
            'text' => 'URL (Button)'
        ],[
            'placeholder' => 'var_btn_text',
            'type' => 'text',
            'text' => 'Text (Button)'
        ]
    ]
];