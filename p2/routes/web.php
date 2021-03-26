<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\HyflexController;
use App\Http\Controllers\PageController;

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

Route::get('/', [PageController::class, 'welcome']);
//Route::get('/support', [PageController::class, 'support']);
Route::get('/search', [HyflexController::class, 'search']);
Route::post('/store', [HyflexController::class, 'store']);
/*
Route::get('/', function () {
    return view('welcome');
});
*/

# New route
Route::get('/example', function () {
    return 'Example...';
});

//Route::get('/books/{title}', [BookController::class, 'show']);