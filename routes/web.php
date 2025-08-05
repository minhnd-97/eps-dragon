<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckActiveUser;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;

Route::get('/lien-he', function () {
    return view('pages.contact');
})->name('contact.form');;

Route::post('/lien-he', function () {
    return back()->with('success', 'Cảm ơn bạn đã gửi thông tin!');
})->name('contact.send');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gioi-thieu', [HomeController::class, 'introduction'])->name('introduction');
Route::get('/san-pham', [ProductController::class, 'index'])->name('products.index');
Route::get('/san-pham/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/ung-dung', [\App\Http\Controllers\NewsController::class, 'application'])->name('news.application');
Route::get('/tin-tuc', [\App\Http\Controllers\NewsController::class, 'new'])->name('news.new');
Route::get('/du-an', [\App\Http\Controllers\NewsController::class, 'product'])->name('news.product');
Route::get('/news/{slug}', [\App\Http\Controllers\NewsController::class, 'show'])->name('news.show');

Route::middleware(['auth', CheckActiveUser::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
    ->middleware([CheckRole::class . ':admin'])
    ->name('admin.')  // Add this to prefix route names with "admin."
    ->group(function () {
        Route::resource('partners', AdminPartnerController::class);
        Route::resource('users', AdminUserController::class);
        Route::patch('admin/users/{user}/toggle-activation', [AdminUserController::class, 'toggleActivation'])
            ->name('users.toggleActivation');
        Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class)->only(['index', 'edit', 'update']);
        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
        Route::resource('news', \App\Http\Controllers\Admin\NewsController::class);
    });

require __DIR__.'/auth.php';
