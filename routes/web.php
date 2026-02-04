<?php

//use chripController
use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index']);

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     //return view('welcome');
//     return view('home');
// });