<?php

use App\Models\Boat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Main Pages */
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/rent', function () {
    $boats = Boat::getRentBoats(['id', 'name', 'description', 'is_recomended', 'low_season_price as price']);
    return view('pages.rent.rent', compact('boats'));
})->name('rent');

Route::get('/rent/show/{boat_id}', function ($boat_id) {
    $boat = Boat::findOrFail($boat_id);
    return view('pages.rent.rentShow', compact('boat'));
})->name('rent.show');

Route::post('/rent/show', function (Request $request) {
    return $request;
})->name('rent.show.reserve');

Route::get('/sale', function () {
    $boats = Boat::getSaleBoats(['id', 'name', 'description']);
    return view('pages.sale.sale', compact('boats'));
})->name('sale');

Route::get('/sale/show', function () {
    return view('pages.sale.saleShow');
})->name('sale.show');

Route::get('/toys', function () {
    return view('pages.toys');
})->name('toys');

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/news', function () {
    return view('pages.news.newsIndex');
})->name('news');

Route::get('/news/show', function () {
    return view('pages.news.newsShow');
})->name('news.show');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
