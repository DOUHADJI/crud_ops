<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SigninController;

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

Route::group(["prefix" => "auth"], function () {
    Route::group(["middleware" => ["guest"]], function () {
        Route::get("/signin", [SigninController::class, "create"])->name("auth.signin");
        Route::post("/signin", [SigninController::class, "store"]);

        Route::get("/login", [LoginController::class, "create"])->name("auth.login");
        Route::post("/login", [LoginController::class, "store"]);
    });
    Route::post("/logout", LogoutController::class)->name("auth.logout")->middleware("auth");
});

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["prefix" => "posts"], function () {

        Route::get("/", [PostsController::class, "index"])->name("posts.index");

        Route::get("/create", [PostsController::class, "create"])->name("posts.create");

        Route::post("/", [PostsController::class, "store"])->name("posts.store");

        Route::get("/edit/{post}", [PostsController::class, "edit"])->name("posts.edit");

        Route::patch("/update/{post}", [PostsController::class, "update"])->name("posts.update");

        Route::delete("/{post}", [PostsController::class, "destroy"])->name("posts.destroy");

    });

    Route::group(["prefix" => "tags"], function () {

        Route::get("/", [TagsController::class, "index"])->name("tags.index");
        Route::get("/create", [TagsController::class, "create"])->name("tags.create");
        Route::post("/", [TagsController::class, "store"])->name("tags.store");

    });

    Route::group(["prefix" => "categories"], function () {
        Route::get("/", [CategoriesController::class, "index"])->name("categories.index");
        Route::get("/create", [CategoriesController::class, "create"])->name("categories.create");
        Route::post("/", [CategoriesController::class, "store"])->name("categories.store");

    });

});
