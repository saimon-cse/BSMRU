<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StuffController;
use Illuminate\Support\Facades\Route;
// namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;



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

Route::get('/', function(){
    return view('welcome');
});

Route::get('/approval-pending', function () {
    return view('approval-pending');
})->name('approval-pending');

Route::get('/dashboard/{id}', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','roll:false'])->group(function(){
    Route::get('/approval-pending', function () {
        return view('approval-pending');
    })->name('approval-pending');

});

Route::middleware(['auth', 'role:admin'])->group(function(){

    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //profile
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('admin/passwordupdate', [AdminController::class, 'AdminUpdatePassword'])->name('admin.password.store');
    Route::post('academic', [AdminController::class, 'Academic'])->name('admin.profile.academin');

    //Notice
    Route::get('addnotice', [AdminController::class, 'AdminAddNotice'])->name('admin.addnotice');
    Route::post('notice/store', [AdminController::class, 'AdminNoticeStore'])->name('admin.notice.store');
    Route::get('updatenotice', [AdminController::class, 'AdminNoticeUpdate'])->name('admin.updatenotice');
    Route::get('notice/{id}', [AdminController::class, 'AdminEditNotice'])->name('admin.editnotice');
    Route::post('admin/edited/{id}', [AdminController::class, 'AdminNoticeEdited'])->name('admin.notice.edited');
    Route::get('notice/detete/{id}', [AdminController::class, 'NoticeDelete'])->name('admin.noticedelete');
    //notice Ranking
    Route::get('admin/notices/{id}/up', [AdminController::class, 'noticeRankUp'])->name('admin.noticeRankup');
    Route::get('admin/notices/{id}/down', [AdminController::class, 'noticeRankDown'])->name('admin.noticeRankDown');

    // Route::get('accountant', [AdminController::class, 'accountant']);
    // Route::post('admin/publications/{id}', [AdminController::class, 'PublicationUpdate'])->name('admin.publication.update');


    //Events
    Route::get('addEvents', [AdminController::class, 'AddEvent'])->name('admin.addevent');
    Route::post('admin/event/store', [AdminController::class, 'AdminEventStore'])->name('admin.event.store');
    Route::get("events", [AdminController::class, 'allEvents'])->name('admin.allEvents');
    Route::get("events/{id}", [AdminController::class, 'editEvents'])->name('editEvent');
    Route::post("event/edited/{id}", [AdminController::class, 'editedEvent'])->name('admin.event.edited');
    Route::get('event/delete/{id}', [AdminController::class, 'deleteEvent'])->name('deleteEvent');



    //publications
    Route::get('admin/publication/new', [AdminController::class, 'newPublication'])->name('admin.newPublication');
    Route::post('admin/publications', [AdminController::class, 'publicationStore'])->name('admin.publication.store');
    // delete publication
   Route::get('admin/publication/delete/{id}', [AdminController::class, 'PublicationDelete'])->name('admin.publication.delete');
    // edit view publication
    Route::get('admin/publications/{id}',[AdminController::class, 'AdminPublicationEdit'])->name('admin.publication.edit');
    // store the edited publication
    Route::post('admin/publication/update/{id}', [AdminController::class, 'PublicationEidited'])->name('publicationUpdate');

    // add Conference Proceedings
    // Route::get('conference/new', [AdminController::class, 'AddConferencePaper'])->name('newConferencePaper');
    // //store conference paper
    // Route::post('admin/conference/news', [AdminController::class, 'ConferencePaperStore'])->name('newConferencePaper.store')



    //Carousel Images
    // Route::get('admin/carousel', [AdminController::class, 'CarouselShow'])->name('admin.carousel');

    Route::get('admin/carousel', [AdminController::class, 'CarouselShow'])->name('images.form');
    Route::post('admin/images/update', [AdminController::class, 'updateImages'])->name('image.update');



    //side bar publication
    Route::get('admin/publication/all',[AdminController::class, 'AllPublication'])->name('side.publication');




    //Education
    Route::get('admin/education/add', [AdminController::class, 'AddEducation'])->name('addEducation');
    Route::post('admin/education/store', [AdminController::class, 'StoreEducation'])->name('StoreEducation');
    Route::get('admin/educations', [AdminController::class, 'ShowAllEducation'])->name('ShowAllEducation');
    Route::get('admin/educations/{id}', [AdminController::class, 'EditEducation'])->name('EditEducation');
    Route::get('admin/education/edited/{id}',[AdminController::class, 'EditedEducation'])->name('EditedEducation');
    Route::get('admin/education/delete/{id}', [AdminController::class, 'DeleteEducation'])->name('DeleteEducation');

    //Experience
    Route::get('admin/experience/add', [AdminController::class, 'AddExperience'])->name('addExperience');
    Route::post('admin/experiencess/store', [AdminController::class, 'StoreExperience'])->name('StoreExperience');
    Route::get('admin/experience/all', [AdminController::class, 'ShowAllExperience'])->name('ShowAllExperience');
    Route::get('admin/experiences/{id}', [AdminController::class, 'EditExperience'])->name('EditExperience');
    Route::get('admin/experience/edited/{id}',[AdminController::class, 'EditedExperience'])->name('EditedExperience');
    Route::get('admin/experience/delete/{id}', [AdminController::class, 'DeleteExperience'])->name('DeleteExperience');

    //award
    Route::get('admin/award/add', [AdminController::class, 'AddAward'])->name('addAward');
    Route::post('admin/awards', [AdminController::class, 'StoreAward'])->name('StoreAward');
    Route::get('admin/award', [AdminController::class, 'ShowAllAward'])->name('ShowAllAward');
    Route::get('admin/awards/{id}', [AdminController::class, 'EditAward'])->name('EditAward');
    Route::get('admin/award/edited/{id}',[AdminController::class, 'EditedAward'])->name('EditedAward');
    Route::get('admin/award/delete/{id}', [AdminController::class, 'DeleteAward'])->name('DeleteAward');


    //Experiences
    // Route::get('admin/experience/add', [AdminController::class, 'AddExperience'])->name('addExperience');


});
//end group admin middleware

Route::middleware(['auth', 'role:stuff'])->group(function(){

    Route::get('/stuff/dashboard', [StuffController::class, 'StuffDashboard'])->name('stuff.dashboard');
}); //end group stuff middleware



// reset password


// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
