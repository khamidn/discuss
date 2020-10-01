<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\{ Diskusi, File };

Route::get('/', Diskusi\Index::class)->name('diskusi.index');
Route::get('/pertayaan/{discussion}', Diskusi\Show::class)->name('diskusi.show');

Route::get('/files', File\FileUpload::class)->name('file-upload.index');

Route::group(['namespace' => 'App\Http\Controllers'], static function(){
	Auth::routes();	
});


Route::get('/home', Diskusi\Index::class)->name('home');
