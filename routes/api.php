<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BranchController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::put('/banks/update-multiple', [BankController::class, 'updateMultiple'])->name('banks.updateMultiple');
// Route::resource('banks', BankController::class);

Route::prefix('banks')->group(function () {
    Route::resource('/', BankController::class);
    Route::put('/update-multiple', [BankController::class, 'updateMultiple'])->name('banks.updateMultiple');
    Route::delete('/delete-multiple', [BankController::class, 'deleteMultiple'])->name('banks.deleteMultiple');

});

Route::resource('branches', BranchController::class);

// Route::put('/banks/update-multiple', function () {
//     dd('abc');
// })->name('banks.updateMultiple');


