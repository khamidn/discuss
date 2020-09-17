<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Diskusi;

Route::get('/', Diskusi\Index::class)->name('diskusi.index');
Route::get('/detail-diskusi', Diskusi\Show::class)->name('diskusi.show');

Route::group(['namespace' => 'App\Http\Controllers'], static function(){
	Auth::routes();	
});


Route::get('/home', Diskusi\Index::class)->name('home');
