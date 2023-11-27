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

// Dashboard
Route::middleware('auth')->group(function () {

    // Dashboard home
    Route::get('/dashboard/', [App\Http\Controllers\ProjectsDashboardController::class, 'index'])->name('dashboard');

    // Dashboard - Projects
    Route::get('/dashboard/projects', [App\Http\Controllers\ProjectsDashboardController::class, 'list'])->name('dashboard-projects.list');
    Route::get('/dashboard/project/{id}/edit', [App\Http\Controllers\ProjectsDashboardController::class, 'edit'])->name('dashboard-project.edit');
    Route::get('/dashboard/project/new', [App\Http\Controllers\ProjectsDashboardController::class, 'new'])->name('dashboard-project.new');

    Route::post('/dashboard/project/{id}/remove-award/?aid={awardId}', [App\Http\Controllers\ProjectsDashboardController::class, 'projectRemoveAward'])->name('dashboard-project.remove-award');
    // Route::get('/dashboard/settings', [App\Http\Controllers\DashboardController::class, 'settings'])->name('dashboard-projects-settings');

    // Dashboard - Products
    Route::get('/dashboard/product',            [ProductsDashboardController::class, 'list'])->name('dashboard-product.list');
    Route::get('/dashboard/product/{id}/edit',  [ProductsDashboardController::class, 'edit'])->name('dashboard-product.edit');
    Route::get('/dashboard/product/new',        [ProductsDashboardController::class, 'new'])->name('dashboard-product.new');

    // Dashboard - Awards
    Route::get('/dashboard/awards',             [AwardsDashboardController::class, 'index'])->name('dashboard-awards.index');
    Route::get('/dashboard/award/{id}/edit',    [AwardsDashboardController::class, 'edit'])->name('dashboard-award.edit');
    Route::get('/dashboard/award/new',          [AwardsDashboardController::class, 'create'])->name('dashboard-award.create');  
    Route::get('/dashboard/award/settings',     [AwardsDashboardController::class, 'settings'])->name('dashboard-award.settings');

    // Dashboard - Files
    Route::get('/dashboard/files', [FilesDashboardController::class, 'index'])->name('medias.dashboard-files.index');
    Route::get('/dashboard/file/{id}/edit', [FilesDashboardController::class, 'edit'])->name('medias.dashboard-file.edit');
    Route::get('/dashboard/file/new', [FilesDashboardController::class, 'create'])->name('medias.dashboard-file.create');

    // Dashboard - Account
    Route::get('/account/', [App\Http\Controllers\DashController::class, 'index'])->name('account.dash');
    Route::get('/account/awards', [App\Http\Controllers\DashController::class, 'awards'])->name('dash.awards');

    // Dashboard - Profile
    Route::get('/profile/{user_slug}', [ProfileController::class, 'index'])->name('profile.dash');

});

//Homepage
Route::get('/', function () {
    return view('welcome');
});

// About
Route::get('/about', [AboutController::class, 'index']);

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/buy', [ProductController::class, 'redirect'])->name('products.redirect');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/project/{project_id}/{permalink}', [ProjectController::class, 'show'])->name('projects.show');

// Public image access
Route::get('images/{filename}', function ($filename) {

    $path = storage_path('app/public/images/' . $filename);

    if (!File::exists($path)) {
        // abort(404);
        return "feefef";
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = response($file, 200);
    $response->header('Content-Type', $type);

    return $response;
})->where('filename', '.*');