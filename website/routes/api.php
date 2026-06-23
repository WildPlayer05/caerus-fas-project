<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MessageController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/users', function () {
    return DB::table('users')->get();
});

Route::get('/users/{id}', function ($id) {
    $user= DB::table('users')->where('id', $id)->first();
    return response()->json($user);
});

// TEST SUPPLIERS
Route::get('/suppliers', function () {
    return DB::table('suppliers')->get();
});

Route::get('/suppliers/{id}', function ($id) {
    return DB::table('suppliers')->where('id', $id)->first();
});
Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
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
Route::post('/consumption', function(Request $request){
    $request->validate([
        'idB'=>'required|integer',
        'date'=>'required|date',
        'KW'=>'nullable|numeric',
        'mc'=>'nullable|numeric',
    ]);
    DB::table('consumption')->insert([
        'idB'=>$request->idB,
        'date'=>$request->date,
        'KW'=>$request->KW,
        'mc'=>$request->mc,
    ]);
    return response()->json([
        'message'=>'Consumption inserted'
    ], 201);
});
