<?php

use Illuminate\Support\Facades\Route;

Route::get('/ranking/{movementId}', 'RankingController@getRanking');