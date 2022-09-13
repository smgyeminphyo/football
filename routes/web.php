<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\MediaController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function() {
    return redirect('/userview');
});

*/
Route::get('/home', function() {
    return redirect('/admin');
});

Route::get('/', [ViewController::class, 'index']);

Route::get('/userview', [ViewController::class, 'index']);

Route::get('/admin', [ContentController::class, 'index'] 
);
Auth::routes();

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
*/

//create match
Route::get('/soccers/add', [ContentController::class, 'add']);

Route::post('/soccers/add', [ContentController::class, 'create']);

//insert links
Route::get('/match/insertLink/{id}', [MediaController::class, 'createLink']);

Route::post('/match/insertLink/{id}', [MediaController::class, 'saveLink']);

//videoplayer
Route::get('/view/{mid}/{lid}', [MediaController::class, 'index']);

Route::get('/match/{id}', [MediaController::class, 'index']);

//match edit
Route::get('/match/edit/{id}',[ContentController::class, 'edit']);

Route::post('/match/edit/{id}',[ContentController::class, 'update']);

Route::get('/match/delete/{id}',[ContentController::class, 'delete']);

//link
Route::get('/link/delete/{id}', [ContentController::class, 'linkDelete']);