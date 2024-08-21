<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public function getSegment($slug) {
        return Inertia::render('Segment', [
            'data' => $this->getSingleData($slug),
            'sidePost' => $this->getMultiData($slug) 
        ]);
    }

    public function getSingleData($slug) {
        $data = Subcategory::where('slug', $slug)->first();
   
        $post = Post::where('subcategory_id', $data->id);
        if($post->count() > 0) {
            $post = Post::where('subcategory_id', $data->id)->first()->load(['user']);
            $posts = [
                'title' => $post->title,
                'meta_title' => $post->meta_title,
                'content' => $post->content,
                'name' => $post->user->name,
                'image' => $post->image,
                'date' => $post->created_at,
                'slug' => $post->slug
            ]; 
        
            return $posts;
        }else {
            $posts = null; 
        
            return $posts;
        }
    }


    public function getMultiData($slug) {
        $data = Subcategory::where('slug', $slug)->first();
        return Post::where('subcategory_id', $data->id)->take(4)->get()->load(['user'])->map(fn($post) => [
            'title' => $post->title,
            'content' => $post->content,
            'name' => $post->user->name,
            'image' => $post->image,
            'date' => $post->created_at,
            'slug' => $post->slug
        ]); 

    }
}
