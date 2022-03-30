<?php

use App\Http\Controllers\PanelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PanelController::class, 'show']);
