<?php

use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CommentControlelr;
use App\Http\Controllers\Admin\ListStoryContoller;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\TitleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Client\LoginController as ClientLoginController;
use App\Http\Controllers\Client\LogoutController as ClientLogoutController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\ViewController;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
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

Route::get('welcome', function () {
    return view('welcome');
});

// Client

Route::get('login', [ClientLoginController::class, 'show'])->name('client.login.show');
Route::post('login', [ClientLoginController::class, 'login'])->name('client.login.perform');
Route::get('logout', [ClientLogoutController::class, 'perform'])->name('client.logout.perform');
Route::get('create-account', [RegisterController::class, 'create'])->name('client.register.show');
Route::post('create-account', [RegisterController::class, 'store'])->name('client.register.perform');



Route::get('/', [ViewController::class, 'index'])->name('home.index');

Route::get('/categories/{slug}', [ViewController::class, 'category'])->name('home.category');
// Route::get('/stories/{slug}', [ViewController::class, 'summary_story'])->name('home.story.index');
// Route::get('/stories/{slugstory}/contents/{slug}', [ViewController::class, 'content_chapter'])->name('home.content');
// Route::get('/stories/{slugstory}/contents', [ViewController::class, 'content_chapter_short'])->name('home.content.short');
Route::group(['prefix' => '/stories'], function () {
    Route::get('/{slug}', [ViewController::class, 'summary_story'])->name('home.story.index');
    Route::get('/{slugstory}/contents/{slug}', [ViewController::class, 'content_chapter'])->name('home.content');
    Route::get('/{slugstory}/contents', [ViewController::class, 'content_chapter_short'])->name('home.content.short');
    Route::post('/{id_user}/{id_story}', [ViewController::class, 'comment'])->name('comment');
});




Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
})->name('admin.dashboard')->middleware('auth');



/**
 * Login Routes
 */
Route::get('admin/login', [LoginController::class, 'show'])->name('login.show');
Route::post('admin/login', [LoginController::class, 'login'])->name('login.perform');
/**
 * Logout Routes
 */
Route::get('admin/logout', [LogoutController::class, 'perform'])->name('logout.perform');
Route::prefix('admin')->middleware('auth')->group(function () {
    // Route::resource('roles', RoleController::class);
    // Route::resource('users', UserController::class);
    // Route::resource('categories', CategoryController::class);
    // Route::resource('titles', TitleController::class);
    // Route::resource('stories', StoryController::class);
    // Route::resource('chapters', ChapterController::class);

    Route::prefix('configs')->controller(ConfigController::class)->name('configs.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('role:super-admin');
        Route::post('/', 'addConfig')->name('add')->middleware('role:super-admin');
        Route::get('/create', 'create')->name('create')->middleware('role:super-admin');
        Route::get('/{coupon}', 'show')->name('show')->middleware('role:super-admin');
        Route::put('/{coupon}', 'updateConfig')->name('update')->middleware('role:super-admin');
        Route::delete('/{coupon}', 'deleteConfig')->name('delete')->middleware('role:super-admin');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('role:super-admin');
    });
    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('role:super-admin');
        Route::post('/', 'store')->name('store')->middleware('role:super-admin');
        Route::get('/create', 'create')->name('create')->middleware('role:super-admin');
        Route::get('/{coupon}', 'show')->name('show')->middleware('role:super-admin');
        Route::put('/{coupon}', 'update')->name('update')->middleware('role:super-admin');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('role:super-admin');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('role:super-admin');
    });
    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-user');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-user');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-user');
        Route::put('/{coupon}', 'update')->name('update')->middleware('role:super-admin');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-user');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('role:super-admin');
    });

    Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-category');
        Route::post('/', 'store')->name('store')->middleware('permission:create-category');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-category');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-category');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-category');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-category');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-category');
    });
    Route::prefix('titles')->controller(TitleController::class)->name('titles.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-title');
        Route::post('/', 'store')->name('store')->middleware('permission:create-title');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-title');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-title');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-title');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-title');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-title');
    });
    Route::prefix('stories')->controller(StoryController::class)->name('stories.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-story');
        Route::post('/', 'store')->name('store')->middleware('permission:create-story');
        Route::get('/create', 'create')->name('create')->middleware('permission:create-story');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-story');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-story');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-story');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-story');
    });
    Route::prefix('chapters')->controller(ChapterController::class)->name('chapters.')->group(function () {
        Route::post('/', 'store')->name('store')->middleware('permission:create-chapter');
        Route::get('/create/{id}', 'create')->name('create')->middleware('permission:create-chapter');
        Route::get('/{coupon}', 'show')->name('show')->middleware('permission:show-chapter');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-chapter');
        Route::delete('/{coupon}', 'destroy')->name('destroy')->middleware('permission:delete-chapter');
        Route::get('/{coupon}/edit', 'edit')->name('edit')->middleware('permission:update-chapter');
    });
    Route::prefix('list-stories')->controller(ListStoryContoller::class)->name('list-stories.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-list-story');
        Route::get('/{coupon}', 'view')->name('show')->middleware('permission:show-list-story');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-list-story');
    });
    Route::prefix('list-stories-comment')->controller(CommentControlelr::class)->name('list-stories-comment.')->group(function () {
        Route::get('/', 'index')->name('index')->middleware('permission:show-list-story');
        Route::get('/{coupon}', 'view')->name('show')->middleware('permission:show-list-story');
        Route::put('/{coupon}', 'update')->name('update')->middleware('permission:update-list-story');
    });

    Route::get('tinymce', function () {
        return view('admin.fi.tinymce');
    });
    Route::get('cdkeditor', function () {
        return view('admin.fi.ckeditor');
    });
});
