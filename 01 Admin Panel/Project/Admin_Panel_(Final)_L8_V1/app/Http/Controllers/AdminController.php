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
use App\Models\OtherExperience;
use App\Models\ResearchProfile;
use App\Models\Publications;
use App\Models\QuestionBank;
use App\Models\DeptAttributes;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
// use app\Models\Notces;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;



class AdminController extends Controller
{

    // Admin Dashboard
    public function AdminDashboard()
    {
        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.index', compact('profileData', 'dept'));
    }

    // Logout
    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Admin Profile
    public function AdminProfile()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $id = Auth::user()->id;
        $profileData = User::find($id);

        $dept = DB::table('dept_attributes')->first();

        // $researchProfile = DB::table('research_profiles')->where('user', "=", $id)->get();
        return view('admin.profile', compact('profileData', 'dept'));
    }

    // Store Profile Data
    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->fullName;
        // $data->researchInt = $request->message;
        $data->designation = $request->designation;
        $data->special_desig = $request->special_desig;
        $data->dept = $request->dept;
        // $data->institute = $request->institute;
        // $data->country = $request->country;
        $data->phone = $request->phone;
        $data->display_email = $request->email;

        $folder = DB::table('dept_attributes')->first()->folder_name;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = 'people_' . date('YmdHis') . $file->getClientOriginalName();
            $file->move(public_path('../../' . $folder . '/assets/img/peoples'), $filename);
            $data->photo = $filename;
        }
        $data->save();

        // Log user action
        Log::channel('custom_log')->info('AdminProfileStore: User ID ' . Auth::user()->user_id . ' updated their profile.');

        return redirect()->back()->with('session', 'Profile Updateed Successfully');
    }

    // Update Academic Information
    // public function Academic(Request $request)
    // {
    //     $id = Auth::user()->user_id;
    //     $data = User::find($id);

    //     $data->researchInt = $request->message;
    //     $data->save();

    //     // Log user action
    //     Log::channel('custom_log')->info('Academic: User ID ' . $id . ' updated their academic information.');

    //     return redirect()->back();
    // }

    // Update Password
    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newpassword' => 'required|confirmed|' . Rules\Password::defaults(
                Rules\Password::min(4)->uncompromised()->mixedCase()->numbers()->symbols()
            ),
        ]);

        if (!Hash::check($request->currentPassword, Auth::user()->password)) {
            // $notification = array(
            //     'message' => 'Old password does not match!',
            //     'alert-type' => 'error'
            // );
            return back()->with('error', 'Old password does not match!');
        }

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        // Log user action
        Log::channel('custom_log')->info('AdminUpdatePassword: User ID ' . Auth::user()->user_id . ' updated their password.');

        // $notification = array(
        //     'message' => 'Password changed successfully',
        //     'alert-type' => 'session'
        // );
        return back()->with('session', 'Password changed successfully');
    }

    /*=================================================
----------          Notices          -----------
===================================================*/

    // Add Notice
    public function AdminAddNotice(Request $request)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');


        $types = DB::table('types')->where('category', "=", 'notice')->orderBy('rank')->get();
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $dept = DeptAttributes::first();
        return view('admin.addnotice', compact('profileData', 'types','dept'));
    }

    // Store Notice
    public function AdminNoticeStore(Request $request)
    {
        $id = Auth::user()->user_id;

        $request->validate([
            'not_date' => 'required',
            'not_title' => 'required|max:150',
            'not_type' => 'required',
            'not_file' => 'required|file',
            'message' => 'nullable|string'
        ]);

        Notices::query()->increment('rank');

        $notices = new Notices();
        $notices->not_date = $request->not_date;
        $notices->not_title = $request->not_title;
        $notices->not_type = $request->not_type;
        $notices->not_des = $request->message;  // Ensure the notice description is saved
        $notices->rank = 1;

        $folder = DB::table('dept_attributes')->first()->folder_name;

        if ($request->file('not_file')) {
            $file = $request->file('not_file');
            $filename = "notice_" . date('YmdHis') . "_" . (Notices::max('id') + 100001) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('../../' . $folder . '/assets/Files'), $filename);
            $notices->not_file = $filename;
        }

        $notices->save();

        // Log user action
        Log::channel('custom_log')->info('AdminNoticeStore: User ID ' . $id . ' added a new notice.');

        return redirect()->route('admin.updatenotice')->with('success', 'Notice Added');
    }



    // Update Notice
    public function AdminNoticeUpdate(Request $request)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $id = Auth::user()->id;
        $profileData = User::find($id);
        $dept = DB::table('dept_attributes')->first();

        $notices = DB::table('notices')->orderBy('rank')->paginate(15);
        return view('admin.updatenotice', compact('profileData', 'notices', 'dept'));
    }

    // Edit Notice
    public function AdminEditNotice($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $types = DB::table('types')->where('category', "=", 'notice')->orderBy('rank')->get();
        // $profileid = ;
        $profileData = User::find(Auth::user()->id);

        $notice = DB::table('notices')->find($id);
        $dept = DeptAttributes::first();
        if (!$notice) {
            return redirect()->back()->with('error', 'Notice not found.');
        }

        return view('admin.editNotice', compact('profileData', 'notice', 'types','dept'));
    }

    // Store Edited Notice
    public function AdminNoticeEdited(Request $request, $id)
    {
        $notice = DB::table('notices')->find($id);
        $filename = $notice->not_file;
        $folder = DB::table('dept_attributes')->first()->folder_name;

        if ($request->file('not_file')) {
            $file = $request->file('not_file');
            $filename = "notice_" . date('YmdHis') . "_" . (100000 + $notice->id) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('../../' . $folder . '/assets/Files'), $filename);
        }

        DB::table('notices')->where('id', $id)->update([
            'not_date' => $request->not_date,
            'not_title' => $request->not_title,
            'not_type' => $request->not_type,
            'not_file' => $filename,
            'not_des' => $request->message,  // Make sure to update the notice description
        ]);

        // Log user action
        Log::channel('custom_log')->info('AdminNoticeEdited: User ID ' . Auth::user()->user_id . ' edited notice ID ' . $id);

        return redirect()->route('admin.updatenotice')->with('success', 'Notice Edited');
    }


    // Delete Notice
    public function NoticeDelete($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $notice = Notices::find($id);
        if (!$notice) {
            return redirect()->back()->with('error', 'Notice not found.');
        }

        $notice->delete();
        $remainingNotices = Notices::orderBy('rank', 'asc')->get();

        foreach ($remainingNotices as $index => $remainingNotice) {
            $remainingNotice->rank = $index + 1;
            $remainingNotice->save();
        }

        // Log user action
        Log::channel('custom_log')->info('NoticeDelete: User ID ' . Auth::user()->user_id . ' deleted notice ID ' . $id);

        return redirect()->back()->with('success', 'Notice successfully deleted and ranks updated.');
    }

    // Move Notice Rank Up
    public function noticeRankUp($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $currentNotice = Notices::find($id);
        if (!$currentNotice) {
            return back()->with('error', 'Notice not found.');
        }

        $previousNotice = Notices::where('rank', '<', $currentNotice->rank)->orderBy('rank', 'desc')->first();
        if (!$previousNotice) {
            return back()->with('info', 'This notice is already at the top.');
        }

        $currentRank = $currentNotice->rank;
        $currentNotice->rank = $previousNotice->rank;
        $previousNotice->rank = $currentRank;

        $currentNotice->save();
        $previousNotice->save();

        // Log user action
        Log::channel('custom_log')->info('noticeRankUp: User ID ' . Auth::user()->user_id . ' moved up notice ID ' . $id);

        return back()->with('success', 'Notice moved up successfully.');
    }

    // Move Notice Rank Down
    public function noticeRankDown($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $currentNotice = Notices::find($id);
        if (!$currentNotice) {
            return back()->with('error', 'Notice not found.');
        }

        $nextNotice = Notices::where('rank', '>', $currentNotice->rank)->orderBy('rank', 'asc')->first();
        if (!$nextNotice) {
            return back()->with('info', 'This notice is already at the bottom.');
        }

        $currentRank = $currentNotice->rank;
        $currentNotice->rank = $nextNotice->rank;
        $nextNotice->rank = $currentRank;

        $currentNotice->save();
        $nextNotice->save();

        // Log user action
        Log::channel('custom_log')->info('noticeRankDown: User ID ' . Auth::user()->user_id . ' moved down notice ID ' . $id);

        return back()->with('success', 'Notice moved down successfully.');
    }




    /*====================================================
            ------ -Events-----
====================================================*/


    public function allEvents()
    { // show all events
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $events = DB::Table('events')->orderBy('rank')->paginate(15);
        $dept = DB::table('dept_attributes')->first();
        return view('admin.allEvent', compact('profileData', 'events', 'dept'));
    } //end


    // Add a new event
    public function AddEvent()
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.addEvents', compact('profileData','dept'));
    }

    // Store a new event
    public function AdminEventStore(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg,gif,pdf'
        ]);

        if ($request->file('file')) {
            $id_not = 100000;
            if (!Events::query()) {
                $id_not = Events::find(DB::table('events')->max('id'))->id + 1 + 100000;
            }
            $file = $request->file('file');
            $folder = DB::table('dept_attributes')->first()->folder_name;

            $filename = "events_" . date('YmdHis') . "_" . $id_not . "." . $file->getClientOriginalExtension();
            if (!$file->move(public_path('../../' . $folder . '/assets/img/Events'), $filename)) {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
            $events['file'] = $filename;
        }

        try {
            Events::query()->increment('rank');
            DB::table('events')->insert([
                'date' => $request->date,
                'title' => $request->title,
                'description' => $request->description,
                'file' => $filename,
                'rank' => 1
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store event.');
        }

        return redirect()->route('admin.allEvents')->with('success', 'Event Added');
    }

    // Edit a single event
    public function editEvents($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $event = Events::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $dept = DeptAttributes::first();
        return view('admin.editEvent', compact('profileData', 'event','dept'));
    }

    // Store edited event
    public function editedEvent(Request $request, $id)
    {
        $event = Events::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $event->title = $request->title;
        $event->date = $request->date;
        $event->description = $request->des;

        $filename = $event->file;
        $request->validate([
            'file' => 'mimes:png,jpg'
        ]);

        $folder = DB::table('dept_attributes')->first();

        if ($request->file('file')) {
            $id_event = $event->id + 100000;
            $file = $request->file('file');
            $filename = "events_" . date('YmdHis') . "_" . $id_event . "." . $file->getClientOriginalExtension();
            if (!$file->move(public_path('../../' . $folder->folder_name . '/assets/img/Events'), $filename)) {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
        }

        $event->file = $filename;

        try {
            $event->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update event.');
        }

        return redirect()->route('admin.allEvents')->with('success', 'Event updated successfully.');
    }

    // Delete an event
    public function deleteEvent($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $event = Events::find($id);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        try {
            Events::where('rank', ">", $event->rank)->decrement('rank', 1);
            $event->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete event.');
        }

        return redirect()->route('admin.allEvents')->with('success', 'Event deleted successfully.');
    }


    public function EventsRankUp($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $currentEvent = Events::find($id);
        if (!$currentEvent) {
            return back()->with('error', 'Event not found.');
        }

        $previousEvent = Events::where('rank', '<', $currentEvent->rank)->orderBy('rank', 'desc')->first();
        if (!$previousEvent) {
            return back()->with('info', 'This Event is already at the top.');
        }

        $currentRank = $currentEvent->rank;
        $currentEvent->rank = $previousEvent->rank;
        $previousEvent->rank = $currentRank;

        $currentEvent->save();
        $previousEvent->save();

        // Log user action
        Log::channel('custom_log')->info('EventRankUp: User ID ' . Auth::user()->user_id . ' moved up Event ID ' . $id);

        return back()->with('success', 'Event moved up successfully.');
    }



    public function EventsRankDown($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $currentEvent = Events::find($id);
        if (!$currentEvent) {
            return back()->with('error', 'Event not found.');
        }

        $nextEvent = Events::where('rank', '>', $currentEvent->rank)->orderBy('rank', 'asc')->first();
        if (!$nextEvent) {
            return back()->with('info', 'This Event is already at the bottom.');
        }

        $currentRank = $currentEvent->rank;
        $currentEvent->rank = $nextEvent->rank;
        $nextEvent->rank = $currentRank;

        $currentEvent->save();
        $nextEvent->save();

        // Log user action
        Log::channel('custom_log')->info('EventRankDown: User ID ' . Auth::user()->user_id . ' moved down Event ID ' . $id);

        return back()->with('success', 'Event moved down successfully.');
    }




    /*====================================================
                ------ -publication-----
    ====================================================*/

    //Add publication page ----> Journal Article


    // Add a new publication
    public function NewPublication()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $types = DB::table('types')->where('category', "=", 'publication')->get();
        $dept = DeptAttributes::first();
        return view('admin.addPublication', compact('profileData', 'types','dept'));
    }

    // Store a new publication
    public function publicationStore(Request $request)
    {
        try {
            Publications::where('user', "=", Auth::user()->user_id)->where('type', "=", $request->paperType)->increment('rank');
            $publication = new Publications();
            // $P_id = User::find(Auth::user()->user_id); //profile id
            $publication->user = $request->user;
            $publication->description = $request->message;
            $publication->type = $request->paperType;
            $publication->rank = 1;
            $publication->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store publication.');
        }

        return redirect()->route('side.publication')->with('success', 'Publication added successfully.');
    }

    // Edit a publication
    public function AdminPublicationEdit($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $publication = Publications::find($id);
        if (!$publication) {
            return redirect()->back()->with('error', 'Publication not found.');
        }
        if ($publication->user != Auth::user()->user_id) {
            return redirect()->back();
        }
        $dept = DeptAttributes::first();

        return view('admin.updatePublication', compact('profileData', 'publication','dept'));
    }

    // Edit a publication
    public function PublicationEidited(Request $request, $id)
    {
        $publication = Publications::find($id);
        if (!$publication) {
            return redirect()->back()->with('error', 'Publication not found.');
        }
        $profileData = User::find(Auth::user()->id);
        $publication->description = $request->message;
        $publication->user = Auth::user()->user_id;

        try {
            $publication->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update publication.');
        }

        return redirect()->route('side.publication')->with('success', 'Publication updated successfully.');
    }

    // Delete a publication
    public function PublicationDelete($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $publication = Publications::find($id);
        if (!$publication) {
            return redirect()->back()->with('error', 'Publication not found.');
        }

        try {

            Publications::where('user', "=", Auth::user()->user_id)->where('type', "=", $publication->type)
                ->where('rank', ">", $publication->rank)->decrement('rank');
            $publication->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e);
        }

        return redirect()->back()->with('success', 'Publication deleted successfully.');
    }

    // Show all publications
    public function AllPublication()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $types = DB::table('types')->where('category', "=", 'publication')->get();
        $publications = DB::table('publications')->where('user', "=", Auth::user()->user_id)->orderBy('rank')->paginate(20);
        $type_available = array('');
        $dept = DeptAttributes::first();
        // $conferences = DB::table('publications')->where('user', "=", Auth::user()->user_id)->where('type', "=",'conference')->orderByDesc('created_at')->paginate(10);
        return view('admin.allPublication', compact('profileData', 'publications', 'types','dept'));
    }

    public function PublicationRankUp($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Publications::find($id);;
        if (!$current) {
            return back()->with('error', 'Publication not found.');
        }

        $previous = Publications::orderBy('rank', 'desc')->where('type', "=", $current->type)
            ->where('user', "=", Auth::user()->user_id)->where('rank', "<", $current->rank)->first();
        if (!$previous) {
            return back()->with('info', 'This Publication is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('PublicationRankUp: User ID ' . Auth::user()->user_id . ' moved up Publication ID ' . $id);

        return back()->with('success', 'Publication moved up successfully.');
    }


    public function PublicationRankDown($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Publications::find($id);
        if (!$current) {
            return back()->with('error', 'Publication not found.');
        }

        $next = Publications::where('rank', ">", $current->rank)->where('type', "=", $current->type)
            ->where('user', "=", Auth::user()->user_id)->orderBy('rank', 'asc')->first();
        if (!$next) {
            return back()->with('info', 'This Publication is already at the bottom.');
        }

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();

        // Log user action
        Log::channel('custom_log')->info('PublicationRankDown: User ID ' . Auth::user()->user_id . ' moved down Publication ID ' . $id);

        return back()->with('success', 'Publication moved down successfully.');
    }




    /*====================================================
                ------Education-----
    ====================================================*/


    // Add Education page
    public function AddEducation()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.EducationAdd', compact('profileData','dept'));
    }

    // Show all education
    public function ShowAllEducation()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $educations = Educations::where('user', Auth::user()->user_id)->orderBy('rank')->paginate(10);
        $dept = DeptAttributes::first();
        return view('admin.educationAll', compact('profileData', 'educations','dept'));
    }

    // Store education
    public function StoreEducation(Request $request)
    {
        try {
            $profileData = User::find(Auth::user()->id);
            Educations::where('user', "=", Auth::user()->user_id)->increment('rank');
            $education = new Educations;
            $education->degree = $request->degree;
            $education->institution = $request->university;
            $education->passYear = $request->passYear;
            $education->user = Auth::user()->user_id;
            $education->rank = 1;
            $education->save();

            return redirect()->route('ShowAllEducation')->with('success', 'Education added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add education: ' . $e->getMessage());
        }
    }

    // Edit education
    public function EditEducation($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $education = Educations::find($id);

        if (!$education || $education->user != Auth::user()->user_id) {
            return redirect()->back()->with('error', 'Education not found.');
        }

        $dept = DeptAttributes::first();
        return view('admin.educationEdit', compact('profileData', 'education','dept'));
    }

    // Update edited education
    public function EditedEducation(Request $request, $id)
    {
        try {
            $profileData = User::find(Auth::user()->id);
            $education = Educations::find($id);

            if (!$education || $education->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Education not found.');
            }

            $education->degree = $request->degree;
            $education->institution = $request->institution;
            $education->passYear = $request->passYear;
            $education->save();

            return redirect()->back()->with('success', 'Education updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update education: ' . $e->getMessage());
        }
    }

    // Delete education
    public function DeleteEducation($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        try {
            $education = Educations::find($id);

            if (!$education || $education->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Education not found.');
            }
            Educations::where('user', "=", Auth::user()->user_id)->where('rank', ">", $education->rank)->decrement('rank', 1);

            $education->delete();

            return redirect()->back()->with('success', 'Education deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete education: ' . $e->getMessage());
        }
    }


    public function EducationRankUp($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Educations::find($id);
        if (!$current) {
            return back()->with('error', 'Education not found.');
        }

        $previous = Educations::orderBy('rank', 'desc')->where('user', "=", Auth::user()->user_id)->where('rank', "<", $current->rank)->first();
        if (!$previous) {
            return back()->with('info', 'This Education is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('EducationRankUp: User ID ' . Auth::user()->user_id . ' moved up Education ID ' . $id);

        return back()->with('success', 'Education moved up successfully.');
    }

    public function EducationRankDown($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Educations::find($id);
        if (!$current) return back()->with('error', 'Education not found.');
        $next = Educations::orderBy('rank', 'asc')->where('user', "=", Auth::user()->user_id)->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'The education is already at the bottom.');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('EducationRankDown: User ID ' . Auth::user()->user_id . ' moved down Education ID ' . $id);

        return back()->with('success', 'Education moved down successfully.');
    }





    /*====================================================
                ------ -Experience-----
    ====================================================*/
    // Add Experience page
    public function AddExperience()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.ExperienceAdd', compact('profileData','dept'));
    }

    // Show all experiences
    public function ShowAllExperience()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $experiences = Experience::orderBy('rank')->where('user', Auth::user()->user_id)->paginate(10);
        $otherExperiences = OtherExperience::orderBy('rank')->where('user', Auth::user()->user_id)->paginate(15);

        $dept = DeptAttributes::first();
        return view('admin.experienceAll', compact('profileData', 'experiences', 'otherExperiences','dept'));
    }

    // Store experience
    public function StoreExperience(Request $req)
    {
        try {
            $profileData = User::find(Auth::user()->id);
            Experience::where('user', "=", Auth::user()->user_id)->increment('rank');
            $experience = new Experience;
            $experience->title = $req->title;
            $experience->organization = $req->organization;
            $experience->from_date = $req->fromDate;
            $experience->to_date = $req->toDate;
            $experience->user = $req->user;
            $experience->rank = 1;
            $experience->save();

            return redirect()->route('ShowAllExperience')->with('success', 'Experience added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add experience ');
        }
    }

    // Edit experience
    public function EditExperience($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $experience = Experience::find($id);
        if (!$experience || $experience->user != Auth::user()->user_id) {
            return redirect()->back()->with('error', 'Experience not found.');
        }

        $dept = DeptAttributes::first();

        return view('admin.experienceSingle', compact('experience', 'profileData','dept'));
    }

    // Update edited experience
    public function EditedExperience(Request $request, $id)
    {
        try {
            $experience = Experience::find($id);
            if (!$experience || $experience->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Experience not found.');
            }


            $experience->title = $request->title;
            $experience->organization = $request->org;
            $experience->from_date = $request->from;
            $experience->to_date = $request->to;
            $experience->save();

            return redirect()->back()->with('success', 'Experience updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update experience: ' . $e->getMessage());
        }
    }

    // Delete experience
    public function Deleteexperience($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        try {
            $experience = Experience::find($id);
            if (!$experience || $experience->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Experience not found.');
            }
            Experience::where('user', "=", Auth::user()->user_id)->where('rank', ">", $experience->rank)->decrement('rank', 1);
            $experience->delete();

            return redirect()->back()->with('success', 'Experience deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete experience: ' . $e->getMessage());
        }
    }

    public function ExperienceRankUp($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Experience::find($id);
        if (!$current) {
            return back()->with('error', 'Experience not found.');
        }

        $previous = Experience::orderBy('rank', 'desc')->where('user', "=", Auth::user()->user_id)->where('rank', "<", $current->rank)->first();
        if (!$previous) {
            return back()->with('info', 'This Experience is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('ExperienceRankUp: User ID ' . Auth::user()->user_id . ' moved up Experience ID ' . $id);

        return back()->with('success', 'Experience moved up successfully.');
    }
    public function ExperienceRankDown($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Experience::find($id);
        if (!$current) return back()->with('error', 'Experience not found.');
        $next = Experience::orderBy('rank', 'asc')->where('user', "=", Auth::user()->user_id)->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'This Experience is already at the bottom.');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('ExperienceRankDown: User ID ' . Auth::user()->user_id . ' moved down Experience ID ' . $id);

        return back()->with('success', 'Experience moved down successfully.');
    }



    /*====================================================
                ------ -Other Experience-----
    ====================================================*/

    // Add other experience
    public function OtherExperience()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.otherExperienceAdd', compact('profileData','dept'));
    }

    // Store other experience
    public function StoreOtherExperience(Request $req)
    {
        try {
            OtherExperience::where('user', "=", Auth::user()->user_id)->increment('rank');
            $experience = new OtherExperience;
            $experience->experience = $req->message;
            $experience->user = $req->user;
            $experience->rank = 1;
            $experience->save();

            return redirect()->route('ShowAllExperience')->with('success', 'Other experience added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add other experience ');
        }
    }

    // Show single other experience
    public function SingleOtherExperience($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $experience = OtherExperience::find($id);
        if (!$experience) {
            return redirect()->back()->with('error', 'Other experience not found.');
        }
        if ($experience->user != Auth::user()->user_id) {
            return redirect()->back();
        }

        $dept = DeptAttributes::first();
        return view('admin.otherExperienceUpdate', compact('profileData', 'experience','dept'));
    }

    // Update edited other experience
    public function OtherExperienceEdited(Request $req, $id)
    {
        try {
            $experience = OtherExperience::find($id);
            if (!$experience || $experience->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Other experience not found.');
            }

            $experience->experience = $req->message;
            $experience->save();

            return redirect()->route('ShowAllExperience')->with('success', 'Other experience updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update other experience: ');
        }
    }

    // Delete other experience
    public function OtherExperiencedelete($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        try {
            $experience = OtherExperience::find($id);
            if (!$experience || $experience->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Other experience not found.');
            }
            OtherExperience::where('user', "=", Auth::user()->user_id)->where('rank', ">", $experience->rank)->decrement('rank', 1);
            $experience->delete();

            return redirect()->back()->with('success', 'Other experience deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete other experience: ');
        }
    }



    public function OtherExperienceRankUp($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = OtherExperience::find($id);
        if (!$current) {
            return back()->with('error', 'Experience not found.');
        }

        $previous = OtherExperience::orderBy('rank', 'desc')->where('user', "=", Auth::user()->user_id)->where('rank', "<", $current->rank)->first();
        if (!$previous) {
            return back()->with('info', 'This Experience is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('ExperienceRankUp: User ID ' . Auth::user()->user_id . ' moved up Experience ID ' . $id);

        return back()->with('success', 'Experience moved up successfully.');
    }
    public function OtherExperienceRankDown($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = OtherExperience::find($id);
        if (!$current) return back()->with('error', 'Experience not found.');
        $next = OtherExperience::orderBy('rank', 'asc')->where('user', "=", Auth::user()->user_id)->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'This Experience is already at the bottom.');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('ExperienceRankDown: User ID ' . Auth::user()->user_id . ' moved down Experience ID ' . $id);

        return back()->with('success', 'Experience moved down successfully.');
    }




    /*====================================================
                ------ -Awards-----
    ====================================================*/


    // Add award page
    public function AddAward()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.awardAdd', compact('profileData','dept'));
    }

    // Show all awards
    public function ShowAllAward()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $awards = Award::orderBy('rank')->where('user', Auth::user()->user_id)->paginate(10);
        $dept = DeptAttributes::first();
        return view('admin.awardAll', compact('profileData', 'awards','dept'));
    }

    // Store award
    public function StoreAward(Request $req)
    {

        try {
            $profileData = User::find(Auth::user()->user_id);
            Award::where('user', "=", Auth::user()->user_id)->increment('rank');
            $award = new Award;
            $award->type = $req->type;
            $award->title = $req->title;
            $award->year = $req->year;
            $award->country = $req->country;
            $award->user = $req->user;
            $award->description = $req->description;
            $award->rank = 1;
            $award->save();

            return redirect()->route('ShowAllAward')->with('success', 'Award added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add award: ');
        }
    }

    // Edit award
    public function EditAward($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $award = Award::find($id);
        if (!$award || $award->user != Auth::user()->user_id) {
            return redirect()->back()->with('error', 'Award not found.');
        }

        $dept = DeptAttributes::first();
        return view('admin.awardSingle', compact('award', 'profileData','dept'));
    }

    // Update edited award
    public function EditedAward(Request $request, $id)
    {
        try {
            $award = Award::find($id);
            if (!$award || $award->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Award not found.');
            }

            $award->title = $request->title;
            $award->type = $request->type;
            $award->year = $request->year;
            $award->country = $request->country;
            $award->description = $request->description;
            $award->save();

            return redirect()->route('ShowAllAward')->with('success', 'Award updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update award: ');
        }
    }

    // Delete award
    public function DeleteAward($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        try {
            $award = Award::find($id);
            if (!$award || $award->user != Auth::user()->user_id) {
                return redirect()->back()->with('error', 'Award not found.');
            }
            Award::where('user', "=", Auth::user()->user_id)->where('rank', ">", $award->rank)->decrement('rank', 1);
            $award->delete();

            return redirect()->back()->with('success', 'Award deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete award: ' . $e->getMessage());
        }
    }


    public function AwardRankUp($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Award::find($id);
        if (!$current) {
            return back()->with('error', 'Award not found.');
        }

        $previous = Award::orderBy('rank', 'desc')->where('user', "=", Auth::user()->user_id)->where('rank', "<", $current->rank)->first();
        if (!$previous) {
            return back()->with('info', 'This Award is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('AwardRankUp: User ID ' . Auth::user()->user_id . ' moved up Award ID ' . $id);

        return back()->with('success', 'Award moved up successfully.');
    }
    public function AwardRankDown($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = Award::find($id);
        if (!$current) return back()->with('error', 'Award not found.');
        $next = Award::orderBy('rank', 'asc')->where('user', "=", Auth::user()->user_id)->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'This Award is already at the bottom.');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('AwardRankDown: User ID ' . Auth::user()->user_id . ' moved down Award ID ' . $id);

        return back()->with('success', 'Award moved down successfully.');
    }



    /*====================================================
                ------ Research Profile-----
    ====================================================*/

    public function AllResearchProfile()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $researchProfile = DB::table('research_profiles')->where('user', "=", Auth::user()->user_id)->orderBy('rank')->paginate(15);
        $dept = DeptAttributes::first();
        return view('admin.all_research_profile', compact('profileData', 'researchProfile','dept'));
    }

    public function AddResearchProfile()
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.researchProfileAdd', compact('profileData','dept'));
    }








    public function StoreResearchProfile(Request $request)
    {

        // Validate request data
        try {
            ResearchProfile::where('user', "=", Auth::user()->user_id)->increment('rank');
            $research = new ResearchProfile;
            // $P_id = User::find(Auth::user()->user_id); //profile id
            $research->user = $request->user;
            $research->title = $request->message;
            $research->rank = 1;
            $research->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store Research Profile.');
        }

        return redirect()->route('AllResearchProfile')->with('success', 'Research Profile added successfully.');
    }

    public function EditResearcProfile($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $researchProfile = ResearchProfile::find($id);
        if (!$researchProfile || $researchProfile->user != Auth::user()->user_id) {
            return redirect()->back()->with('error', 'Research Profile does not exist');
        }
        $dept = DeptAttributes::first();
        return view('admin.researchProfileEdit', compact('researchProfile', 'profileData','dept'));
    }

    public function EditedResearcProfile(Request $req, $id)
    {
        $researchProfile = ResearchProfile::find($id);
        if (!$researchProfile) {
            return redirect()->back()->with('error', 'Research Profile does not exist');
        }
        $researchProfile->title = $req->message;
        $researchProfile->save();
        return redirect()->back()->with('success', 'Research profile updated');
    }

    public function DeleteResearchProfile($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $researchProfile = ResearchProfile::find($id);
        if (!$researchProfile || $researchProfile->user != Auth::user()->user_id) {
            return redirect()->back()->with('error', 'Research Profile does not exist');
        }
        ResearchProfile::where('user', "=", Auth::user()->user_id)->where('rank', ">", $researchProfile->rank)->decrement('rank', 1);
        $researchProfile->delete();
        return redirect()->back()->with('success', 'Research profile successfully deleted');
    }



    public function ResearchRankUp($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = ResearchProfile::find($id);
        if (!$current) {
            return back()->with('error', 'Research Profile not found.');
        }

        $previous = ResearchProfile::orderBy('rank', 'desc')->where('user', "=", Auth::user()->user_id)->where('rank', "<", $current->rank)->first();
        if (!$previous) {
            return back()->with('info', 'This Research Profile is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('Research ProfileRankUp: User ID ' . Auth::user()->user_id . ' moved up Research Profile ID ' . $id);

        return back()->with('success', 'Research Profile moved up successfully.');
    }
    public function ResearchRankDown($id)
    {
        if (Auth::user()->controller_role == 'Staff') return back()->with('error', 'Invalid link!');

        $current = ResearchProfile::find($id);
        if (!$current) return back()->with('error', 'Research Profile not found.');
        $next = ResearchProfile::orderBy('rank', 'asc')->where('user', "=", Auth::user()->user_id)->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'This Research Profile is already at the Bottom .');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('ResearchProfileRankDown: User ID ' . Auth::user()->user_id . ' moved down ResearchProfile ID ' . $id);

        return back()->with('success', 'ResearchProfile moved down successfully.');
    }


    /*====================================================
                ------ -Carousel-----
    ====================================================*/

    // //Carousel
    // public function CarouselShow()
    // {
    //     if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

    //     $profileData = User::find(Auth::user()->id);
    //     $images = Carousel::all();  // Ensure this fetches the needed data
    //     return view('admin.carousel', compact('images', 'profileData'));  // Profile data removed for simplicity
    // }

    // // Update the carousel images
    // public function updateImages(Request $request)
    // {
    //     if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

    //     try {
    //         // Retrieve data from the request
    //         $images = $request->file('images');
    //         $ranks = $request->input('ranks');
    //         $ids = $request->input('ids');
    //         $deleteIds = $request->input('delete_ids', []);

    //         $newImages = $request->file('new_images', []);
    //         $newRanks = $request->input('new_ranks', []);

    //         // Handle deletions first
    //         if (!empty($deleteIds)) {
    //             foreach ($deleteIds as $deleteId) {
    //                 $carouselImage = Carousel::findOrFail($deleteId);
    //                 $imagePath = public_path('upload/events/' . $carouselImage->image);
    //                 if (File::exists($imagePath)) {
    //                     File::delete($imagePath); // Delete the file
    //                 }
    //                 $carouselImage->delete(); // Delete the database record
    //             }
    //         }

    //         // Update existing images
    //         foreach ($ids as $index => $id) {
    //             if (in_array($id, $deleteIds)) {
    //                 continue; // Skip updating if the image is marked for deletion
    //             }

    //             $currentImage = $images[$index] ?? null;
    //             $currentRank = $ranks[$index] ?? 1;  // Set default rank if not provided
    //             $carousel = Carousel::findOrFail($id);

    //             if ($currentImage) {
    //                 $filename = date('YmdHis') . $currentImage->getClientOriginalName();
    //                 $destinationPath = public_path('upload/events/');
    //                 $currentImage->move($destinationPath, $filename);
    //                 $carousel->image = $filename;
    //             }

    //             $carousel->rank = $currentRank;
    //             $carousel->save();
    //         }

    //         // Handle new images
    //         foreach ($newImages as $index => $newImage) {
    //             if ($newImage) {
    //                 $filename = date('YmdHis') . $newImage->getClientOriginalName();
    //                 $destinationPath = public_path('upload/events/');
    //                 $newImage->move($destinationPath, $filename);

    //                 Carousel::create([
    //                     'image' => $filename,
    //                     'rank' => $newRanks[$index] ?? 1  // Set default rank if not provided
    //                 ]);
    //             }
    //         }

    //         return back()->with('success', 'Images and ranks updated successfully.');
    //     } catch (\Exception $e) {
    //         return back()->with('error', 'Failed to update images: ' . $e->getMessage());
    //     }
    // }






    /*====================================================
                ------ -Admistration-----
    ====================================================*/




    public function Administration()
    {

        if (Auth::user()->controller_role == 'Admin'){
        $profileData = User::find(Auth::user()->id);
        $users = User::orderBy('rank')->where('rank', ">", 0)->get();
        $dept = DeptAttributes::first();
        return view('admin.userControl', compact('profileData', 'users','dept'));}
    }

    public function AdministratorUserEdit($id)
    {
        if (Auth::user()->controller_role == 'Admin') {
        $profileData = User::find(Auth::user()->id);
        $users = User::find($id);
        if (!$users) return back();
        $roles = DB::table('types')->where('category', "=", 'role')->get();
        $types = DB::table('types')->where('category', "=", 'Visibility')->get();
        return view('admin.userControllerEdit', compact('profileData', 'users', 'roles', 'types'));}
    }


    public function AdministratorUserEdited(Request $req, $id)
    {
        $user = User::find($id);
        if (!$user) return back();

        $user->rank = $req->rank;
        $user->user_id = $req->user_id;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->type = $req->type;
        $user->controller_role = $req->role;
        $user->role = $req->status;
        $user->save();

        return redirect()->back();
    }

    public function AdministratorUserDelete($id)
    {if (Auth::user()->controller_role == 'Admin') {
        try {
            $user = User::find($id);
            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }
            if (!$user->rank) {
                $user->delete();
                return redirect()->back()->with('success', 'user deleted successfully.');
            }
            User::where('rank', ">", $user->rank)->decrement('rank', 1);
            $user->delete();

            return redirect()->back()->with('success', 'user deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete user: ' . $e->getMessage());
        }}
    }

    public function AdministratorUserRankUP($id)
    {
        $current = User::find($id);
        if (!$current)  return back()->with('error', 'User not found.');
        if (!$current->rank) return back()->with('info', 'Invalid User Profile found.');

        $previous = User::orderBy('rank', 'desc')->where('rank', "<", $current->rank)->first();
        if (!$previous || ($previous->rank == NULL)) {
            return back()->with('info', 'This User is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('User ProfileRankUp: User ID ' . Auth::user()->user_id . ' moved up User ID ' . $id);

        return back()->with('success', 'User profile moved up successfully.');
    }


    public function AdministratorUserRankDown($id)
    {
        $current = User::find($id);
        if (!$current) return back()->with('error', 'User Profile not found.');
        if (!$current->rank) return back()->with('info', 'Invalid User Profile found.');

        $next = User::orderBy('rank', 'asc')->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'This User Profile is already at the Bottom.');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('UserProfileRankDown: User ID ' . Auth::user()->user_id . ' moved down User ID ' . $id);

        return back()->with('success', 'User profile moved down successfully.');
    }




    //==============================================================================



    public function StuffPasswordUpdate()
    {
        // if(Auth::user()->controller_role == 'Staff'){
        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.StaffPasswordUpdate', compact('profileData','dept'));
        // }
    }


    public function DeptInfo()
    {
        if (Auth::user()->controller_role == 'Admin') {

            // $dept = DeptAttributes::all()->first();
            $profileData = User::find(Auth::user()->id);
            $dept = DeptAttributes::first();
            return view('admin.dept_attribute', compact('profileData', 'dept'));
        }
        // $dept = DB::table('dept_attributes')->where('dept_code',"=", 1)->get();

    }

    public function DeptInfoStore(Request $req, $id)
    {
        $dept = DeptAttributes::find($id);
        $dept->dept_code = $req->dept_code;
        $dept->dept_short_name = $req->dept_short_name;
        $dept->dept_name = $req->dept_name;
        $dept->about = $req->about;
        $dept->phone = $req->phone;
        $dept->email = $req->email;
        $dept->address = $req->address;

        $dept->save();
        return back()->with('success', 'Dept info Successfully Updated!');
    }




    public function AddQuestionBank()
    {

        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');
        $profileData = User::find(Auth::user()->id);
        $types = DB::table('types')->where('category', "=", 'Question Bank')->get();
        $dept = DeptAttributes::first();
        return view('admin.addQuestion', compact('profileData', 'types','dept'));
    }


    public function StoreQuestionBank(Request $req)
    {
        QuestionBank::query()->increment('rank');
        $question = new QuestionBank;
        $question->year = $req->year;
        $question->semester = $req->semester;
        $question->title = $req->title;
        $question->type = $req->type;
        $question->session = $req->session;
        $question->exam_year = $req->exam_year;
        $question->rank = 1;
        $question->degree_id = $req->degree;

        $dept = DB::table('dept_attributes')->first()->folder_name;

        if ($req->file('file')) {
            $file = $req->file('file');
            $filename = "Question_" . date('YmdHis') . "_" . (QuestionBank::max('id') + 100001) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('../../' . $dept . '/assets/Files/questions/'), $filename);
            $question->file = $filename;
        }

        $question->save();
        return redirect()->route('admin.allQuestion')->with('success', 'Question paper Added');
    }


    public function AllQuestion(Request $request)
    {
        $profileData = User::find(Auth::user()->id);
        $dept = DB::table('dept_attributes')->first();

        $search = $request->input('search');

        $questions = QuestionBank::query();

        if ($search) {
            // Split the search input by AND/OR using regex
            $searchTerms = preg_split('/\s+(AND|OR)\s+/i', $search, -1, PREG_SPLIT_DELIM_CAPTURE);

            // Initialize variables for constructing the query
            $operator = 'AND'; // Default operator
            $firstCondition = true;

            foreach ($searchTerms as $key => $term) {
                // Trim spaces and uppercase the operator
                $term = trim($term);
                if (strcasecmp($term, 'AND') === 0 || strcasecmp($term, 'OR') === 0) {
                    // Set operator for the next condition
                    $operator = strtoupper($term);
                } else {
                    // Apply condition based on the current operator
                    if ($firstCondition) {
                        $questions->where(function ($query) use ($term) {
                            $query->where('degree_id', 'LIKE', "%{$term}%")
                                ->orWhere('year', 'LIKE', "%{$term}%")
                                ->orWhere('semester', 'LIKE', "%{$term}%")
                                ->orWhere('title', 'LIKE', "%{$term}%")
                                ->orWhere('type', 'LIKE', "%{$term}%");
                        });
                        $firstCondition = false;
                    } else {
                        if ($operator === 'AND') {
                            $questions->where(function ($query) use ($term) {
                                $query->where('degree_id', 'LIKE', "%{$term}%")
                                    ->orWhere('year', 'LIKE', "%{$term}%")
                                    ->orWhere('semester', 'LIKE', "%{$term}%")
                                    ->orWhere('title', 'LIKE', "%{$term}%")
                                    ->orWhere('type', 'LIKE', "%{$term}%");
                            });
                        } elseif ($operator === 'OR') {
                            $questions->orWhere(function ($query) use ($term) {
                                $query->where('degree_id', 'LIKE', "%{$term}%")
                                    ->orWhere('year', 'LIKE', "%{$term}%")
                                    ->orWhere('semester', 'LIKE', "%{$term}%")
                                    ->orWhere('title', 'LIKE', "%{$term}%")
                                    ->orWhere('type', 'LIKE', "%{$term}%");
                            });
                        }
                    }
                }
            }
        }

        $questions = $questions->orderBy('rank')->paginate(15);

        return view('admin.allQuestion', compact('profileData', 'search', 'questions', 'dept'));
    }




    public function QuestionEdit($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');
        $profileData = User::find(Auth::user()->id);

        $question = QuestionBank::find($id);
        $types = DB::table('types')->where('category', "=", 'Question Bank')->get();
        $dept = DeptAttributes::first();
        return view('admin.editQuestion', compact('profileData', 'question', 'types','dept'));
    }

    public function QuestionEdited(Request $req, $id)
    {
        $question = QuestionBank::find($id);

        $question->year = $req->year;
        $question->semester = $req->semester;
        $question->title = $req->title;
        $question->degree_id = $req->degree;
        $question->session = $req->session;
        $question->exam_year = $req->exam_year;
        $dept = DB::table('dept_attributes')->first()->folder_name;
        if ($req->file('file')) {
            $file = $req->file('file');
            $filename = "Question_" . date('YmdHis') . "_" . (QuestionBank::max('id') + 100001) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('../../' . $dept . '/assets/Files/questions/'), $filename);
            $question->file = $filename;
        }

        $question->save();

        return redirect()->route('admin.allQuestion')->with('success', 'Successfully Edited!');
    }


    public function QuestionDelete($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $question = QuestionBank::find($id);

        if (!$question) {
            return redirect()->back()->with('error', 'Question not found.');
        }

        $question->delete();
        $remainingquestions = QuestionBank::orderBy('rank', 'asc')->get();

        foreach ($remainingquestions as $index => $remainingquestion) {
            $remainingquestion->rank = $index + 1;
            $remainingquestion->save();
        }

        // Log user action
        Log::channel('custom_log')->info('QuestionDelete: User ID ' . Auth::user()->user_id . ' deleted Question ID ' . $id);

        return redirect()->back()->with('success', 'Question successfully deleted.');
    }




        /*====================================================
                ------ -Carousel-----
    ====================================================*/


    public function CarouselAll()
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);
        $dept = DB::table('dept_attributes')->first();

        $carousels = DB::table('carousels')->orderBy('rank')->paginate(10);

        return view('admin.allCarouselimg', compact('profileData', 'dept', 'carousels'));
    }



    public function CarouselAdd()
    {
        $profileData = User::find(Auth::user()->id);

        $dept = DeptAttributes::first();
        return view('admin.carouselimg', compact('profileData','dept'));
    }

    public function CarouselStore(Request $req)
    {
        Carousel::query()->increment('rank');
        $carousel = new Carousel;
        $carousel->rank  = 1;

        $dept = DB::table('dept_attributes')->first()->folder_name;

        if ($req->file('img')) {
            $file = $req->file('img');
            $filename = "Carousel_" . date('YmdHis') . "_" . (Carousel::max('id') + 100001) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('../../' . $dept . '/assets/img'), $filename);
            $carousel->image = $filename;
        }

        $carousel->save();
        return redirect()->route('admin.carousel-img')->with('success', 'Carousel Image Added');
    }



    public function CarouselEdit($id)
    {   if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');
        $profileData = User::find(Auth::user()->id);
        $carousel = Carousel::find($id);
        $dept = DB::table('dept_attributes')->first();
        return view('admin.EditCarouselimg', compact('profileData', 'carousel','dept'));
    }

    public function CarouselEdited(Request $req, $id)
    {
        $carousel = Carousel::find($id);

        if (!$carousel) {
            return redirect()->back()->with('error', 'CArousel Image does not exist');
        }

        $dept = DB::table('dept_attributes')->first()->folder_name;
        if ($req->file('img')) {
            $file = $req->file('img');
            $filename = "Carousel_" . date('YmdHis') . "_" . (Carousel::max('id') + 100001) . "." . $file->getClientOriginalExtension();
            $file->move(public_path('../../' . $dept . '/assets/img'), $filename);
            $carousel->image = $filename;
        }

        $carousel->save();
        return redirect()->back()->with('success', 'Carousel Image Added');


        return redirect()->back()->with('success', 'Carousel Image updated');

    }

    public function Carouseldelete($id)
    {
        if (Auth::user()->controller_role == 'Teacher') return back()->with('error', 'Invalid link!');
        $carousel = Carousel::find($id);

        if (!$carousel) {
            return redirect()->back()->with('error', 'Carousel not found.');
        }

        try {
            Carousel::where('rank', ">", $carousel->rank)->decrement('rank', 1);
            $carousel->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to Carousel event.');
        }

        return redirect()->back()->with('success', 'Carousel deleted successfully.');

    }

    public function CarouselRankUp($id)
    {
        $current = Carousel::find($id);
        if (!$current)  return back()->with('error', 'User not found.');
        if (!$current->rank) return back()->with('info', 'Invalid Carousel image found.');

        $previous = Carousel::orderBy('rank', 'desc')->where('rank', "<", $current->rank)->first();
        if (!$previous || ($previous->rank == NULL)) {
            return back()->with('info', 'This Carousel image is already at the top.');
        }

        $rank = $current->rank;
        $current->rank = $previous->rank;
        $previous->rank = $rank;
        $current->save();
        $previous->save();

        // Log user action
        Log::channel('custom_log')->info('User Carousel: User ID ' . Auth::user()->user_id . ' moved up User ID ' . $id);

        return back()->with('success', 'User Carousel image moved up successfully.');
    }

    public function CarouselRankDown($id)
    {
        $current = Carousel::find($id);
        if (!$current) return back()->with('error', 'Carousel image not found.');
        if (!$current->rank) return back()->with('info', 'Invalid Carousel image found.');

        $next = Carousel::orderBy('rank', 'asc')->where('rank', ">", $current->rank)->first();
        if (!$next) return back()->with('info', 'This Carousel is already at the bottom.');

        $rank = $current->rank;
        $current->rank = $next->rank;
        $next->rank = $rank;
        $current->save();
        $next->save();
        // Log user action
        Log::channel('custom_log')->info('Carousel Image : User ID ' . Auth::user()->user_id . ' moved down User ID ' . $id);

        return back()->with('success', 'Carousel image moved down successfully.');
    }



    /*=============================
            Research Interest
    ==================================*/


    public function researchInt(){
        $profileData = User::find(Auth::user()->id);
        $dept = DB::table('dept_attributes')->first();
       return view('admin.researchInterest', compact('profileData','dept'));
    }

    public function researchIntSave(Request $req){
        $profileData = User::find(Auth::user()->id);
        $profileData->researchInt = $req->message;
        $profileData->save();

        return redirect()->route('admin.researchInt')->with('success','Successfully updated!');
    }

    /*

        Notices::query()->increment('rank');

        $notices = new Notices();
        $notices->not_date = $request->not_date;
        $notices->not_title = $request->not_title;
        $notices->not_type = $request->not_type;
        $notices->rank = 1;
        $dept = DB::table('dept_attributes')->all();

        if ($request->file('not_file')) {
            $file = $request->file('not_file');
            $filename = "notice_" . date('YmdHis') . "_" . (Notices::max('id') + 100001) . "." . $file->getClientOriginalExtension();
            // $file-questionlic_path('../../'.$dept->dept_url.'/notices'), $filename);
            $notices->not_file = $filename;
        }

        $notices->save();

    */



    //================     end controller  ========================
}
