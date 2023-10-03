<?php
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CardListController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ChildController;

//ユーザーが /boards URL にアクセスすると、BoardController::class で定義されている show() メソッドが実行されます

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::get('/boards/{board}', [BoardController::class, 'show'])->name('boards.show');
    Route::put('/boards/{board}', [BoardController::class, 'update'])->name('boards.update');
    Route::get('/boards', [BoardController::class, 'index'])->name('boards');
    Route::post('/boards', [BoardController::class, 'store'])->name('boards.store');

    Route::post('/boards/{board}/lists', [CardListController::class,'store'])->name('cardLists.store');
    Route::post('/cards', [CardController::class, 'store'])->name('cards.store');
    Route::put('/cards/{card}', [CardController::class, 'update'])->name('cards.update');
    Route::put('/cards/{card}/move', [CardController::class, 'move'])->name('cards.move');
    Route::delete('/card-lists/{cardList}', [CardListController::class, 'destroy'])->name('cardLists.destroy');

    Route::get('/child/{board}', [BoardController::class, 'show'])->name('child.show');
    Route::put('/child/{board}', [BoardController::class, 'update'])->name('child.update');
    Route::get('/child', [ChildController::class, 'index'])->name('child');
    Route::post('/child', [BoardController::class, 'store'])->name('child.store');
    Route::post('/child/{board}/lists', [CardListController::class,'store'])->name('cardLists.store');
});

Route::get('/', function () {
    return Inertia::render('/boards', [
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
