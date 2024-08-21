<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SubscriberController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::post('subscribe-guest',          [SubscriberController::class, 'subscribeGuest']);
Route::post('unsubscribe-guest',        [SubscriberController::class, 'unsubscribeGuest']);
Route::post('create-newsletter',        [NewsletterController::class, 'createNewsletter']);
Route::get('get-test',                  [NewsletterController::class, 'testMate']);


Route::post('update-category',          [CategoryController::class, 'updateCategory']);
Route::post('delete-category',          [CategoryController::class, 'deleteCategory']);

Route::post('create-subcategory',       [CategoryController::class, 'createSubcategory']);
Route::post('update-subcategory',       [CategoryController::class, 'updateSubcategory']);
Route::post('delete-subcategory',       [CategoryController::class, 'deleteSubcategory']);

Route::post('create-author',            [AuthorController::class, 'createAuthor']);
Route::post('update-author',            [AuthorController::class, 'updateAuthor']);
Route::post('delete-author',            [AuthorController::class, 'deleteAuthor']);

Route::post('fetch-author',             [AuthorController::class, 'fetchAuthor']);




Route::post('search',                    [SearchController::class, 'search']);
Route::post('filter-cat',                [SearchController::class, 'catFilter']);
Route::post('filter-subcat',             [SearchController::class, 'subCatFilter']);
Route::post('filter-tag',                [SearchController::class, 'tagFilter']);
