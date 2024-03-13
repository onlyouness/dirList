<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('userIdex.header');
});
Route::get('listings', function () {
    $dataList = Session::get('dataList');

    // Clear the $dataList from the session after retrieving it
    Session::forget('dataList');

    return view('userIdex.listings', compact('dataList'));
})->name("listings");
Route::get('/user/dashboard', function () {
    return view('userIdex.dashboard');
});
Route::post("/set-lang", [HomeController::class, "setLang"]);
Route::post("/searchList", [HomeController::class, "searchList"]);
Route::post("/login",[LoginController::class,"login"]);
Route::post("/register",[LoginController::class,"register"]);
Route::get("/logout", [LoginController::class, "userLogOut"]);