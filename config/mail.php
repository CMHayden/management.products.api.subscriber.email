<?php

return [
    "driver" => env('MAIL_DRIVER'),
    "host" => env('MAIL_HOST'),
    "port" => env('MAIL_PORT'),
    "from" => array(
        "address" => env('MAIL_FROM_ADDRESS'),
        "name" => env('MAIL_FROM_NAME')
    ),
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    "username" => env('MAIL_USERNAME'),
    "password" => env('MAIL_PASSWORD'),
    "domain" => env('MAILGUN_DOMAIN'),
    "secret" => env('MAILGUN_SECRET'),
    "sendmail" => "/usr/sbin/sendmail -bs"
  ];
