<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends SNSController
{
    public function handleRequest(Request $request, $email) {

        $requestJSON =  json_decode($request->getContent(), true);

        if ($requestJSON['Type']  == 'SubscriptionConfirmation') {
            return $this->subscribe($requestJSON);
        }

        $text_message = $requestJSON['Message'];

        $this->sendEmail($email, $message);
    }

    public function sendEmail($email, $message) {

        return app('Illuminate\Http\Response')->status();
    }
}
