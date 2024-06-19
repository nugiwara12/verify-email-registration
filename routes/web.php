<?php

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Users;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendVerificationMailer;




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
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    return view('auth.login');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ----------------------------- AUTH CONTROLLER -----------------------//
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::match(['post', 'put'], '/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');

});



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.save');
require __DIR__.'/auth.php';

// ----------------------------- Chat Box -----------------------//
Route::middleware('auth')->group(function (){
    Route::get('/chat',Index::class)->name('chat.index');
    Route::get('/chat/{query}',Chat::class)->name('chat');
    Route::get('/users',Users::class)->name('users');
});

// ----------------------------- User management -----------------------//
Route::controller(UserManagementController::class)->prefix('usermanagement')->group(function () {
    Route::get('', 'index')->name('usermanagement');
    Route::get('create', 'create')->name('usermanagement.create');
    Route::post('store', 'store')->name('usermanagement.store');
    Route::get('show/{id}', 'show')->name('usermanagement.show');
    Route::get('edit/{id}', 'edit')->name('usermanagement.edit');
    Route::put('edit/{id}', 'update')->name('usermanagement.update');
    Route::delete('destroy/{id}', 'destroy')->name('usermanagement.destroy');
});

Route::get('/get-notification-count', [NotificationController::class, 'getNotificationCount']);
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

// ----------------------------- OTP -----------------------//
Route::post('reset_password', [AuthController::class,'resetPassword']);
Route::get('forgot-password', function () {
    if(Session::has('current_user')){
        return redirect('dashboard');
    }else{
        return view('forgot-password');
    }
})->middleware('guest')->name('password.request');

Route::get('re-new-password', function (){

    return view('new-password')->with('failed','Invalid OTP code');
});
Route::post('/new-password', [AuthController::class,'findUserToChangePass']);
route::get('test-mail',function(){
    // Inside your function/method
    Session::put('reset_otp_code', random_int(000000,999999));
    Mail::to('jacinto011200@gmail.com')->send(new SendVerificationMailer());
});
Route::get('/new-password', [AuthController::class, 'newPassword'])->name('new-password');
}); //end of prvent back log