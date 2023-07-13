<?php

use App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Agent\AgentDashboard;
use App\Http\Controllers\Admin\AgentController;

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

// ? Authentication Routes
Route::get('/', [Login::class, 'index'])->name('auth.login');
Route::get('/login', [Login::class, 'index'])->name('auth.login');
Route::post('/user/login', [Login::class, 'login2'])->name('login.user');
Route::get('/logout', [Login::class, 'logout'])->name('auth.logout');
Route::get('/forgot_password', [Login::class, 'forgotPassword'])->name('auth.forgotPassword');
Route::post('/forgot_password/send_password_reset_link', [Login::class, 'sendResetPasswordLink'])->name('auth.sendResetPasswordLink');
Route::get('/reset_password/{token}', [Login::class, 'resetPassword'])->name('password.reset');
Route::post('/reset_password/password/update', [Login::class, 'updatePassword'])->name('password.change');

//  Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');

    Route::get('/agents', [AgentController::class, 'index'])->name('admin.agents');
    Route::get('/agents/add', [AgentController::class, 'create'])->name('admin.addAgent');
    Route::post('/agents/add/agent', [AgentController::class, 'store'])->name('add.agent');
    Route::get('/agents/edit/{agent}', [AgentController::class, 'edit'])->name('admin.editAgent');
    Route::patch('/agents/update/{agent}', [AgentController::class, 'update'])->name('admin.updateAgent');
    Route::delete('/agents/{agent}', [AgentController::class, 'delete'])->name('admin.deleteAgent');
});

//  Agent Dashboard Routes
Route::middleware(['auth'])->prefix('agent')->group(function () {
    Route::get('/dashboard', [AgentDashboard::class, 'index'])->name('agent.dashboard');

});
