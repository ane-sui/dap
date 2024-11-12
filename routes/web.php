<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\ExtController;
use App\Http\Controllers\ExtensionController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\GovController;
use App\Http\Controllers\GovernmentController;
use App\Http\Controllers\inbox;
use App\Http\Controllers\IrrigationController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\StakeController;
use App\Http\Controllers\StakeholderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('farms', FarmController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('irrigations', IrrigationController::class);
    Route::resource('crops', CropController::class);
    Route::resource('suppliers',SupplierController::class);
    Route::resource('buyers',BuyerController::class);
    Route::resource('governments',GovernmentController::class);
    Route::resource('blogs',BlogController::class);
    Route::resource('comments',CommentController::class);
    Route::resource('extensions', ExtensionController::class);
    Route::resource('reply',ReplyController::class);
    Route::resource('stakeholder', StakeholderController::class);

    Route::resource('inbox', inbox::class);
    Route::resource('gov', GovController::class);
    Route::resource('ext', ExtController::class);
    Route::resource('buy', BuyController::class);
    Route::resource('sell', SellController::class);
    Route::resource('bank', BankController::class);
    Route::resource('stake', StakeController::class);
    Route::resource('chat', ChatController::class);

    Route::resource('users',UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
