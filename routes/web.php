<?php
/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */

use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/symlink', function () { return view('symlink'); })->name('generate_symlink');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.homes');

Route::middleware('auth')->group(function () {
    Route::get('/users', [DashboardController::class, 'users'])->name('dashboard.users');
    Route::post('/users', [DashboardController::class, 'addUser']);
    Route::get('/users/{id}', [DashboardController::class, 'userDatas'])->whereNumber('id')->name('dashboard.user.datas');
    Route::post('/users/{id}', [DashboardController::class, 'updateUser'])->whereNumber('id');
    Route::get('/delete/users/{id}', [DashboardController::class, 'removeUser'])->whereNumber('id')->name('dashboard.user.delete');
    Route::get('/users/{entity}', [DashboardController::class, 'usersEntity'])->name('dashboard.users.entity');
    Route::post('/users/{entity}', [DashboardController::class, 'addUserEntity']);
    Route::get('/users/{entity}/{id}', [DashboardController::class, 'userEntityDatas'])->whereNumber('id')->name('dashboard.user.entity.datas');
    Route::post('/users/{entity}/{id}', [DashboardController::class, 'updateUserEntity'])->whereNumber('id');
    Route::get('/events', [DashboardController::class, 'events'])->name('dashboard.events');
    Route::post('/events', [DashboardController::class, 'addEvent']);
    Route::get('/events/{id}', [DashboardController::class, 'eventDatas'])->whereNumber('id')->name('dashboard.event.datas');
    Route::post('/events/{id}', [DashboardController::class, 'updateEvent'])->whereNumber('id');
    Route::get('/delete/events/{id}', [DashboardController::class, 'removeEvent'])->whereNumber('id')->name('dashboard.event.delete');
    Route::get('/arts', [DashboardController::class, 'arts'])->name('dashboard.arts');
    Route::post('/arts', [DashboardController::class, 'addArt']);
    Route::get('/arts/{id}', [DashboardController::class, 'artDatas'])->whereNumber('id')->name('dashboard.art.datas');
    Route::post('/arts/{id}', [DashboardController::class, 'updateArt'])->whereNumber('id');
    Route::get('/delete/arts/{id}', [DashboardController::class, 'removeArt'])->whereNumber('id')->name('dashboard.art.delete');
    Route::get('/messages', [DashboardController::class, 'messages'])->name('dashboard.messages');
    Route::post('/messages', [DashboardController::class, 'addMessage']);
    Route::get('/messages/{id}', [DashboardController::class, 'messageDatas'])->whereNumber('id')->name('dashboard.message.datas');
    Route::post('/messages/{id}', [DashboardController::class, 'updateMessage'])->whereNumber('id');
    Route::get('/delete/messages/{id}', [DashboardController::class, 'removeMessage'])->whereNumber('id')->name('dashboard.message.delete');
    Route::get('/account', [DashboardController::class, 'account'])->name('dashboard.account');
    Route::get('/account/settings', [DashboardController::class, 'account'])->name('dashboard.account.settings');
    Route::post('/account/settings', [DashboardController::class, 'updateAccount']);
});

require __DIR__.'/auth.php';
