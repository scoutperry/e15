<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ListController;

Route::get('/', [PageController::class, 'welcome']);
Route::get('/support', [PageController::class, 'support']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
    // Make sure the create route comes before `/books/{slug?}` so it takes precedence
    Route::get('/books/create', [BookController::class, 'create'])->middleware('auth');

    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/{title}', [BookController::class, 'show']);
    Route::get('/search/{category}/{subcategory}', [BookController::class, 'search']);
    Route::get('/books/{slug}/edit', [BookController::class, 'edit']);
    Route::put('/books/{slug}', [BookController::class, 'update']);
    // Note the use of the post method in this route

    Route::get('/list', [ListController::class, 'show']);
    Route::get('/list/{slug?}/add', [ListController::class, 'add']);
    Route::post('/list/{slug?}/save', [ListController::class, 'save']);
});


Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    $debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

Route::any('/practice/{n?}', [PracticeController::class, 'index']);