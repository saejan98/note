<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\WordController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('note', NoteController::class)->only(['create', 'store', 'index']);
Route::resource('category', CategoryController::class)->only(['create', 'store']);
Route::resource('word', WordController::class)->only(['create', 'store']);
Route::get('grammar', [NoteController::class, 'grammar'])->name('grammar.index');
Route::get('word/{noteId}', [WordController::class, 'getByNoteId'])->name('get-word');
Route::get('grammar/{noteId}', [WordController::class, 'getGrammarByNoteId'])->name('grammar-noteId');
