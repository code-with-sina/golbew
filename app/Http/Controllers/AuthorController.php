<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function createAuthor(Request $request) {
        $validation = Validator::make($request->all(), [
            'firstname'     => ['required', 'string'],
            'lastname'      => ['required', 'string'],
            'username'      => ['required', 'string'],
            'about'         => ['required', 'string'],
            'image_url'     => ['required', 'string']
        ]);


        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $detail = Author::create([
            'firstname'     =>  $request->firstname,
            'lastname'      =>  $request->lastname,
            'username'      =>  $request->username, 
            'about'         =>  $request->about,
            'image_url'     =>  $request->image_url
        ]);

        return response()->json(['status'   => 'success', 'data' => $detail]);
    }


    public function updateAuthor(Request $request) {
        $validation = Validator::make($request->all(), [
            'firstname'     => ['required', 'string'],
            'lastname'      => ['required', 'string'],
            'username'      => ['required', 'string'],
            'about'         => ['required', 'string'],
            'image_url'     => ['required', 'string'],
            'id'            => ['required']
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $detail =  Author::where('id', $request->id)->update([
            'firstname'     =>  $request->firstname,
            'lastname'      =>  $request->lastname,
            'username'      =>  $request->username, 
            'about'         =>  $request->about,
            'image_url'     =>  $request->image_url
        ]);

        return response()->json(['status'   => 'updated', 'data' => $detail]);
    }


    public function deleteAuthor(Request $request) {
        $validation = Validator::make($request->all(), [
            'id'            => ['required']
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $detail =  Author::where('id', $request->id)->delete();

        return response()->json(['status'   => 'deleted', 'data' => $detail]);
    }


    public function fetchAuthor(Request $request) {
        $validation = Validator::make($request->all(), [
            'id'            => ['required']
        ]);

        if($validation->fails()) {
            return response()->json(['error' => $validation->errors()]);
        }

        $detail =  Author::where('id', $request->id)->first();

        return response()->json(['status'   => 'success', 'data' => $detail]);
    }
}
