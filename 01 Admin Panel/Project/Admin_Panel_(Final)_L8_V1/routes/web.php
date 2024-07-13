<?php


use Illuminate\Support\Facades\Auth;
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

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StuffController;
use Illuminate\Support\Facades\Route;
// namespace App\Http\Controllers;

use App\Models\User;
use Facade\Ignition\Middleware\AddLogs;
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

// Route::get('/', function () {
//     return redirect('admin/dashboard');
// });

Route::get('/approval-pending', function () {
    if(Auth::check()) return redirect('/');

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

// require __DIR__.'/auth.php';



Route::middleware(['auth', 'isApprove:true'])->group(function(){

    Route::get('/', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //profile
    Route::get('profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::post('admin/passwordupdate', [AdminController::class, 'AdminUpdatePassword'])->name('admin.password.store');
    Route::post('academic', [AdminController::class, 'Academic'])->name('admin.profile.academin');

    //Notice
    Route::get('addnotice', [AdminController::class, 'AdminAddNotice'])->name('admin.addnotice');
    Route::post('notice/store', [AdminController::class, 'AdminNoticeStore'])->name('admin.notice.store');
    Route::get('notices', [AdminController::class, 'AdminNoticeUpdate'])->name('admin.updatenotice');
    Route::get('notice/{id}/edit', [AdminController::class, 'AdminEditNotice'])->name('admin.editnotice');
    Route::post('notices/edited/{id}', [AdminController::class, 'AdminNoticeEdited'])->name('admin.notice.edited');
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
    Route::get("events/{id}/edit", [AdminController::class, 'editEvents'])->name('editEvent');
    Route::post("event/edited/{id}", [AdminController::class, 'editedEvent'])->name('admin.event.edited');
    Route::get('event/delete/{id}', [AdminController::class, 'deleteEvent'])->name('deleteEvent');



    //publications
    Route::get('publication/new', [AdminController::class, 'newPublication'])->name('admin.newPublication');
    Route::post('admin/publications/store', [AdminController::class, 'publicationStore'])->name('admin.publication.store');
    // delete publication
   Route::get('admin/publication/delete/{id}', [AdminController::class, 'PublicationDelete'])->name('admin.publication.delete');
    // edit view publication
    Route::get('publications/{id}',[AdminController::class, 'AdminPublicationEdit'])->name('admin.publication.edit');
    // store the edited publication
    Route::post('admin/publication/update/{id}', [AdminController::class, 'PublicationEidited'])->name('publicationUpdate');

    // add Conference Proceedings
    // Route::get('conference/new', [AdminController::class, 'AddConferencePaper'])->name('newConferencePaper');
    // //store conference paper
    // Route::post('admin/conference/news', [AdminController::class, 'ConferencePaperStore'])->name('newConferencePaper.store')



    //Carousel Images
    // Route::get('admin/carousel', [AdminController::class, 'CarouselShow'])->name('admin.carousel');

    Route::get('carousel', [AdminController::class, 'CarouselShow'])->name('images.form');
    Route::post('admin/images/update', [AdminController::class, 'updateImages'])->name('image.update');



    //side bar publication
    Route::get('publications',[AdminController::class, 'AllPublication'])->name('side.publication');




    //Education
    Route::get('education/add', [AdminController::class, 'AddEducation'])->name('addEducation');
    Route::post('admin/education/store', [AdminController::class, 'StoreEducation'])->name('StoreEducation');
    Route::get('educations', [AdminController::class, 'ShowAllEducation'])->name('ShowAllEducation');
    Route::get('educations/{id}', [AdminController::class, 'EditEducation'])->name('EditEducation');
    Route::get('admin/education/edited/{id}',[AdminController::class, 'EditedEducation'])->name('EditedEducation');
    Route::get('admin/education/delete/{id}', [AdminController::class, 'DeleteEducation'])->name('DeleteEducation');

    //Experience
    Route::get('experience/add', [AdminController::class, 'AddExperience'])->name('addExperience');
    Route::post('admin/experiencess/store', [AdminController::class, 'StoreExperience'])->name('StoreExperience');
    Route::get('experience', [AdminController::class, 'ShowAllExperience'])->name('ShowAllExperience');
    Route::get('experiences/{id}', [AdminController::class, 'EditExperience'])->name('EditExperience');
    Route::get('admin/experience/edited/{id}',[AdminController::class, 'EditedExperience'])->name('EditedExperience');
    Route::get('admin/experience/delete/{id}', [AdminController::class, 'DeleteExperience'])->name('DeleteExperience');
    Route::get('experience/other', [AdminController::class, 'OtherExperience'])->name('addOtherExperience');
    Route::post('admin/experience/others', [AdminController::class, 'StoreOtherExperience'])->name('storeProffExperience');
    Route::get('other-experience/{id}', [AdminController::class, 'SingleOtherExperience'])->name('singleOtherExperience');
    Route::post('admin/experience/others/{id}', [AdminController::class, 'OtherExperienceEdited'])->name('OtherExperienceEdited');
    Route::get('admin/experience/otherss/delete/{id}', [AdminController::class, 'OtherExperiencedelete'])->name('OtherExperiencedelete');


    // if(Auth::user()->controller_role == 'staff') return back()->with('error', 'Invalid link!');

    //award
    Route::get('award/add', [AdminController::class, 'AddAward'])->name('addAward');
    Route::post('admin/awards', [AdminController::class, 'StoreAward'])->name('StoreAward');
    Route::get('award', [AdminController::class, 'ShowAllAward'])->name('ShowAllAward');
    Route::get('awards/{id}', [AdminController::class, 'EditAward'])->name('EditAward');
    Route::get('admin/award/edited/{id}',[AdminController::class, 'EditedAward'])->name('EditedAward');
    Route::get('admin/award/delete/{id}', [AdminController::class, 'DeleteAward'])->name('DeleteAward');


    // Rsearch Profile
    Route::get('research-profile',[AdminController::class, 'AllResearchProfile'])->name('AllResearchProfile');
    Route::get('research-profile/add',[AdminController::class, 'AddResearchProfile'])->name('AddResearchProfile');
    Route::post('admin/research-profiles',[AdminController::class, 'StoreResearchProfile'])->name('StoreResearchProfile');
    ROute::get('research-profile/{id}', [AdminController::class, 'EditResearcProfile'])->name('EditResearcProfile');
    ROute::post('admin/research-profiles/{id}', [AdminController::class, 'EditedResearcProfile'])->name('EditedResearcProfile');
    ROute::get('admin/research-profiless/{id}', [AdminController::class, 'DeleteResearchProfile'])->name('DeleteResearchProfile');


     //Education Ranking
     Route::get('admin/education_up/{id}', [AdminController::class, 'EducationRankUp'])->name('admin.EducationRankup');
     Route::get('admin/education_down/{id}', [AdminController::class, 'EducationRankDown'])->name('admin.EducationRankDown');


      //Publication Ranking
    Route::get('admin/publication_up/{id}', [AdminController::class, 'PublicationRankUp'])->name('admin.PublicationRankup');
    Route::get('admin/publication_down/{id}', [AdminController::class, 'PublicationRankDown'])->name('admin.PublicationRankDown');


    //  events Ranking
     Route::get('admin/events_uo/{id}', [AdminController::class, 'EventsRankUp'])->name('admin.EventsRankUp');
     Route::get('admin/events_down/{id}', [AdminController::class, 'EventsRankDown'])->name('admin.EventsRankDown');


    //   General Experience Ranking
    Route::get('admin/experience_up/{id}', [AdminController::class, 'ExperienceRankUp'])->name('ExperienceRankup');
    Route::get('admin/experience_down/{id}', [AdminController::class, 'ExperienceRankDown'])->name('ExperienceRankDown');

    //Other Experience Ranking
    Route::get('admin/otherexperience_up/{id}', [AdminController::class, 'OtherExperienceRankUp'])->name('OtherExperienceRankup');
    Route::get('admin/otherexperience_down/{id}', [AdminController::class, 'OtherExperienceRankDown'])->name('OtherExperienceRankDown');


    //  //Award Ranking
     Route::get('admin/award_up/{id}', [AdminController::class, 'AwardRankUp'])->name('admin.AwardRankup');
     Route::get('admin/award_down/{id}', [AdminController::class, 'AwardRankDown'])->name('admin.AwardRankDown');

    //   //Research Profile Ranking
    Route::get('admin/research_profile_up/{id}', [AdminController::class, 'ResearchRankUp'])->name('admin.ResearchProfileRankup');
    Route::get('admin/research_profile_down/{id}', [AdminController::class, 'ResearchRankDown'])->name('admin.ResearchProfileRankDown');


//research interest
    Route::get('admin/research-interest',[AdminController::class,'researchInt'])->name('admin.researchInt');
    Route::post('admin/researchInt',[AdminController::class, 'researchIntSave'])->name('StoreResearchinterest');



    //Administration
    Route::get('admin/Administration', [AdminController::class, 'Administration'])->name('admin.ControlAllUser');
    // Route::get('admin/Administration/user/{id}',[AdminController::class, 'AdministratorUserEdit'])->name('admin.ControlUserEdit');
    // Route::post('admin/Administration/users/{id}',[AdminController::class, 'AdministratorUserEdited'])->name('admin.ControlUserEdited');
    // Route::get('admin/Administration/users/delete/{id}',[AdminController::class, 'AdministratorUserDelete'])->name('admin.ControlUserDelete');
    Route::get('admin/Administration/users/up/{id}',[AdminController::class, 'AdministratorUserRankUP'])->name('admin.ControlUserRankUp');
    Route::get('admin/Administration/users/down/{id}',[AdminController::class, 'AdministratorUserRankDown'])->name('admin.ControlUserRankDown');




    Route::get('question-add', [AdminController::class, 'AddQuestionBank'])->name('admin.questionBank.show');
    Route::post('admin/question-adds', [AdminController::class, 'StoreQuestionBank'])->name('admin.questionBank.store');
    Route::get('qustion-papers', [AdminController::class, 'AllQuestion'])->name('admin.allQuestion');
    Route::get('question-paper/{id}',[AdminController::class, 'QuestionEdit'])->name('admin.question.edit');
    Route::post('admin/question-paperss/{id}', [AdminController::class, 'QuestionEdited'])->name('admin.question.edited');
    Route::get('admin/question-delete/{id}',[AdminController::class, 'QuestionDelete'])->name('admin.question.delete');


    Route::get('carousel-image-all',[AdminController::class, 'CarouselAll'])->name('admin.carousel-img');
    Route::get('carousel-image-add',[AdminController::class, 'CarouselAdd'])->name('admin.carousel-img.add');
    Route::post('admin/carousel-img-store', [AdminController::class, 'CarouselStore'])->name('admin.carousel-img.store');
    Route::get('carousel-image-edit/{id}',[AdminController::class, 'CarouselEdit'])->name('admin.carousel-img.edit');
    Route::post('admin/carousel-img-edited/{id}',[AdminController::class, 'CarouselEdited'])->name('admin.carousel-edited');
    Route::get('admin/carousel-delete/{id}',[AdminController::class, 'CarouselDelete'])->name('admin.carousel-img-delete');
    Route::get('admin/carousel-rank-up/{id}',[AdminController::class, 'CarouselRankUp'])->name('admin.carousel-rank-up');
    Route::get('admin/carousel-rankDown/{id}',[AdminController::class, 'CarouselRankDown'])->name('admin.carousel-rank-down');


    Route::get('dept_info',[AdminController::class, 'DeptInfo'])->name('DeptInfo');
    Route::post('admin/dept_infos/{id}',[AdminController::class, 'DeptInfoStore'])->name('DeptInfoStore');


    Route::get('Password_reset',[AdminController::class, 'StuffPasswordUpdate'])->name('stuff.passwordUpdate');

    //Experiences
    // Route::get('admin/experience/add', [AdminController::class, 'AddExperience'])->name('addExperience');


});
//end group admin middleware

Route::middleware(['auth', 'isApprove:stuff'])->group(function(){

    Route::get('/stuff/dashboard', [StuffController::class, 'StuffDashboard'])->name('stuff.dashboard');
}); //end group stuff middleware



// reset password


// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





