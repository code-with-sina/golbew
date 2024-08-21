<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    //
    public function search(Request $request) {
        $validation = Validator::make($request->all(), [
            'query' => ['required', 'string']
        ]);
        
       if(!$validation->fails()) {
            $query = $request->input('query');
            

        return redirect('search/'.Str::slug($query, '+'));
       }else {
        return response()->json([
            'errors'    => $validation->errors()
        ]);
       }

        
    }


    public function catFilter(Request $request) {
        $query = $request->input('cat_query');
        $post = Category::where('content', 'like', "%$query%")->first();
        $post->load(['post', 'tag']);
        return response()->json([
            'result'    => $post
        ]);
    }

    public function subCatFilter(Request $request) {
        $query = $request->input('subcat');
        $post = Category::where('parent_id', $request->parent_id)->where('content', 'like', "%$query%")->first();
        $post->load(['post', 'tag']);
        return response()->json([
            'result'    => $post
        ]);
    }

    public function tagFilter(Request $request) {
        $query = $request->input('tag');
        $tag = Tag::where('content', 'like', "%$query%")->first();
        $post = Post::where('id', $tag->post_id)->first();
        return response()->json([
            'result'    => $post
        ]);
    }
}
