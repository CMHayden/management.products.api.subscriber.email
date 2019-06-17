<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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

        $data = [
            'title' => 'SNS Notification',
            'content' => "$email_message"
        ];

        Mail::send('emails.test', $data, function($message) use($email)
        {
            $message->to("$email", 'Name')->subject('SNSnotification');
        });

        return app('Illuminate\Http\Response')->status();
    }
}
