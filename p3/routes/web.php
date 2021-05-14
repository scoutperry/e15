<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecipeController;


// Route::get('/', function () {
//     // Eventually we'll want to return a view with our customized home page.
//     // For now, we’ll just return a simple string
//     return '<h1>P1 SooChef</h1>';
// });
Route::get('/', [PageController::class, 'welcome']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/recipes', [RecipeController::class, 'index']);
    Route::get('/recipes/create', [RecipeController::class, 'create']);
    Route::post('/recipes', [RecipeController::class, 'store']);
    Route::get('/recipes/{title}', [RecipeController::class, 'show']);
    Route::get('/recipes/{slug}/edit', [RecipeController::class, 'edit']);
    Route::put('/recipes/{slug}', [RecipeController::class, 'update']);

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
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});