<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::group(["prefix" => "posts"], function () {
    Route::get("/", [PostsController::class, "index"])->name("posts.index");
    Route::get("/create", [PostsController::class, "create"])->name("posts.create");
    Route::post("/", [PostsController::class, "store"])->name("posts.store");

});

Route::group(["prefix" => "tags"], function(){

    Route::get("/", [TagsController::class, "index" ]) -> name("tags.index");
    Route::get("/create", [TagsController::class, "create" ]) -> name("tags.create");
    Route::post("/", [TagsController::class, "store" ]) -> name("tags.store");

    Route::patch("/create", [TagsController::class, "update" ]) -> name("tags.update");


});

Route::group(["prefix" => "categories"], function () {
    Route::get("/", [CategoriesController::class, "index"])->name("categories.index");
    Route::get("/create", [CategoriesController::class, "create"])->name("categories.create");
    Route::post("/", [CategoriesController::class, "store"])->name("categories.store");

});

