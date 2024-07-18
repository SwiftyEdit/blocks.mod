<?php

$template = [
    'tpl' => 'bootstrap/centered-hero-two-links.tpl',
    'name' => 'Centered Hero',
    'title' => 'Bootstrap centered Hero with an Image, H1, Text and two links/buttons',
    'variables' => [
        [
            'placeholder' => 'var_hero_classes',
            'type' => 'text',
            'text' => 'Classes for the hero container'
        ],[
            'placeholder' => 'var_img_src',
            'type' => 'img_select',
            'text' => 'Select an image'
        ],[
            'placeholder' => 'var_img_alt',
            'type' => 'text',
            'text' => 'Alt text for image'
        ],[
            'placeholder' => 'var_title',
            'type' => 'text',
            'text' => 'Title in the card body'
        ],[
            'placeholder' => 'var_text',
            'type' => 'html',
            'text' => 'Text in the card body'
        ],[
            'section' => 'First Button'
        ],[
            'placeholder' => 'var_btn1_href',
            'type' => 'text',
            'text' => 'URL/Link for the first Button'
        ],[
            'placeholder' => 'var_btn1_text',
            'type' => 'text',
            'text' => 'Text for the first Button'
        ],[
            'placeholder' => 'var_btn1_class',
            'type' => 'text',
            'text' => 'Class for the first Button (btn-primary, btn-secondary, btn-info ...'
        ],[
            'section' => 'Second Button'
        ],[
            'placeholder' => 'var_btn2_href',
            'type' => 'text',
            'text' => 'URL/Link for the second Button'
        ],[
            'placeholder' => 'var_btn2_text',
            'type' => 'text',
            'text' => 'Text for the second Button'
        ],[
            'placeholder' => 'var_btn2_class',
            'type' => 'text',
            'text' => 'Class for the second Button (btn-primary, btn-secondary, btn-info ...'
        ]
    ]
];