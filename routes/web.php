<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [FrontendController::class, 'index'])->name('index');

// About View
Route::get('about',[FrontendController::class, 'about'])->name('about');

// Engineers View
Route::group(['prefix'=>'engineers'], function (){
    Route::get('msc',[FrontendController::class, 'msc'])->name('msc');
    Route::get('bsc',[FrontendController::class, 'bsc'])->name('bsc');
    Route::get('bsc-diploma',[FrontendController::class, 'bsc_diploma'])->name('bsc_diploma');
    Route::get('diploma',[FrontendController::class, 'diploma'])->name('diploma');
});


// Thana Committee View
Route::group(['prefix'=>'thana-committee'], function (){
    Route::get('joypurhat',[FrontendController::class, 'joypurhat'])->name('joypurhat');
    Route::get('panchbibi',[FrontendController::class, 'panchbibi'])->name('panchbibi');
    Route::get('kalai',[FrontendController::class, 'kalai'])->name('kalai');
    Route::get('akkelpur',[FrontendController::class, 'akkelpur'])->name('akkelpur');
    Route::get('khetlal',[FrontendController::class, 'khetlal'])->name('khetlal');
});


Route::get('central-committee',[FrontendController::class, 'convening_member'])->name('convening_member');

// Blog View
    Route::get('blog',[BlogController::class, 'blog'])->name('blog');
    Route::get('blog/{slug}',[BlogController::class, 'details'])->name('blog.details');


// Route::group(['prefix'=>'profile'], function (){
//     Route::get('/my-profile',[FrontendController::class, 'index'])->name('index');
// });


Route::get('/gallery', [FrontendController::class, 'gallery'])->name('gallery');


Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/developer', [FrontendController::class, 'developer'])->name('developer');

Route::get('/user/{id}', [ProfileController::class, 'profileIndex'])->name('profileIndex ');
// Route::get('profile/{id}','ProfileController@index')->name('index');




Route::group(['prefix' => '/', 'as' => 'web.', 'middleware' => ['auth']], function () {
    Route::get('/home', [FrontendController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile-edit', [ProfileController::class, 'profileEdit'])->name('profileEdit');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
    Route::get('/user-profile', [ProfileController::class, 'profileIndex'])->name('profileIndex');
});





// Route::get('/profile', function () {
//     return view('user-dashboard');
// })->middleware(['auth'])->name('user.dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
