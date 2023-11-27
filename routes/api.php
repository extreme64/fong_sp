<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\AwardApiController;
use App\Http\Controllers\Api\MediaApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\ActivityApiController;
use App\Http\Controllers\Api\FileUploadApiController;
use App\Http\Controllers\ProjectsDashboardController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Login
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Current user accessable data
Route::post('/remote-login', [UserApiController::class, 'remoteLogin']);
Route::middleware('auth:api')->group(function () {
    Route::get('/profile', [UserApiController::class, 'getProfile']);
});

Route::middleware('auth:api')->group(function () {

    Route::post('/upload-image', [FileUploadApiController::class, 'uploadImages'])->name('dashboard-media.upload');;

    Route::prefix('/project/{project_id}/attributes')->group(function () {
        Route::post('/', [ProjectApiController::class, 'saveAttributes']);
        Route::get('/', [ProjectApiController::class, 'getAttributes']);
        Route::post('/{attribute}', [ProjectApiController::class, 'saveAttribute']);
        Route::get('/{attribute}', [ProjectApiController::class, 'getAttribute']);

    });

    Route::prefix('/project')->group(function () {
        Route::get('/{id}/edit', [App\Http\Controllers\ProjectsDashboardController::class, 'projectEdit'])->name('dashboard-project.edit');
        Route::post('/new', [ProjectApiController::class, 'projectNew'])->name('dashboard-project.new');
        Route::patch('/{id}/save', [ProjectApiController::class, 'projectSave'])->name('dashboard-project.save');
        Route::delete('/{id}', [ProjectApiController::class, 'projectDelete'])->name('api-dashboard-project.delete');

        // Route::get('new', [App\Http\Controllers\ProjectsDashboardController::class, 'projectNew'])->name('dashboard-project.new');
        Route::post('{id}/remove-award/?aid={awardId}', [App\Http\Controllers\ProjectsDashboardController::class, 'projectRemoveAward'])->name('dashboard-project.remove-award');
        // Route::get('/projects-dashboard/settings', [App\Http\Controllers\DashboardController::class, 'settings'])->name('projects-dashboard-projects-settings');
    });

    // API Products
    Route::prefix('/product')->group(function () {
        Route::post('/create',      [ProductApiController::class, 'create'])->name('api-dashboard-product.create');
        Route::patch('/{id}/save',  [ProductApiController::class, 'update'])->name('api-dashboard-product.update');
        Route::delete('/{id}',      [ProductApiController::class, 'delete'])->name('api-dashboard-product.delete');

        Route::post('{id}/remove-award/?aid={awardId}', [ProductApiController::class, 'productRemoveAward'])->name('dashboard-product.remove-award');
    });

    // API Awards
    Route::prefix('/award')->group(function () {
        Route::patch('/{id}/save', [AwardApiController::class, 'edit'])->name('dashboard-award.edit'); 
        Route::post('/new', [AwardApiController::class, 'create'])->name('api-dashboard-award.create');   
        Route::delete('/{id}/delete', [AwardApiController::class, 'delete'])->name('api-dashboard-award.delete');   
    });

    // API Media
    Route::prefix('/media')->group(function () {
        Route::post('/new', [MediaApiController::class, 'create'])->name('dashboard-media.create');
        Route::get('/new', [MediaApiController::class, 'read'])->name('dashboard-media.read');
        Route::patch('/{id}/save', [MediaApiController::class, 'update'])->name('dashboard-media.update');
        Route::delete('/{id}', [MediaApiController::class, 'delete'])->name('dashboard-media.delete');
    });

});

Route::middleware('auth:api')->group(function () {
     Route::prefix('/project/{project_id}/quests')->group(function () {
        Route::post('/', [ActivityApiController::class, 'createProjectQuest']);
        Route::get('/id/{quest_id}', [ActivityApiController::class, 'getProjectQuest']);
        Route::patch('/id/{quest_id}', [ActivityApiController::class, 'updateProjectQuest']);
        Route::patch('/id/{quest_id}/ability/{ability_id}', [ActivityApiController::class, 'updateProjectQuestAddAbility']);
        Route::post('/id/{quest_id}/abilities', [ActivityApiController::class, 'getProjectQuestAddAbilitiesInfo']);
    });
});



// Public data
Route::get('/user/{user_id}', [UserPublicApiController::class, 'getUser']);
Route::get('/project/{project_id}', [ProjectPublicApiController::class, 'getProject']);