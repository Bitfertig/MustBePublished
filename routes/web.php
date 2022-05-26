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

    // Mbptest::withUnpublished()->find(2)->publish();

    // $mbptest = new Mbptest;
    // $mbptest->name = "Test2";
    // $mbptest->save(); // Optional
    // $mbptest->publish();

    // $mbptest = Mbptest::withUnpublished()->find(3);
    // $mbptest->publish();
    // $mbptest->unpublish();

    dd(Mbptest::all(), Mbptest::withUnpublished()->get());

});
