<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\AwardApiController;
use App\Http\Controllers\Api\MediaApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\FileUploadApiController;
use App\Http\Controllers\Api\UserProjectAttributeApiController;
use App\Http\Controllers\Api\DevGameWidget\QuestApiController;
use App\Http\Controllers\Api\DevGameWidget\AbilityApiController;
use App\Http\Controllers\ProjectsDashboardController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Register API routes. Routes are loaded by the RouteServiceProvider within 
| a group which is assigned the "api" middleware group.
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
    Route::resource('project', ProjectApiController::class)
        ->only(['store', 'update', 'destroy']);

    // API Project attribute
    Route::resource('project.attributes', UserProjectAttributeApiController::class)
        ->only(['index', 'store', 'update', 'show', 'destroy']);

    // API Products
    Route::resource('product', ProductApiController::class)
        ->only(['store', 'update', 'destroy']);
    
    // API Awards
    Route::resource('award', AwardApiController::class)
        ->only(['store', 'update', 'destroy']);

    // API Media
    Route::resource('media', MediaApiController::class)
        ->only(['index', 'store', 'update', 'destroy']);

    // API Upload file
    Route::resource('upload-image', FileUploadApiController::class)
        ->only(['store']);

    /** APPS **/
    // DGW
    Route::resource('project.quests', QuestApiController::class)
        ->only(['store', 'show', 'update'])
        ->names([
            'store' => 'store', // Custom name for store method
            'show' => 'show', 
            'update' => 'update'
    ]);
    Route::resource('project.quest.abilities', AbilityApiController::class)
        ->only(['index', 'update', 'destroy']);
    
});

// Public data
// Route::get('/user/{user_id}', [UserPublicApiController::class, 'getUser']);
// Route::get('/project/{project_id}', [ProjectPublicApiController::class, 'getProject']);