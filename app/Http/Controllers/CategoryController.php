<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    //

    public function getCategory()
    {
        return Category::all();
    }

    public function createCategory(Request $request) {

        $validation = Validator::make($request->all(), [
            'title'         => ['required', 'string'],
            'content'       => ['required', 'string'],
            'meta_title'    => ['required', 'string'],
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()]);
        }

        Category::create([
            'title'         => $request->title,
            'content'       => $request->content,
            'slug'          => Str::slug($request->title),
            'meta_title'    => $request->meta_title
        ]);

        return redirect()->route('category');
    }

    public function updateCategory(Request $request) {
        $validation = Validator::make($request->all(), [
            'id'            => ['required'],
            'title'         => ['required', 'string'],
            'content'       => ['required', 'string'],
            'slug'          => ['required', 'string'],
            'meta_title'    => ['required', 'string'],
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()]);
        }

        $data = Category::where('id', $request->id)->update([
            'title'         => $request->title,
            'content'       => $request->content,
            'slug'          => $request->slug,
            'meta_title'    => $request->meta_title
        ]);

        return response()->json(['status'   => 'updated', 'data' => $data]);
    }




    public function deleteCategory(Request $request) {
        $validation = Validator::make($request->all(), [
            'id'            => ['required'],
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()]);
        }

        $data = Category::where('id', $request->id)->delete();

        return response()->json(['status'   => 'deleted', 'data' => $data]);
    }

    public function createSubcategory(Request $request) {
        $validation = Validator::make($request->all(), [
            'cat'            => ['required'],
            'title'         => ['required', 'string'],
            'content'       => ['required', 'string'],
            'meta_title'    => ['required', 'string'],
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()]);
        }

            Subcategory::create([
            'category_id'       => $request->cat,
            'title'             => $request->title,
            'content'           => $request->content,
            'slug'              => Str::slug($request->title),
            'meta_title'        => $request->meta_title
        ]);

        return redirect()->route('subcategory');
    }

    public function updateSubcategory(Request $request) {
        $validation = Validator::make($request->all(), [
            'id'            => ['required'],
            'title'         => ['required', 'string'],
            'content'       => ['required', 'string'],
            'slug'          => ['required', 'string'],
            'meta_title'    => ['required', 'string'],
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()]);
        }

        $data = Category::where('parent_id', $request->id)->update([
            'title'         => $request->title,
            'content'       => $request->content,
            'slug'          => $request->slug,
            'meta_title'    => $request->meta_title
        ]);

        return response()->json(['status'   => 'updated', 'data' => $data]);
    }

    public function deleteSubcategory(Request $request) {
        $validation = Validator::make($request->all(), [
            'id'            => ['required'],
        ]);

        if($validation->fails()){
            return response()->json(['error' => $validation->errors()]);
        }

        $data = Category::where('parent_id', $request->id)->delete();

        return response()->json(['status'   => 'deleted', 'data' => $data]);
    }

    public function fetchGategory(){
        $data = Category::all();
        return response()->json(['cat' => $data]);
    }
}
