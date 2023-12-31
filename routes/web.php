<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/** api controller*/

use App\Http\Controllers\Api\OpenWeatherController as ApiOpenWeatherController;
use App\Http\Controllers\Api\ContentController as ApiContentController;

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

Route::name('homepage')->get('/', function () {
    return Inertia::render('Index', []);
});
Route::name('about')->get('/about', function () {
    return Inertia::render('About', []);
});

Route::group(['prefix' => 'api', 'middleware' => ['throttle:500,1']], function () {
    Route::name('weather-get-of-city')->post('/get-weather-of-city', [ApiOpenWeatherController::class, 'show']);
    Route::name('get-personal-content')->get('/get-personal-content', [ApiContentController::class, 'personal_data']);
    Route::name('get-personal-socials')->get('/get-personal-socials', [ApiContentController::class, 'socials']);
});

// Route::name('about')->get('/about', function () {
//     return Inertia::render('Index', []);
// });

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
