<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ping', fn() => 'pong');//Ça veut dire : "Si quelqu'un visite la page /ping, affiche simplement le mot 'pong'"
