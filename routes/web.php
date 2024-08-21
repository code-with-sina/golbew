<?php

use App\Models\Tag;
use App\Models\Post;
use Inertia\Inertia;

use App\Models\Category;
use App\Models\Subscriber;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubscriberController;


Route::get('/write/edit/{id}', function ($id) {
    return Inertia::render('Write/Edit', [
        'pageTitle' => 'Edit Post',
        'data'      => Post::where('id', $id)->first(),
        'subcat'   => Subcategory::all()
    ]);
})->name('edit');

Route::get('/write', function () {
    return redirect('write/login');
})->name('write');



Route::get('/write/register', function () {
    return Inertia::render('Auth/Register', [
        'pageTitle' => 'Register'
    ]);
})->name('register');

Route::get('/write/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword', [
        'pageTitle' => 'ForgotPassword'
    ]);
})->name('forgotpassword');

Route::get('/write/login', function () {
    return Inertia::render('Auth/Login', [
        'pageTitle' => 'Login'
    ]);
})->name('login');





Route::get('/write/dashboard/', function () {
    return Inertia::render('Write/Dashboard', [
        'pageTitle' => 'Dashboard',
        'data'  => Post::where('status', 'published')->get()
    ]);
})->name('dashboard')->middleware('auth');


Route::get('/write/unpublished/', function () {
    return Inertia::render('Write/Unpublished', [
        'pageTitle' => 'Unpublished',
        'data'  => Post::where('status', 'unpublished')->get()
    ]);
})->name('unpublished')->middleware('auth');


Route::get('/write/category/', function () {
    return Inertia::render('Write/Category', [
        'pageTitle' => 'Category',
        'data'  => Category::all()
    ]);
})->name('category')->middleware('auth');


Route::get('/write/subcategory/', function () {
    return Inertia::render('Write/Subcategory', [
        'pageTitle' => 'Sub Category',
        'cats'  => Category::all(),
        'data'  => Subcategory::all()
    ]);
})->name('subcategory')->middleware('auth');

Route::get('/write/tags/', function () {
    return Inertia::render('Write/Tags', [
        'pageTitle' => 'Tags',
        'data'      => Tag::all()
    ]);
})->name('tags')->middleware('auth');


Route::get('/write/subscribers/', function () {
    return Inertia::render('Write/Subscribers', [
        'pageTitle' => 'Subscribers',
        'data'      => Subscriber::all()
    ]);
})->name('subscribers')->middleware('auth');


Route::get('/write/createblog/', function () {
    return Inertia::render('Write/Createblog', [
        'pageTitle' => 'Create Blog',
        'subcat'   => Subcategory::all()
    ]);
})->name('createblog')->middleware('auth');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', function () {
    return Inertia::render('Home', [
        'data' => Post::where('status', 'published')->latest()->first()->load(['user']) ?? 'null',
        'sidePost' => Post::where('status', 'published')->latest()->take(4)->get()->load(['user']) ?? 'null'
    ]);
})->name('home');


Route::post('/subscribe', [SubscriberController::class, 'subscribeGuest'])->name("subscribe");

// Route::get('/segment/{slug}', function ($slug) {
//     return Inertia::render('Segment', [
//         'data' => getSingleData($slug),
//         'sidePost' => getMultiData($slug) 
//     ]);
// });


Route::get('/segment/{slug}', [DataController::class, 'getSegment']);

Route::get('/search/{slug}', function ($slug) {
    $query = str_replace('+', ' ', $slug);
    return Inertia::render('Search',[
        'posts'  => Post::query()
        ->when($query, function($search, $params){
            $search->where('content', 'like', "%$params%")
            ->orWhere('title', 'like', "%$params%");
        })->paginate(5)->load(['user'])
    ]);
})->name('search');



Route::get('/post/{slug}', function ($slug) {
    return Inertia::render('Post', [
        'post'  => Post::where('slug', $slug)->first()->load(['user'])
    ]);
});

// function getSingleData($slug) {
//     $data = Subcategory::where('slug', $slug)->first();
   
//     $post = Post::where('subcategory_id', $data->id);
//     if($post->count() > 0) {
//         $post = Post::where('subcategory_id', $data->id)->first()->load(['user']);
//         $posts = [
//             'title' => $post->title,
//             'meta_title' => $post->meta_title,
//             'content' => $post->content,
//             'name' => $post->user->name,
//             'image' => $post->image,
//             'date' => $post->created_at,
//             'slug' => $post->slug
//         ]; 
    
//         return $posts;
//     }else {
//         $posts = null; 
    
//         return $posts;
//     }
    
// }

// function getMultiData($slug) {
//     $data = Subcategory::where('slug', $slug)->first();
//     return Post::where('subcategory_id', $data->id)->take(4)->get()->load(['user'])->map(fn($post) => [
//         'title' => $post->title,
//         'content' => $post->content,
//         'name' => $post->user->name,
//         'image' => $post->image,
//         'date' => $post->created_at,
//         'slug' => $post->slug
//     ]); 

// }

Route::post('/search', [SearchController::class, 'search']);

Route::post('/write/register',  [AuthController::class, 'register']);
Route::post('/write/login',     [AuthController::class, 'login']);
Route::post('/logout',          [AuthController::class, 'logout'])->name('logout');
Route::post('/write/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::post('create-category',          [CategoryController::class, 'createCategory'])->name('createCategory')->middleware('auth');
Route::post('create-subcategory',       [CategoryController::class, 'createSubcategory'])->name('createSubCategory')->middleware('auth');
Route::post('create-post',              [PostController::class, 'createPost'])->name('createPost')->middleware('auth');
Route::post('make-publish',             [PostController::class, 'makePublish'])->name('makePublish')->middleware('auth');
Route::post('make-unpublish',           [PostController::class, 'makeUnPublish'])->name('makeUnPublish')->middleware('auth');