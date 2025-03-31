<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TyperTitleController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/',[ HomeController::class, 'index'])->name('home');

Route::get('blog', function () {
    return view('frontend.blog'); // callback function for blog - controller to be used later
});

Route::get('blog-details', function () {
    return view('frontend.blog-details'); // callback function for blogDetails - controller to be used later
});

Route::get('portfolio', function () {
    return view('frontend.portfolio'); // callback function for portfolio - controller to be used later
});

Route::get('portfolio-details', function () {
    return view('frontend.portfolio-details'); // callback function for portfolioDetails - controller to be used later
});

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// group for admin routes
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('hero', HeroController::class);
    Route::resource('typer-title', TyperTitleController::class);

    // Services Routes
    Route::resource('service', ServiceController::class);

    // About Routes
    Route::get('resume/download', [AboutController::class, 'resumeDownload'])->name('resume.download');
    Route::resource('about', AboutController::class);

    // Portfolio Catergory Routes
    Route::resource('portfolio-category', PortfolioCategoryController::class);

    // Portfolio Item Routes
    Route::post('update-status/{id}', [PortfolioItemController::class, 'updateStatus'])->name('update-status');
    Route::resource('portfolio-item', PortfolioItemController::class);
});

require __DIR__.'/auth.php';