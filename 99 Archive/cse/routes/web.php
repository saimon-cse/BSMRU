<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StuffController;
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

Route::get('/dashboard/{id}', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

    Route::get('addnotice', [AdminController::class, 'AdminAddNotice'])->name('admin.addnotice');

    Route::post('notice/store', [AdminController::class, 'AdminNoticeStore'])->name('admin.notice.store');

    Route::get('updatenotice', [AdminController::class, 'AdminNoticeUpdate'])->name('admin.updatenotice');

    Route::get('notice/{id}', [AdminController::class, 'AdminEditNotice'])->name('admin.editnotice');

    Route::post('admin/edited/{id}', [AdminController::class, 'AdminNoticeEdited'])->name('admin.notice.edited');

    Route::get('addEvents', [AdminController::class, 'AddEvent'])->name('admin.addevent');

    Route::post('admin/passwordupdate', [AdminController::class, 'AdminUpdatePassword'])->name('admin.password.store');

    Route::post('admin/event/store', [AdminController::class, 'AdminEventStore'])->name('admin.event.store');

    Route::get('accountant', [AdminController::class, 'accountant']);

    Route::get('notice/detete/{id}', [AdminController::class, 'NoticeDelete'])->name('admin.noticedelete');

    Route::post('academic', [AdminController::class, 'Academic'])->name('admin.profile.academin');

    // Route::post('admin/publications/{id}', [AdminController::class, 'PublicationUpdate'])->name('admin.publication.update');

    Route::get("events", [AdminController::class, 'allEvents'])->name('admin.allEvents');

    Route::get("events/{id}", [AdminController::class, 'editEvents'])->name('editEvent');

    Route::post("event/edited/{id}", [AdminController::class, 'editedEvent'])->name('admin.event.edited');

    Route::get('event/delete/{id}', [AdminController::class, 'deleteEvent'])->name('deleteEvent');

});
//end group admin middleware

Route::middleware(['auth', 'role:stuff'])->group(function(){

    Route::get('/stuff/dashboard', [StuffController::class, 'StuffDashboard'])->name('stuff.dashboard');
}); //end group stuff middleware

