<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CitizenController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for admin Pages
Route::prefix('/admin')->group(function(){
    Route::get('/citizens',[AdminController::class,'adminCitizens']);
    Route::get('/candidates',[AdminController::class,'adminCandidates']);
    Route::get('/',[AdminController::class,'profile']);
    Route::get('/citizens/{id}/editCitizen',[AdminController::class,'editCitizen']);
    Route::put('/citizens/update/{id}',[AdminController::class,'updateCitizen']);
    Route::get('/candidate/{id}/editCandidate',[AdminController::class,'editCandidate']);
    Route::put('/citizens/update/{id}',[AdminController::class,'updateCandidate']);
});
    
// Routes for Candidate Pages

Route::prefix('/candidate')->group(function(){
    Route::get('/citizens',[CandidateController::class,'candidateCitizens']);
    Route::get('/',[CandidateController::class,'profile']);
    Route::get('/citizens/{id}/editCitizen',[CandidateController::class,'editCitizen']);
    Route::put('/citizens/update/{id}',[CandidateController::class,'updateCitizen']);
});

//Routes for Citizen Pages

Route::prefix('/citizen')->group(function(){
    Route::get('/',[CitizenController::class,'profile'])->name('citizen.profile');
});