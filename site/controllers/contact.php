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
                'to'      => 'info@robinwkurtz.com',
                'sender'  => 'info@robinwkurtz.com',
                'subject' => 'Contact Submission - Robin Kurtz'
            ]
        ]
    ]);

    return compact('form');
};
