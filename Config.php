<?php

return [
    'mail' => [
        'sender' => getenv('SENDER_EMAIL'),
        'sendername' => 'Sender',
        'recipient' => getenv('RECIPIENT_EMAIL'),
        'username_smtp' => getenv('MAIL_USERNAME'),
        'password_smtp' => getenv('MAIL_PASSWORD'),
        'host' => 'email-smtp.us-west-2.amazonaws.com',
        'port' => 587,
        'subject' => 'Item Found',
        'body_text' =>  "Item Found\r\nItem Found.",
        'body_html' => '<h1>Item Found</h1><p>Item Found.</p>'
    ]
];