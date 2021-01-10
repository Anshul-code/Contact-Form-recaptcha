<?php

use Anshul\Contact\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Anshul\Contact\Http\Controllers'],function(){
    Route::get('contact',[ContactController::class, 'index'])->name('contact')->middleware('web');
    Route::post('contact/submit',[ContactController::class, 'store'])->name('contactSubmit')->middleware('web');
});