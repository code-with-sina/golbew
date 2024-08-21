<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    //
    public function createPost(Request $request) {
        $fields = $request->validate([
            'title'         =>  ['required', 'string'],
            'meta_title'    =>  ['required', 'string'],
            'content'       =>  ['required', 'string'],
            'summary'       =>  ['required', 'string'],  
            'subcategory' => ['required'],
            "tags"              => ['required'],
            'image'         => ['file', 'required', 'max:2048']
        ]);

        if($request->hasFile('image')){
            $fields['image'] = Storage::disk('public')->put('blogimage', $request->image);
        }

        $fields['slug'] = Str::slug($request->title);
        $fields['subcategory_id'] = $request->subcategory;

        $author = User::where('id', $request->user()->id)->first();
        $post = $author->post()->create($fields);

  

        $post->tag()->create([	
	        'keywords' => $request->tags
        ]);

        return redirect()->route('createblog');
    }

    public function makePublish(Request $request) {
        $fields = $request->validate([
            'id'         =>  ['required'],
            'status'    =>  ['required', 'string'],
            
        ]);

        Post::where('id', $fields['id'])->update(['status' => $fields['status']]);
        return redirect()->route('unpublished');
    }

    public function makeUnPublish(Request $request) {
        $fields = $request->validate([
            'id'         =>  ['required'],
            'status'    =>  ['required', 'string'],
            
        ]);

        Post::where('id', $fields['id'])->update(['status' => $fields['status']]);
        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'subcategory' => 'required|exists:subcategories,id',
            'content' => 'required|string',
            'summary' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogimage', 'public');
            $validated['image'] = $path;
        }

        $post->update($validated);

        return redirect()->route('edit', $post->id)->with('success', 'Post updated successfully.');
    }
}
