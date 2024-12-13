<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $pdf = 'file.pdf';
    return view('pdf-viewer', compact('pdf'));
});

Route::get('/11EF787947ABD2FCA5031E0018000014', function () {
    $pdf = 'file2.pdf';
    return view('pdf-viewer', compact('pdf'));
});

Route::get('/site/view', function () {
    if (request()->has('id') && request()->id == 994312) {
        $pdf = 'file3.pdf';
    } else if (request()->has('id') && request()->id == 993725) {
        $pdf = 'file5.pdf';
    } else if (request()->has('id') && request()->id == 994906) {
        $pdf = 'file7.pdf';
    } else if (request()->has('id') && request()->id == 994223) {
        $pdf = 'file9.pdf';
    }
    return view('pdf-viewer', compact('pdf'));
});


Route::get('/11EF787951ABD8FCA7019E0018000027', function () {
    $pdf = 'file4.pdf';
    return view('pdf-viewer', compact('pdf'));
});

Route::get('/11EF787969ABD1FCA2744E0038000071', function () {
    $pdf = 'file6.pdf';
    return view('pdf-viewer', compact('pdf'));
});

Route::get('/11EF791519ABD1FCA2744E0081000046', function () {
    $pdf = 'file8.pdf';
    return view('pdf-viewer', compact('pdf'));
});