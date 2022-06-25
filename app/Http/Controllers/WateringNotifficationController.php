<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\WateringAlert;

class WateringNotifficationController extends Controller
{
    public function sendNotification()
    {
        $user = User::first();
        $enrollmentData = [
            'body' =>'Przypominamy o podlaniu rośliny: Filodendron. Nie daj czekać Twojej roślinie i zrób to teraz!',
            'enrollmentText' =>'Podlej',
            'url'=>url('/'),
            'thankyou'=>'Wszystkiego zielonego!',
        ];
        $user -> notify(new WateringAlert($enrollmentData));
    }
}
