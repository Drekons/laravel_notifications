<?php

use Drek\Laravel\Notifications\Controllers\NotificationsController as NotificationsController;
use Illuminate\Support\Facades\Route;

Route::get('/notifications',[NotificationsController::class, 'index']);
Route::patch('/notifications/read/{id}', [NotificationsController::class, 'read']);
Route::delete('/notifications/{id}', [NotificationsController::class, 'destroy']);
