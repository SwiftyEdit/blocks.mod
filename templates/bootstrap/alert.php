<?php

$template = [

        'tpl' => 'bootstrap/alert.tpl',
        'name' => 'Alert',
        'title' => 'Simple Bootstrap alert',
        'variables' => [
            [
                'placeholder' => 'var_classes',
                'type' => 'text',
                'text' => '{tpl_label_class_name} f.e. alert-info'
            ],[
                'placeholder' => 'var_text',
                'type' => 'html',
                'text' => '{tpl_label_content}'
            ]
        ]

];