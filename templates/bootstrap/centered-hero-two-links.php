<?php

$template = [
    'tpl' => 'bootstrap/centered-hero-two-links.tpl',
    'name' => 'Centered Hero',
    'title' => 'Bootstrap centered Hero with an Image, H1, Text and two links/buttons',
    'variables' => [
        [
            'placeholder' => 'var_hero_classes',
            'type' => 'text',
            'text' => '{tpl_label_class_name} (hero container)'
        ],[
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
            'text' => '{tpl_label_title}'
        ],[
            'placeholder' => 'var_text',
            'type' => 'html',
            'text' => '{tpl_label_content}'
        ],[
            'section' => 'First Button'
        ],[
            'placeholder' => 'var_btn1_href',
            'type' => 'text',
            'text' => 'URL/Link'
        ],[
            'placeholder' => 'var_btn1_text',
            'type' => 'text',
            'text' => '{tpl_label_text} (Button)'
        ],[
            'placeholder' => 'var_btn1_class',
            'type' => 'text',
            'text' => '{tpl_label_class_name} <code>btn-primary</code>, <code>btn-secondary</code>, ...'
        ],[
            'section' => 'Second Button'
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
            'text' => '{tpl_label_class_name} <code>btn-primary</code>, <code>btn-secondary</code>, ...'
        ]
    ]
];