<?php
$template = [
    'tpl' => 'bootstrap/three-cards-img-top.tpl',
    'name' => 'Three Cards with image on top',
    'title' => 'Bootstrap card with image on top and text',
    'variables' => [
        [
            'section' => '.card #1'
        ],[
            'placeholder' => 'var_img_src_one',
            'type' => 'img_select',
            'text' => '{tpl_label_select_img}'
        ],[
            'placeholder' => 'var_img_alt_one',
            'type' => 'text',
            'text' => '{tpl_label_img_alt}'
        ],[
            'placeholder' => 'var_title_one',
            'type' => 'text',
            'text' => '{tpl_label_title} <code>.card-body</code>'
        ],[
            'placeholder' => 'var_text_one',
            'type' => 'html',
            'text' => '{tpl_label_content} <code>.card-body</code>'
        ],[
            'section' => '.card #2'
        ],[
            'placeholder' => 'var_img_src_two',
            'type' => 'img_select',
            'text' => '{tpl_label_select_img}'
        ],[
            'placeholder' => 'var_img_alt_two',
            'type' => 'text',
            'text' => '{tpl_label_img_alt}'
        ],[
            'placeholder' => 'var_title_two',
            'type' => 'text',
            'text' => '{tpl_label_title} <code>.card-body</code>'
        ],[
            'placeholder' => 'var_text_two',
            'type' => 'html',
            'text' => '{tpl_label_content} <code>.card-body</code>'
        ],[
            'section' => '.card #3'
        ],[
            'placeholder' => 'var_img_src_three',
            'type' => 'img_select',
            'text' => '{tpl_label_select_img}'
        ],[
            'placeholder' => 'var_img_alt_three',
            'type' => 'text',
            'text' => '{tpl_label_img_alt}'
        ],[
            'placeholder' => 'var_title_three',
            'type' => 'text',
            'text' => '{tpl_label_title} <code>.card-body</code>'
        ],[
            'placeholder' => 'var_text_three',
            'type' => 'html',
            'text' => '{tpl_label_content} <code>.card-body</code>'
        ]
    ]
];