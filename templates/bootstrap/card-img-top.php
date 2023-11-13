<?php

$template = [
    'tpl' => 'bootstrap/card-img-top.tpl',
    'name' => 'Card with image on top',
    'title' => 'Bootstrap card with image on top and text',
    'variables' => [
        [
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
        ]
    ]
];