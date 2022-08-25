<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Notification;
use App\Notifications\ArrivalsNotification;
use App\Notifications\AlertsNotification;

class NotificationController extends Controller
{
    // https://www.positronx.io/laravel-notification-example-create-notification-in-laravel/
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        return view('product');
    }
    
    public function sendArrivalNotification() {
        $userSchema = User::first();
  
        $arrivalData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
        Notification::send($userSchema, new ArrivalsNotification($arrivalData));
   
        dd('Task completed!');
    }

    public function sendAlertNotification() {
        $userSchema = User::first();
  
        $alertData = [
            'name' => 'BOGO',
            'body' => 'You received an offer.',
            'thanks' => 'Thank you',
            'offerText' => 'Check out the offer',
            'offerUrl' => url('/'),
            'offer_id' => 007
        ];
  
        Notification::send($userSchema, new AlertNotification($alertData));
   
        dd('Task completed!');
    }
}
