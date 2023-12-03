<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\FilesDashboardController;
use App\Http\Controllers\AwardsDashboardController;
use App\Http\Controllers\ProductsDashboardController;
use App\Http\Controllers\ProjectsDashboardController;

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

Auth::routes();



// Homepage
Route::get('/', function () {
    return view('welcome');
});

// About
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// Products
Route::prefix('/products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/{id}/buy', [ProductController::class, 'redirect'])->name('products.redirect');
});

// Projects
Route::prefix('/projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/{project_id}/{permalink}', [ProjectController::class, 'show'])->name('projects.show');
});

// Public image access
Route::get('images/{filename}', [FileController::class, 'showImage'])->where('filename', '.*')->name('images.show');



// Dashboard
Route::middleware('auth')->group(function () {
    // Dashboard home
    Route::get('/dashboard', [ProjectsDashboardController::class, 'index'])->name('dashboard');

    // Dashboard - Projects
    Route::get('/dashboard/projects', [ProjectsDashboardController::class, 'list'])->name('dashboard.projects.list');
    Route::get('/dashboard/projects/{id}/edit', [ProjectsDashboardController::class, 'edit'])->name('dashboard.projects.edit');
    Route::get('/dashboard/projects/new', [ProjectsDashboardController::class, 'new'])->name('dashboard.projects.new');
    Route::post('/dashboard/projects/{id}/remove-award', [ProjectsDashboardController::class, 'projectRemoveAward'])->name('dashboard.projects.remove-award');

    // Dashboard - Products
    Route::get('/dashboard/products', [ProductsDashboardController::class, 'list'])->name('dashboard.products.list');
    Route::get('/dashboard/products/{id}/edit', [ProductsDashboardController::class, 'edit'])->name('dashboard.products.edit');
    Route::get('/dashboard/products/new', [ProductsDashboardController::class, 'new'])->name('dashboard.products.new');

    // Dashboard - Awards
    Route::get('/dashboard/awards', [AwardsDashboardController::class, 'index'])->name('dashboard.awards.index');
    Route::get('/dashboard/awards/{id}/edit', [AwardsDashboardController::class, 'edit'])->name('dashboard.awards.edit');
    Route::get('/dashboard/awards/new', [AwardsDashboardController::class, 'create'])->name('dashboard.awards.new');  
    Route::get('/dashboard/awards/settings', [AwardsDashboardController::class, 'settings'])->name('dashboard.awards.settings');

    // Dashboard - Files
    Route::get('/dashboard/files', [FilesDashboardController::class, 'index'])->name('dashboard.files.index');
    Route::get('/dashboard/files/{id}/edit', [FilesDashboardController::class, 'edit'])->name('dashboard.files.edit');
    Route::get('/dashboard/files/new', [FilesDashboardController::class, 'create'])->name('dashboard.files.new');

    // Dashboard - Account
    Route::get('/dashboard/account', [DashController::class, 'index'])->name('dashboard.account.index');
    Route::get('/dashboard/account/awards', [DashController::class, 'awards'])->name('dashboard.account.awards');

    // Dashboard - Profile
    Route::get('/dashboard/profile/{user_slug}', [ProfileController::class, 'index'])->name('dashboard.profile.index');
});