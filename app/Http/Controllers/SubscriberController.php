<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    //
    public function subscribeGuest(Request $request) {

        $validation = Validator::make($request->all(), [
            'email' => 'required|string',
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $subscribed = $this->checkUniqueSubscriber($request->email);
        if($subscribed == false) {
            Subscriber::create([
                'email'     => $request->email,
                'status'    => 'subscribed'
            ]);
            return to_route('home')->withViewData(['message' => 'successfully subscribed']);
            // return response()->json(['message' => 'successfully subscribed']);
        }else {
            // return response()->json(['message' => 'already subscribed']);
        }

    }

    public function unsubscribeGuest(Request $request) {

        $validation = Validator::make($request->all(), [
            'email' => 'required|string',
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $subscribed = $this->checkUniqueSubscriber($request->email);
        if($subscribed == true) {
            Subscriber::where('email', $request->email)->update(['status' => 'unsubscribed']);
            return response()->json(['message' => 'successfully unsubscribed']);
        }else {
            return response()->json(['message' => 'already subscribed']);
        }
    }

    public function checkUniqueSubscriber($email) {
        $subscribed = new Subscriber();
        if($subscribed->where('email', $email)->first()) {
            return true;
        }else {
            return false;
        }
    }
}
