<?php declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Imhotep\Facades\Route;

// Call the default action if the route is missing
Route::setDefaultAction(fn() => abort(404) );

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::controller(PostController::class)->prefix('posts')->group(function () {
    Route::get('/{slug}', 'show')->name('posts.show');

    Route::get('/add', 'create')->name('posts.add');
    Route::post('/add', 'store');

    Route::get('/edit/{id}', 'edit')->name('posts.edit');
    Route::post('/edit/{id}', 'store');

    Route::get('/remove/{id}', 'remove')->name('posts.remove');
});

Route::controller(AuthController::class)->prefix('auth')->group(function () {
    Route::get('/login', 'index')->name('auth.login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('auth.logout');
});

Route::get('/lang/toggle', function () {
    $to = config('app.locale') === 'ru' ? 'en' : 'ru';

    session()->set('locale', $to);

    return redirect()->back();
});
