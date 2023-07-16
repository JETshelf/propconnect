<?php

use App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\AdminInquiries;
use App\Http\Controllers\Agent\AgentDashboard;
use App\Http\Controllers\Admin\AdminProperties;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Agent\AgentInquiries;
use App\Http\Controllers\Agent\AgentProperties;

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
Route::get('/', [HomeController::class, 'index'])->name('home.page');
Route::get('/properties/view/{property}', [HomeController::class, 'view'])->name('home.viewProperty');
Route::get('/agent', [HomeController::class, 'addAgent'])->name('home.addAgent');
Route::post('/agent/add', [HomeController::class, 'registerAgent'])->name('home.registerAgent');
Route::post('/property/inquiry', [HomeController::class, 'storeInquiry'])->name('home.addInquiry');



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

    Route::get('/properties', [AdminProperties::class, 'index'])->name('admin.properties');
    Route::get('/properties/add', [AdminProperties::class, 'create'])->name('admin.addProperty');
    Route::post('/properties/add/property', [AdminProperties::class, 'store'])->name('add.property');
    Route::get('/properties/edit/{property}', [AdminProperties::class, 'edit'])->name('admin.editProperty');
    Route::get('/properties/view/{property}', [AdminProperties::class, 'view'])->name('admin.viewProperty');
    Route::patch('/properties/update/{property}', [AdminProperties::class, 'update'])->name('admin.updateProperty');
    Route::delete('/properties/{property}', [AdminProperties::class, 'delete'])->name('admin.deleteProperty');

    Route::get('/inquiries', [AdminInquiries::class, 'index'])->name('admin.inquiries');
    Route::get('/inquiries/edit/{inquiry}', [AdminInquiries::class, 'edit'])->name('admin.editInquiry');
    Route::get('/inquiries/view/{inquiry}', [AdminInquiries::class, 'view'])->name('admin.viewInquiry');
    Route::patch('/inquiries/update/{inquiry}', [AdminInquiries::class, 'update'])->name('admin.updateInquiry');
    Route::delete('/inquiries/{inquiry}', [AdminInquiries::class, 'delete'])->name('admin.deleteInquiry');
});

//  Agent Dashboard Routes
Route::middleware(['auth'])->prefix('agent')->group(function () {
    Route::get('/dashboard', [AgentDashboard::class, 'index'])->name('agent.dashboard');

    Route::get('/properties', [AgentProperties::class, 'index'])->name('agent.properties');
    Route::get('/properties/add', [AgentProperties::class, 'create'])->name('agent.addProperty');
    Route::post('/properties/add/property', [AgentProperties::class, 'store'])->name('add.property');
    Route::get('/properties/edit/{property}', [AgentProperties::class, 'edit'])->name('agent.editProperty');
    Route::get('/properties/view/{property}', [AgentProperties::class, 'view'])->name('agent.viewProperty');
    Route::patch('/properties/update/{property}', [AgentProperties::class, 'update'])->name('agent.updateProperty');
    Route::delete('/properties/{property}', [AgentProperties::class, 'delete'])->name('agent.deleteProperty');

    Route::get('/inquiries', [AgentInquiries::class, 'index'])->name('agent.inquiries');


});
