<?php
$template = [
    'tpl' => 'bootstrap/two-cards-img-top-link.tpl',
    'name' => 'Cards with image, text and link',
    'title' => 'Two Bootstrap Cards with an image, text and a button or link',
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
            'placeholder' => 'var_btn1_href',
            'type' => 'text',
            'text' => 'URL/Link'
        ],[
            'placeholder' => 'var_btn1_text',
            'type' => 'text',
            'text' => '{tpl_label_text} (button)'
        ],[
            'placeholder' => 'var_btn1_class',
            'type' => 'text',
            'text' => '{tpl_label_class_name}'
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
            'placeholder' => 'var_btn2_href',
            'type' => 'text',
            'text' => 'URL/Link'
        ],[
            'placeholder' => 'var_btn2_text',
            'type' => 'text',
            'text' => '{tpl_label_text} (button)'
        ],[
            'placeholder' => 'var_btn2_class',
            'type' => 'text',
            'text' => '{tpl_label_class_name}'
        ]
    ]
];