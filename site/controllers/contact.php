<?php

return function($site, $pages, $page) {
    $form = uniform('contact-form', [
        'required' => [
            'fname'  => '',
            '_from' => 'email',
            'message' => ''
        ],
        'actions' => [
            [
                '_action' => 'email',
                'to'      => 'robinwkurtz@gmail.com',
                'sender'  => 'robinwkurtz@gmail.com',
                'subject' => 'Form Submission from New Website'
            ]
        ]
    ]);

    return compact('form');
};
