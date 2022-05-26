<?php

use Bitfertig\MustBePublished\Models\Mbptest;
use Illuminate\Support\Facades\Route;



Route::get('/mbptest', function(){

    // $mbptest = new Mbptest;
    // $mbptest->name = "Adam";
    // $mbptest->save();

    // $mbptest = new Mbptest;
    // $mbptest->name = "Eva";
    // $mbptest->save();

    dd(Mbptest::withUnpublished()->get());

});
