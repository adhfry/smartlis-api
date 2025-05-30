<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['SmartLIS' => app()->version()];
});

require __DIR__ . '/auth.php';