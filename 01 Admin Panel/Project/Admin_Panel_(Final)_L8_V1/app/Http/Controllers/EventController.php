<?php

namespace App\Http\Controllers;

use App\Models\Notices;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
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
use App\Models\Events;
use App\Models\Carousel;
use App\Models\Educations;
use App\Models\Award;
use App\Models\Experience;
use App\Models\OtherExperience;
use App\Models\ResearchProfile;
use App\Models\Publications;
use App\Models\QuestionBank;

class EventController extends Controller
{
    //

    /*====================================================
            ------ -Events-----
    ====================================================*/


    public function index()
    { // show all events
        if (Auth::user()->controller_role == 'General') abort(404, 'Page not found');

        $profileData = User::find(Auth::user()->id);
        $events = DB::Table('events')->orderBy('rank')->paginate(15);
        $dept = DB::table('dept_attributes')->first();
        return view('admin.allEvent', compact('profileData', 'events', 'dept'));
    } //end


    // Add a new event
    public function create()
    {
        if (Auth::user()->controller_role == 'General') abort(404, 'Page not found');

        $profileData = User::find(Auth::user()->id);
        $dept = DeptAttributes::first();
        return view('admin.addEvents', compact('profileData','dept'));
    }

    // Store a new event
    public function store(Request $request)
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
                'title' => strip_tags($request->title),
                'description' => $request->description,
                'file' => $filename,
                'rank' => 1
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to store event.');
        }

        return redirect()->route('event.index')->with('success', 'Event Added');
    }

    // Edit a single event
    public function show($event)
    {
        if (Auth::user()->controller_role == 'General') return back()->with('error', 'Invalid link!');

        $profileData = User::find(Auth::user()->id);

        $event = Events::find($event);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $dept = DeptAttributes::first();
        return view('admin.editEvent', compact('profileData', 'event','dept'));
    }

    // Store edited event
    public function update(Request $request, $event)
    {
        $events = Events::find($event);
        if (!$events) {
            return redirect()->back()->with('error', 'events not found.');
        }

        $events->title = strip_tags($request->title);
        $events->date = $request->date;
        $events->description = $request->des;

        $filename = $events->file;
        $request->validate([
            'file' => 'mimes:png,jpg'
        ]);

        $folder = DB::table('dept_attributes')->first();

        if ($request->file('file')) {
            $id_events = $events->id + 100000;
            $file = $request->file('file');
            $filename = "events_" . date('YmdHis') . "_" . $id_events . "." . $file->getClientOriginalExtension();
            if (!$file->move(public_path('../../' . $folder->folder_name . '/assets/img/Events'), $filename)) {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
        }

        $events->file = $filename;

        try {
            $events->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update events.');
        }

        return redirect()->route('event.index')->with('success', 'Event updated successfully.');
    }

    // Delete an event
    public function destroy($event)
    {
        if (Auth::user()->controller_role == 'General') return back()->with('error', 'Invalid link!');

        $event = Events::find($event);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        try {
            Events::where('rank', ">", $event->rank)->decrement('rank', 1);
            $event->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete event.');
        }

        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }


    public function rankUp($id)
    {
        if (Auth::user()->controller_role == 'General') return back()->with('error', 'Invalid link!');

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



    public function rankDown($id)
    {
        if (Auth::user()->controller_role == 'General') return back()->with('error', 'Invalid link!');

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

}
