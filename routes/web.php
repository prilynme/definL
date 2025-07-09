<?php

use App\Http\Controllers\Defin\Test;
use Illuminate\Support\Facades\Route;

Route::get("/", [Test::class, 'tanggal']);
