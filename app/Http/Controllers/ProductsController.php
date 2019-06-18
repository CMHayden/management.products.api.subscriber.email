<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mailgun\Mailgun;


class ProductsController extends SNSController
{
    public function handleRequest(Request $request, $email) {

        $requestJSON =  json_decode($request->getContent(), true);

        if ($requestJSON['Type']  == 'SubscriptionConfirmation') {
            return $this->subscribe($requestJSON);
        }

        $message = $requestJSON['Message'];

        $this->sendEmail($email, $message);
    }

    public function sendEmail($email, $email_message) {

        $mg = Mailgun::create(env('MAILGUN_SECRET'));
        $from = env('MAIL_FROM_ADDRESS');

        $mg->messages()->send(env('MAILGUN_DOMAIN'), [
            'from'    => "SNS BOT <$from>",
            'to'      => "<$email>",
            'subject' => 'SNS Notification',
            'text'    => "$email_message"
        ]);

        return app('Illuminate\Http\Response')->status();
    }
}
