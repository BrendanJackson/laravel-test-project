<?php

use App\Http\Controllers\ImageFileController;
use App\Http\Controllers\UserActionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('/dashboard');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Additional user profile routes
Route::group(['middleware' => ['auth', 'verified']], function () {
    // User & Profile...
    Route::get('/user/profile/activity', [UserActionsController::class, 'show'])
        ->name('profile.activity');
});

// Super admin routes
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    // list users
    Route::get('/users', [UserController::class, 'index'])
        ->name('admin.users.list');

    // create new user
    Route::get('/users/new', [UserController::class, 'create'])
        ->name('admin.users.create');

    // POST Save new user
    Route::post('/users/store', [UserController::class, 'store'])
        ->name('admin.users.store');

    // View existing user
    Route::get('/users/{id}', [UserController::class, 'show'])
        ->whereNumber('id')
        ->name('admin.users.show');

    // Edit existing user
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])
        ->whereNumber('id')
        ->name('admin.users.edit');

    // POST Update a user
    Route::post('/users/{id}/save', [UserController::class, 'update'])
        ->whereNumber('id')
        ->name('admin.users.update');
});




// Watermark
Route::get('/watermark', [ImageFileController::class, 'index']);

Route::post('/add-watermark', [ImageFileController::class, 'imageFileUpload'])->name('image.watermark');