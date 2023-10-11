<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utilisateur;

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

Route::post('/inscription', [Utilisateur::class,'inscription']);
Route::get('/inscription',function (){
    return "Page d\'inscription ";
});
Route::put('/profil', [Utilisateur::class,'modificationProfil']);
//Route::patch('/profil',[Utilisateur::class,'modification_email'])

Route::get('/email/verify', function () {
    return "Page de verification d'email";
    //return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
use Illuminate\Foundation\Auth\EmailVerificationRequest;
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
/*use Illuminate\Http\Request;
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
*/