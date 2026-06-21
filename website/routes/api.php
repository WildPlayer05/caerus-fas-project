<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\MessageController;

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

Route::middleware('auth:')->get('/profile', function (Request $request) {
    return $request->user();
});

//Chat
Route::get("/getMessages/{id}/{last}", [MessageController::class, 'getIdMessages']);
Route::get("/getUsers", [MessageController::class, 'getUsers']);
Route::post("/sendMessage", [MessageController::class, 'sendAdminMessage']);

//Website Settings
Route::get("/setMeme/{boolean}", function ($boolean) {
    $path = app()->environmentFilePath();
    $key = 'MEME';

    file_put_contents($path, preg_replace(
        "/^{$key}=.*/m",
        "{$key}={$boolean}",
        file_get_contents($path)
    ));

});
Route::get("/setRegistration/{boolean}", function ($boolean) {
    $path = app()->environmentFilePath();
    $key = 'REGISTRATION';

    file_put_contents($path, preg_replace(
        "/^{$key}=.*/m",
        "{$key}={$boolean}",
        file_get_contents($path)
    ));

});
Route::get("/setChat/{boolean}", function ($boolean) {
    $path = app()->environmentFilePath();
    $key = 'CHAT';

    file_put_contents($path, preg_replace(
        "/^{$key}=.*/m",
        "{$key}={$boolean}",
        file_get_contents($path)
    ));

});
Route::get("/setAlert/{boolean}", function ($boolean) {
    $path = app()->environmentFilePath();
    $key = 'ALERT';

    file_put_contents($path, preg_replace(
        "/^{$key}=.*/m",
        "{$key}={$boolean}",
        file_get_contents($path)
    ));

});
Route::get("/getSettings", function () {
    return response()->json(['MEME' => env('MEME'), 'REGISTRATION' => env('REGISTRATION'), 'CHAT' => env('CHAT'), 'ALERT' => env('ALERT'), ], 200);
});
