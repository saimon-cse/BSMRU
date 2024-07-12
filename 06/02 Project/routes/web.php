<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::post('logout', [LoginController::class, 'logout'])->name('logout');



Route::middleware(['role:admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.home');


    Route::get('component/all', [AdminController::class, 'allComponent'])->name('admin.component.all');
    Route::get('component/entry', [AdminController::class, 'entryComponentPage'])->name('admin.component.entry.page');
    Route::post('component/entrys', [AdminController::class, 'EntryComponent'])->name('admin.component.entry.save');
    Route::put('component/update', [AdminController::class, 'updateComponent'])->name('admin.component.update');
    Route::delete('component/delete/{id}', [AdminController::class, 'deleteComponent'])->name('admin.component.delete');

    Route::get('component/issue', [AdminController::class, 'showIssueComponentForm'])->name('issue.component.form');
    Route::post('component/issue', [AdminController::class, 'issueComponent'])->name('issue.component.store');

    Route::get('/fetch-component-details/{id}', [AdminController::class, 'fetchComponentDetails']);

    // routes/web.php

    Route::get('component/issued-items', [AdminController::class, 'issuedItems'])->name('issued.items.all');

    // routes/web.php
    Route::get('component/return', [AdminController::class, 'showReturnComponentForm'])->name('return.component.form');
Route::post('component/return', [AdminController::class, 'returnComponent'])->name('return.component.store');

// Route::get('/issued-items', [IssuedItemController::class, 'index'])->name('issued.items.all');
Route::post('/return-component/{id}', [AdminController::class, 'updateReturn'])->name('return.component.update');
Route::delete('/delete-issued-item/{id}', [AdminController::class, 'destroy'])->name('delete.issued.item');


// Route::get('/issued-items', [IssuedItemsController::class, 'index'])->name('issued.items.index');

Route::post('admin/passwordupdate', [AdminController::class, 'AdminUpdatePassword'])->name('admin.password.store');
Route::get('Password_reset',[AdminController::class, 'PasswordUpdate'])->name('stuff.passwordUpdate');


});

Route::middleware(['role:student'])->group(function () {

    Route::get('stud/home', [App\Http\Controllers\HomeController::class, 'index'])->name('student.home');



});


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

