<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Authenticated\BulletinBoard\PostsController;
use App\Http\Controllers\Authenticated\Calendar\Admin\CalendarsController;
use App\Http\Controllers\Authenticated\Calendar\General\CalendarController;
use App\Http\Controllers\Authenticated\Top\TopsController;
use App\Http\Controllers\Authenticated\Users\UsersController;


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

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function(){
    Route::namespace('Authenticated')->group(function(){
        Route::namespace('Top')->group(function(){
            Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
            Route::get('top', [TopsController::class, 'show'])->name('top.show');
        });
        Route::namespace('Calendar')->group(function(){
            Route::namespace('General')->group(function(){
                Route::get('calendar/{user_id}', [CalendarController::class, 'show'])->name('calendar.general.show');
                Route::post('reserve/calendar', [CalendarController::class, 'reserve'])->name('reserveParts');
                Route::post('delete/calendar', [CalendarController::class, 'delete'])->name('deleteParts');
            });
            Route::namespace('Admin')->group(function(){
                Route::get('calendar/{user_id}/admin', [CalendarsController::class, 'show'])->name('calendar.admin.show');
                Route::get('calendar/{date}/{part}', [CalendarsController::class, 'reserveDetail'])->name('calendar.admin.detail');
                Route::get('setting/{user_id}/admin', [CalendarsController::class, 'reserveSettings'])->name('calendar.admin.setting');
                Route::post('setting/update/admin', [CalendarsController::class, 'updateSettings'])->name('calendar.admin.update');
            });
        });
        Route::namespace('BulletinBoard')->group(function(){
            Route::get('bulletin_board/posts/{keyword?}', [PostsController::class, 'show'])->name('post.show');
            Route::get('bulletin_board/input', [PostsController::class, 'postInput'])->name('post.input');
            Route::get('bulletin_board/like', [PostsController::class, 'likeBulletinBoard'])->name('like.bulletin.board');
            Route::get('bulletin_board/my_post', [PostsController::class, 'myBulletinBoard'])->name('my.bulletin.board');
            Route::post('bulletin_board/create', [PostsController::class, 'postCreate'])->name('post.create');
            Route::post('create/main_category', [PostsController::class, 'mainCategoryCreate'])->name('main.category.create');
            Route::post('create/sub_category', [PostsController::class, 'subCategoryCreate'])->name('sub.category.create');
            Route::get('bulletin_board/post/{id}', [PostsController::class, 'postDetail'])->name('post.detail');
            Route::post('bulletin_board/edit', [PostsController::class, 'postEdit'])->name('post.edit');
            Route::get('bulletin_board/delete/{id}', [PostsController::class, 'postDelete'])->name('post.delete');
            Route::post('comment/create', [PostsController::class, 'commentCreate'])->name('comment.create');
            Route::post('like/post/{id}', [PostsController::class, 'postLike'])->name('post.like');
            Route::post('unlike/post/{id}', [PostsController::class, 'postUnLike'])->name('post.unlike');
        });
        Route::namespace('Users')->group(function(){
            Route::get('show/users', [UsersController::class, 'showUsers'])->name('user.show');
            Route::get('user/profile/{id}', [UsersController::class, 'userProfile'])->name('user.profile');
            Route::post('user/profile/edit', [UsersController::class, 'userEdit'])->name('user.edit');
        });
    });
});
