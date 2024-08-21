<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    //
    public function createNewsletter(Request $request) {

        $validation = Validator::make($request->all(), [
            'subject'   => ['string',   'required'],
            'content'   => ['string',   'required'],
            'status'    => ['string',   'required']
        ]);
       
       if($validation->fails()) {
        return response()->json(['error' => $validation->errors()]);
       }

        if($request->status == 'published') {
           $message =  $this->publishNewsletter($request->subject, $request->content,  $request->status);
            return response()->json(['message' => $message]);
        }elseif($request->status == 'unpublished') {
            $message = $this->draftScheduleNewsletter($request->subject, $request->content,  $request->status, $request->published_date); 
            return response()->json(['message' => $message]);
        }elseif($request->status == 'scheduled'){
            $message = $this->scheduleNewsletter($request->subject, $request->content,  $request->status, $request->published_date); 
            return response()->json(['message' => $message]);
        }

    }

    public function scheduleNewsletter($subject, $content, $status, $published_date) {
        $data = Newsletter::create([
            'subject'           => $subject,
            'content'           => $content,
            'status'            => $status,
            'published_date'    => Carbon::parse($published_date),
        ]);


        $end = Carbon::parse($published_date);
        $now = Carbon::now();

        $length = $end->diffInDays($now);


        // ScheduleNewsletterProcessJob::dispatch($data->subject, $data->content, $data->status, $data->published_date)->delay(now()->addDays($length));
        $message = ['successfully created and scheduled newsletter', $data];
        return $message;
    }

    public function publishNewsletter($subject, $content, $status ) {
        $data = Newsletter::create([
            'subject'       => $subject,
            'content'       => $content,
            'status'        => $status,

        ]);

        $message = ['successfully created newsletter', $data];
        return $message;
    }

    public function draftScheduleNewsletter($subject, $content, $status) {
        $data = Newsletter::create([
            'subject'       => $subject,
            'content'       => $content,
            'status'        => $status,

        ]);

        $message = ['successfully created draft newsletter', $data];
        return $message;
    }

    public function testMate() {

        $data = Newsletter::where('status', 'published')->latest()->first();
        return response()->json([
            'data'  => $data->subject
        ]);
    }
}
