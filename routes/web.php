<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PinnedArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get("/", [ArticleController::class, "fetchArticle"]);
// Route::post("/pin", [PinnedArticleController::class, 'pinArticle'])->name('pin.article');
// Route::get("/pin", [PinnedArticleController::class, 'getPinnedArticles'])->name('get.article');
// Route::delete("/pin", [PinnedArticleController::class, 'unpinArticle'])->name('delete.article');

Route::resource('/', ArticleController::class);
Route::resource('pin', PinnedArticleController::class);
