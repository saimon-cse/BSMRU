<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Auth;

use App\Models\Notices;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use App\Models\Events;
use App\Models\Carousel;
use App\Models\Educations;
use App\Models\Award;
use App\Models\Experience;
use App\Models\Publications;
use Illuminate\Support\Facades\Log;
// use app\Models\Notces;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\Rules;



class AdminController extends Controller
{
    // public function home(){
    //     $id = Auth::user()->user_id;
    //     $profileData = User::find($id);
    //     return view('welcome',compact('$profileData'));


    // }



    public function AdminDashboard(){
        // if(Route::has('login')){
            $id = Auth::user()->user_id;
            $profileData = User::find($id);
            // $dept = DB::table('dept_attributes')->where('id',"=",'1')->get();
            return view('admin.index', compact('profileData'));
        // }else{
        //     return view  ('auth.login');
        // }

    }//end methodx

    /**
     * Destroy an authenticated session.
     */
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }//end method

    public function AdminProfile(){
        $id = Auth::user()->user_id;
        $profileData = User::find($id);

        $publications = DB::table('publications')->where('user', "=", Auth::user()->user_id)->get();

        return view('admin.profile', compact('profileData', 'publications'));
    }//end method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->user_id;
        $data = User::find($id);

        $data->name = $request->fullName;
        $data->researchInt = $request->message;
        $data->designation = $request->designation;
        $data->special_desig = $request->special_desig;
        $data->dept = $request-> dept;
        $data->institute = $request->institute;
        $data->country = $request->country;
        $data->phone = $request->phone;
        $data->email = $request->email;

        if($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data -> save();
        return redirect()->back();


    }//end method

    Public function Academic(Request $request){
        $id = Auth::user()->user_id;
        $data = User::find($id);

        $data->researchInt = $request->message;

        $data -> save();
        return redirect() -> back();

    }
    //end



    public function AdminUpdatePassword(Request $request){
        $request->validate([
            'currentPassword' => 'required',
            'newpassword' => 'required | confirmed',

        ]);

        $request->validate([
            // 'token' => ['required'],
            'currentPassword' => ['required'],
            'newpassword' => ['required',  Rules\Password::defaults()],
        ]);

        if(!Hash::check($request->currentPassword, auth::user()->password)){
            $notification = array(
                'message' => 'Old password doesnot match!',
                'alert-type'=>'error'
            );
            return back()->with($notification);
        }

        User::whereId(auth()->user()->id)->update([
            'password'=>Hash::make($request->newpassword)
        ]);

        $notification = array(
            'message' => 'Password change successfully',
            'alert-type'=>'success'
        );
        return back()->with($notification);
    }
    //end method

    public function AdminAddNotice(Request $request){
        $id = Auth::user()->user_id;
        $profileData = User::find($id);
        return view('admin.addnotice', compact('profileData'));
    }//end method

    public function AdminNoticeStore(Request $request) {
        $id = Auth::user()->user_id;
        $data = User::find($id);
        $request->validate([
            'not_date' => 'required',
            'not_title' => 'required|max:150',
            'not_file' => 'required',
        ]);

        // Increment the rank of all existing notices
        Notices::query()->increment('rank');

        $notices = new Notices();
        $notices->not_date = $request->not_date;
        $notices->not_title = $request->not_title;
        $notices->not_des = $request->not_des;
        $notices->rank = 1;  // Set the rank of the new notice to 1

        if ($request->file('not_file')) {
            $file = $request->file('not_file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/notices'), $filename);
            $notices->not_file = $filename;
        }

        $notices->save();

        return redirect('updatenotice')->with('success', 'Notice Added');
    }


    public function AdminNoticeUpdate(Request $request){
        $id = Auth::user()->user_id;
        $profileData = User::find($id);
        $notices = DB::Table('notices')->get();
        return view('admin.updatenotice', compact('profileData'),['notices'=>DB::Table('notices')->orderBY('rank')->paginate(15)]);


    }//end method

    public function AdminEditNotice($id){
        $profileid = Auth::user()->user_id;
        $profileData = User::find($profileid);

        $notice = DB::Table('notices')->find($id);
        if (!$notice) {
            return redirect()->back()->with('error', 'notice not found.');
        }

        return view('admin.editNotice', compact('profileData'), compact('notice'));


    }//end method

    public function AdminNoticeEdited(Request $request, $id){

        $notice = DB::Table('notices')->find($id);
        $filename = $notice->not_file;

        if($request->file('not_file')){
            $file = $request->file('not_file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/notices/pdf'), $filename);
        }

        DB::Table('notices')->where('id',$id)->update([
            'not_date'=> $request->not_date,
            'not_title'=> $request->not_title,
            'not_des'=> $request->not_des,
            'not_file'=> $filename,
        ]);

        return redirect('updatenotice')->with('success', 'Notice Edited');

    }//end method


    public function AddEvent(){
        $profileData = User::find(Auth::user()->user_id);
        return view('admin.addEvents', compact('profileData'));
    } // end method

    // public function AdminEventStore(Request $request){
    //     $events = new Events();
    //     $events->date = $request->date;
    //     $events->title = $request->title;
    //     $events->description = $request->description;

    //     if($request->file('file')){
    //         $file = $request->file('file');
    //         $filename = date('YmdHi').$file->getClientOriginalName();
    //         $file -> move(public_path('upload/events'), $filename);
    //     }
    //     $events->save();
    //     return back()->with('success', 'Event Added');
    // }//end method



    public function AdminEventStore(Request $request){

        if($request->file('file')){
            $file = $request->file('file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/notices', $filename));
            $events['file'] = $filename;
        }

        DB::table('events')->insert([
            'date' => $request->date,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $filename
        ]);

        return redirect('events')->with('success', 'Event Added');


    }//end

    Public function accountant(){
        $profileid = Auth::user()->user_id;
        $profileData = User::find($profileid);

        // return view('accountant.form', compact('profileData'));
    }
    //end

    public function NoticeDelete($id)
    {
        // Find the notice and delete it
        $notice = Notices::find($id);
        if (!$notice) {
            return redirect()->back()->with('error', 'Notice not found.');
        }

        $notice->delete();

        // Fetch all remaining notices ordered by rank
        $remainingNotices = Notices::orderBy('rank', 'asc')->get();

        // Update ranks to be sequential starting from 1
        foreach ($remainingNotices as $index => $remainingNotice) {
            $remainingNotice->rank = $index + 1;
            $remainingNotice->save();
        }

        return redirect()->back()->with('success', 'Notice successfully deleted and ranks updated.');
    }

    //end


    // Events
    public function allEvents(){
        $profileData = User::find(Auth::user()->user_id);

        // $events = DB::table('events')->get();
        $events = DB::Table('events')->orderByDesc('date')->paginate(10);

        return view('admin.allEvent', compact('profileData', 'events'));
    }//end

    //even edit

    public function editEvents( $id){
        $profileData = User::find(Auth::user()->user_id);

        $event = Events::find($id);

        if (!$event) {
            return redirect()->back()->with('error', 'event not found.');
        }
        return view('admin.editEvent', compact('profileData', 'event'));

    }

    //edited Event
    public function editedEvent(Request $request, $id){
        $event = Events::find($id);

        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->des;

        $filename = $event->file;

        if($request->file('file')){
            $file = $request->file('file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/events/'), $filename);
        }

        $event->file = $filename;

        $event->save();
        return redirect('events');
    }


    //event deleted

    public function deleteEvent($id){
        $event = Events::find($id);
        $event->delete();

        return redirect('events');
    }


    //Add publication page ----> Journal Article

    public function NewPublication(){
        $profileData = User::find(Auth::user()->user_id);

        return view('admin.addPublication', compact('profileData'));
    }

    // Add Conference Paper page

    // public function AddConferencePaper(){
    //     $profileData = User::find(Auth::user()->user_id);

    //     return view('admin.ConferencePaperAdd', compact('profileData'));
    // }



    //publication store ----> Journal Article
    public function publicationStore(Request $request){
        $publication = new Publications();
        $P_id = User::find(Auth::user()->user_id); //profile id

        $publication->user = $P_id -> id;
        $publication -> description = $request -> message;
        $publication->type = $request->gridRadios;
        $publication->save();

        return redirect('admin/publication/all');
    }

    // Conference Paper store
    // public function ConferencePaperStore(Request $request){
    //     $publication = new Publications();
    //     $P_id = User::find(Auth::user()->user_id); //profile id

    //     $publication->user = $P_id -> id;
    //     $publication -> description = $request -> message;
    //     $ty = 'conference';
    //     $publication->type = $ty;
    //     $publication->save();
    //     return redirect('admin/publication/all');
    // }


    //publication edit----> Journal Article

    public function AdminPublicationEdit($id){
        // if($id != )

        $profileData = User::find(Auth::user()->user_id);

        $publication  = Publications::find($id);
        if (!$publication) {
            return redirect()->back()->with('error', 'publication not found.');
        }
        if($publication->user != Auth::user()->user_id){
            return redirect()->back();
        }

        return view('admin.updatePublication', compact('profileData', 'publication'));

    }
    // conference paper edit

    //----> Journal Article
    Public function PublicationEidited(Request $request, $id){
        $publication  = Publications::find($id);
        $profileData = User::find(Auth::user()->user_id);
        $publication->description = $request->message;
        $publication->user = $profileData->id;

        $publication->save();

        return redirect()->back();

    }

    //publication delete ----> Journal Article

    public function PublicationDelete($id){
        $publication = Publications::find($id);

        $publication->delete();
        return redirect()->back();
    }


    //publication show through sidebar ----> Journal Article
    public function AllPublication(){
        $profileData = User::find(Auth::user()->user_id);
        $publications = DB::table('publications')->where('user', "=", Auth::user()->user_id)->where('type', "=",'journal')->orderByDesc('created_at')->paginate(10);
        $conferences = DB::table('publications')->where('user', "=", Auth::user()->user_id)->where('type', "=",'conference')->orderByDesc('created_at')->paginate(10);
        return view('admin.allPublication', compact('profileData', 'publications', 'conferences'));

    }



    //Carousel

    public function CarouselShow()
    {   $profileData = User::find(Auth::user()->user_id);
        $images = Carousel::all();  // Ensure this fetches the needed data
        return view('admin.carousel', compact('images','profileData'));  // Profile data removed for simplicity
    }



//     public function updateImages(Request $request){
//     $images = $request->file('images');
//     $ranks = $request->input('ranks');
//     $ids = $request->input('ids');

//     // Loop through the provided IDs since that should drive the updates
//     if ($ids) {
//         foreach ($ids as $index => $id) {
//             $currentImage = $images[$index] ?? null;
//             $currentRank = $ranks[$index] ?? null;

//             if ($currentImage) {
//                 $filename = date('YmdHi') . $currentImage->getClientOriginalName();
//                 $destinationPath = public_path('upload/events/');
//                 $currentImage->move($destinationPath, $filename);

//                 Carousel::where('id', $id)->update([
//                     'image' => $filename,
//                     'rank' => $currentRank // Update rank even if it's not changed, or use old rank
//                 ]);
//             } elseif (isset($currentRank)) {
//                 // No image uploaded but rank might be updated
//                 Carousel::where('id', $id)->update([
//                     'rank' => $currentRank
//                 ]);
//             }
//         }
//     }

//     return back()->with('success', 'Images and ranks updated successfully.');
// }




// public function updateImages(Request $request)
// {
//     $images = $request->file('images', []);
//     $ranks = $request->input('ranks', []);
//     $ids = $request->input('ids', []);
//     $deleteIds = $request->input('delete_ids', []);

//     // Handle new images
//     foreach ($images as $index => $image) {
//         if ($ids[$index] == "new" && $image) {
//             $filename = date('YmdHi') . $image->getClientOriginalName();
//             $destinationPath = public_path('upload/events/');
//             $image->move($destinationPath, $filename);

//             Carousel::create([
//                 'image' => $filename,
//                 'rank' => $ranks[$index]
//             ]);
//         }
//     }
//     // Process deletions
//     if (!empty($deleteIds)) {
//         foreach ($deleteIds as $deleteId) {
//             try {
//                 $carouselImage = Carousel::findOrFail($deleteId);
//                 $filePath = public_path('upload/events/' . $carouselImage->image);
//                 if (file_exists($filePath)) {
//                     unlink($filePath);  // Delete the file
//                 }
//                 $carouselImage->delete();  // Delete the database record
//             } catch (\Exception $e) {
//                 // \Log::error('Error deleting image: ' . $e->getMessage());
//                 return back()->withErrors('Failed to delete image with ID ' . $deleteId);
//             }
//         }
//     }




    // Process updates and new additions
    // foreach ($ids as $index => $id) {
    //     if (in_array($id, $deleteIds)) {
    //         continue;  // Skip processing since it's marked for deletion
    //     }

    //     $currentImage = $images[$index] ?? null;
    //     $currentRank = $ranks[$index] ?? null;
    //     $carousel = Carousel::findOrFail($id);

    //     // Update image if provided
    //     if ($currentImage) {
    //         $filename = date('YmdHi') . $currentImage->getClientOriginalName();
    //         $destinationPath = public_path('upload/events/');
    //         $currentImage->move($destinationPath, $filename);
    //         $carousel->image = $filename;  // Update the image file path
    //     }

    //     // Update rank if provided
    //     if ($currentRank !== null) {
    //         $carousel->rank = $currentRank;
    //     }

    //     $carousel->save();
    // }





    //     return back()->with('success', 'Images and ranks updated successfully.');
// }


public function updateImages(Request $request)
{
    // Retrieve data from the request
    $images = $request->file('images');
    $ranks = $request->input('ranks');
    $ids = $request->input('ids');
    $deleteIds = $request->input('delete_ids', []);

    $newImages = $request->file('new_images', []);
    $newRanks = $request->input('new_ranks', []);

    // Handle deletions first
    if (!empty($deleteIds)) {
        foreach ($deleteIds as $deleteId) {
            $carouselImage = Carousel::findOrFail($deleteId);
            if (file_exists(public_path('upload/events/' . $carouselImage->image))) {
                unlink(public_path('upload/events/' . $carouselImage->image)); // Delete the file
            }
            $carouselImage->delete(); // Delete the database record
        }
    }

   // Update existing images
foreach ($ids as $index => $id) {
    if (in_array($id, $deleteIds)) {
        continue; // Skip updating if the image is marked for deletion
    }

    $currentImage = $images[$index] ?? null;
    $currentRank = $ranks[$index] ?? 1;  // Set default rank if not provided
    $carousel = Carousel::findOrFail($id);

    if ($currentImage) {
        $filename = date('YmdHi') . $currentImage->getClientOriginalName();
        $destinationPath = public_path('upload/events/');
        $currentImage->move($destinationPath, $filename);
        $carousel->image = $filename;
    }

    $carousel->rank = $currentRank;
    $carousel->save();
}

// Handle new images
foreach ($newImages as $index => $newImage) {
    if ($newImage) {
        $filename = date('YmdHi') . $newImage->getClientOriginalName();
        $destinationPath = public_path('upload/events/');
        $newImage->move($destinationPath, $filename);

        Carousel::create([
            'image' => $filename,
            'rank' => $newRanks[$index] ?? 1  // Set default rank if not provided
        ]);
    }
}


    return back()->with('success', 'Images and ranks updated successfully.');
}






//Notice Rank up

public function noticeRankUp($id)
{
    $currentNotice = Notices::find($id);
    if (!$currentNotice) {
        return back()->with('error', 'Notice not found.');
    }

    $previousNotice = Notices::where('rank', '<', $currentNotice->rank)->orderBy('rank', 'desc')->first();
    if (!$previousNotice) {
        return back()->with('info', 'This notice is already at the top.');
    }

    // Swap ranks
    $currentRank = $currentNotice->rank;
    $currentNotice->rank = $previousNotice->rank;
    $previousNotice->rank = $currentRank;

    $currentNotice->save();
    $previousNotice->save();

    return back()->with('success', 'Notice moved up successfully.');
}

public function noticeRankDown($id)
{
    $count = Notices::count();
    $currentNotice = Notices::find($id);
    if (!$currentNotice) {
        return back()->with('error', 'Notice not found.');
    }

    $nextNotice = Notices::where('rank', '>', $currentNotice->rank)->orderBy('rank', 'asc')->first();
    if (!$nextNotice) {
        return back()->with('info', 'This notice is already at the bottom.');
    }

    // Swap ranks
    $currentRank = $currentNotice->rank;
    $currentNotice->rank = $nextNotice->rank;
    $nextNotice->rank = $currentRank;

    $currentNotice->save();
    $nextNotice->save();

    return back()->with('success', 'Notice moved down successfully.');
}

//Add Education page
public function AddEducation(){
    $profileData = User::find(Auth::user()->user_id);
    return view('admin.EducationAdd', compact('profileData'));

}//end
public function ShowAllEducation(){
    $profileData = User::find(Auth::user()->user_id);
    $educations = Educations::get()->where('users',"=",Auth::user()->user_id);

    return view('admin.educationAll', compact('profileData','educations'));
}

publiC function StoreEducation(Request $request){
    $profileData = User::find(Auth::user()->user_id);

    $education = new Educations;
    $education -> degree = $request -> degree;
    $education-> institution = $request-> university;
    $education->passYear = $request->passYear;
    $education->users = Auth::user()->user_id;
    $education->save();

    return redirect()->back();
}

public function EditEducation($id){
    $profileData = User::find(Auth::user()->user_id);
    $education = Educations::find($id);
    if($education->users != Auth::user()->user_id){
        return redirect()->back();
    }
    if(!$education){
        return redirect()->back();
    }

    return view('admin.educationEdit', compact('profileData','education'));
}
public function EditedEducation(Request $request, $id){
    $profileData = User::find(Auth::user()->user_id);
    $education = Educations::find($id);
    $education->degree = $request->degree;
    $education->institution = $request->institution;
    $education->passYear = $request->passYear;
    $education->save();
    return redirect()->back();

}
public function DeleteEducation($id){
    // $profileData = User::find(Auth::user()->user_id);
    $education = Educations::find($id);
        if (!$education) {
            return redirect()->back()->with('error', 'education not found.');
        }
        if($education->user != Auth::user()->user_id){
            return redirect()->back();
        }


        $education->delete();

        return redirect()->back();
}


//Add Experience page
public function AddExperience(){
    $profileData = User::find(Auth::user()->user_id);
    return view('admin.ExperienceAdd', compact('profileData'));
}
public function ShowAllExperience(){
    $profileData = User::find(Auth::user()->user_id);

    $experiencess = DB::table('experiences')->where('user',"=",Auth::user()->user_id)->get();
    return view('admin.experienceAll', compact('profileData','experiencess'));
}

publiC function StoreExperience(Request $req){
    $profileData = User::find(Auth::user()->user_id);

    $experience = new Experience;
    $experience->title = $req->title;
    $experience->organization = $req->organization;
    $experience->from_date = $req->fromDate;
    $experience->to_date = $req->toDate;
    $experience->user = $profileData->id;
    $experience->save();
    return redirect()->back();
}

public function EditExperience($id){
    $profileData = User::find(Auth::user()->user_id);

    $experience = Experience::find($id);
    if($experience->user != Auth::user()->user_id){
        return redirect()->back();
    }
    if(!$experience){
        return redirect()->back();
    }
    return view('admin.experienceSingle', compact('experience','profileData'));
}
public function EditedExperience(Request $request, $id){
    $experience = Experience::find($id);
    $experience->title = $request->title;
    $experience->organization = $request->org;
    $experience->from_date = $request->from;
    $experience->to_date = $request->to;

    $experience->save();
    return redirect()->back();
}
public function Deleteexperience($id){
    $experience = Experience::find($id);
        if (!$experience) {
            return redirect()->back()->with('error', 'experience not found.');
        }
        if($experience->user != Auth::user()->user_id){
            return redirect()->back();
        }

        $experience->delete();

        return redirect()->back();

}


// add award page
public function AddAward(){
    $profileData = User::find(Auth::user()->user_id);
    return view('admin.awardAdd', compact('profileData'));
}
public function ShowAllAward(){
    $profileData = User::find(Auth::user()->user_id);

    $awards = DB::table('awards')->where('user',"=",Auth::user()->user_id)->get();
    return view('admin.awardAll', compact('profileData','awards'));
}

publiC function StoreAward(Request $req){
    $profileData = User::find(Auth::user()->user_id);

    $award = new Award;
    $award->type = $req->type;
    $award->title = $req->title;
    $award->year = $req->year;
    $award->country = $req->country;
    $award->user = $profileData->id;
    $award->description = $req->description;
    $award->save();
    return redirect()->back();
}

public function EditAward($id){
    $profileData = User::find(Auth::user()->user_id);
    // return view('adm', compact('profiledata'));
    $award = Award::find($id);
    if (!$award) {
        return redirect()->back()->with('error', 'Award not found.');
    }
    if($award->user != Auth::user()->user_id){
        return redirect()->back();
    }

    return view('admin.awardSingle', compact('award','profileData'));
}
public function EditedAward(Request $request, $id){

    $award = Award::find($id);
    $award->title = $request->title;
    $award->type = $request->type;
    $award->year = $request->year;
    $award->country = $request->country;
    $award->description = $request->description;

    $award->save();
    return redirect()->back();
}
public function DeleteAward($id){
    $award = Award::find($id);
        if (!$award) {
            return redirect()->back()->with('error', 'award not found.');
        }
        if($award->user != Auth::user()->user_id){
            return redirect()->back();
        }


        $award->delete();

        return redirect()->back();
}

}
