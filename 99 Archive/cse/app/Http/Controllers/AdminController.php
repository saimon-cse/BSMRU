<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
use App\Models\Events;
use App\Models\Publications;
// use app\Models\Notces;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{

    public function AdminDashboard(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.index', compact('profileData'));
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
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $publications = Publications::where('user', $id);
        return view('admin.profile', compact('profileData', 'publications'));
    }//end method

    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->fullName = $request->fullName;
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
        $id = Auth::user()->id;
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
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.addnotice', compact('profileData'));
    }//end method

    public function AdminNoticeStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $request->validate([
            'not_date'=> 'required',
            'not_title'=>'required|max:150',
            'not_file' =>'required',
        ]);
        $notices = new Notices();
        $notices->not_date = $request->not_date;
        $notices->not_title = $request->not_title;
        $notices->not_des = $request->not_des;
        if($request->file('not_file')){
            $file = $request->file('not_file');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/notices', $filename));
            $notices['not_file'] = $filename;
        }
        $notices->save();

        return redirect()->back()->with('success', 'Notice Added');


    }//end

    public function AdminNoticeUpdate(Request $request){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        $notices = DB::Table('notices')->get();
        return view('admin.updatenotice', compact('profileData'), compact('notices'));


    }//end method

    public function AdminEditNotice($id){
        $profileid = Auth::user()->id;
        $profileData = User::find($profileid);

        $notice = DB::Table('notices')->find($id);
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

        return redirect('admin/updatenotice')->with('success', 'Notice Edited');

    }//end method


    public function AddEvent(){
        $profileData = User::find(Auth::user()->id);
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
        $profileid = Auth::user()->id;
        $profileData = User::find($profileid);

        return view('accountant.form', compact('profileData'));
    }
    //end

    Public function NoticeDelete($id){
        $notice = Notices::find($id);
        $notice -> delete();

        return redirect()->back()->with('success', 'Notice successfully deleted');

    }
    //end


    // Events
    public function allEvents(){
        $profileData = User::find(Auth::user()->id);

        $events = DB::table('events')->get();
        return view('admin.allEvent', compact('profileData', 'events'));
    }//end

    //even edit

    public function editEvents( $id){
        $profileData = User::find(Auth::user()->id);

        $event = Events::find($id);
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

}
