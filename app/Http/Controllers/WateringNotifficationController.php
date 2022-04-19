<?php

namespace App\Http\Controllers;

use App\Notifications\WateringAlert;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class WateringNotifficationController extends Controller
{
    public function sendNotification()
    {
        $user = User::first();
        $enrollmentData = [
            'body' =>'Otrzymałeś powiadomienie o podlaniu!',
            'enrollmentText' =>'Enroll text',
            'Url'=>url('/'),
            'thankyou'=>'Dzięki',
        ];
        $user -> notify(new WateringAlert($enrollmentData));
    }
}
