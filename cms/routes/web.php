<?php
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//ユーザーが /boards URL にアクセスすると、BoardController::class で定義されている show() メソッドが実行されます

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/boards/{board}',[BoardController::class, 'show'])->name('boards.show');
    Route::put('/boards/{board}',[BoardController::class, 'update'])->name('boards.update');
    Route::get('/boards', [BoardController::class,'index'])->name('boards');
    Route::post('/boards', [BoardController::class,'store'])->name('boards.store');

    Route::post('/boards/{board}/lists', [\App\Http\Controllers\BoardListController::class,'store'])->name('boardLists.store');

});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
