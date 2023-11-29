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


// Authenticated routes
Route::middleware(['auth:api'])->group(function () {
    
    // API User
    Route::post('/remote-login', [UserApiController::class, 'remoteLogin']);
    Route::get('/user', [UserApiController::class, 'getCurrentUser']);
    Route::get('/profile', [UserApiController::class, 'getProfile']);

    // API Project
    Route::prefix('/project')->group(function () {
        // Route::get('/{id}/edit', [ProjectsDashboardController::class, 'editProject'])->name('api.dashboard.project.edit');
        Route::post('/new', [ProjectApiController::class, 'createProject'])->name('api.dashboard.project.create');
        Route::patch('/{id}/save', [ProjectApiController::class, 'updateProject'])->name('api.dashboard.project.update');
        Route::delete('/{id}', [ProjectApiController::class, 'deleteProject'])->name('api.dashboard.project.delete');
        Route::post('{id}/remove-award', [ProjectsDashboardController::class, 'removeAward'])->name('api.dashboard.project.remove-award');
    });

    // API Project attribute
        Route::prefix('/project/{project_id}/attributes')->group(function () {
        Route::post('/', [ProjectApiController::class, 'saveAttributes']);
        Route::get('/', [ProjectApiController::class, 'getAttributes']);
        Route::post('/{attribute}', [ProjectApiController::class, 'saveAttribute']);
        Route::get('/{attribute}', [ProjectApiController::class, 'getAttribute']);
    });

    // API Products
    Route::prefix('/product')->group(function () {
        Route::post('/create', [ProductApiController::class, 'createProduct'])->name('api.dashboard.product.create');
        Route::patch('/{id}/save', [ProductApiController::class, 'updateProduct'])->name('api.dashboard.product.update');
        Route::delete('/{id}', [ProductApiController::class, 'deleteProduct'])->name('api.dashboard.product.delete');
        // Route::post('{id}/remove-award', [ProductApiController::class, 'removeAwardProduct'])->name('api.dashboard.product.remove-award');
    });
    
    // API Awards
    Route::prefix('/award')->group(function () {
        Route::post('/new', [AwardApiController::class, 'createAward'])->name('api.dashboard.award.create');
        Route::patch('/{id}/save', [AwardApiController::class, 'updateAward'])->name('api.dashboard.award.update');
        Route::delete('/{id}/delete', [AwardApiController::class, 'deleteAward'])->name('api.dashboard.award.delete');
    });

    // API Media
    Route::prefix('/media')->group(function () {
        Route::get('/new', [MediaApiController::class, 'readMedia'])->name('api.dashboard.media.read');
        Route::post('/new', [MediaApiController::class, 'createMedia'])->name('api.dashboard.media.create');
        Route::patch('/{id}/save', [MediaApiController::class, 'updateMedia'])->name('api.dashboard.media.update');
        Route::delete('/{id}', [MediaApiController::class, 'deleteMedia'])->name('api.dashboard.media.delete');
    });

    // API Upload file
    Route::post('/upload-image', [FileUploadApiController::class, 'uploadImages'])->name('api.dashboard.media.upload');
    

    /** APPS **/
    // Project quests
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