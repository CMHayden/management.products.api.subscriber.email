<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class ProductsController extends SNSController
{
    public function handleNotification($notification) {

        $guzzleClient = new \GuzzleHttp\Client();

        $guzzleClient->post("https://enws51kgvayy.x.pipedream.net/", ['body' => json_encode($notification)]);

        return app('Illuminate\Http\Response')->status();

    }
}