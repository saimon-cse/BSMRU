<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Component;
use App\Models\ComponentIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component as ViewComponent;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function dashboard(){
        $profileData = User::find(Auth::user()->id);
        $available = Component::sum('available_quantity');
        $issued = Component::sum('issued_quantity');
        $purchase = Component::sum('purchase_quantity');

        return view('admin.index', compact('profileData','available','issued','purchase'));
    } // end method 'dashboard'

    public function entryComponentPage(){
        $profileData = User::find(Auth::user()->id);
        $categories = Category::all();
        return view('admin.EntryComponent', compact('profileData','categories'));
    } // end method 'entryComponentPage'


    public function entryComponent(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'remarks' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Component::query()->increment('rank');
        $component = new Component;

        $component->component_code = $request->component_code;
        $component->name = $request->name;
        $component->model = $request->model;
        $component->category = $request->category;
        $component->purchase_quantity = $request->quantity;
        $component->issued_quantity = 0;
        $component->available_quantity = $request->quantity;
        $component->unit_price = $request->unit_price;
        $component->total_price = $request->total_price;
        $component->remarks = $request->remarks;
        $component->rank = 1;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHis') . $request->name . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/upload/component'), $filename);
            $component->image = $filename;
        }
        $component->save();
        return redirect()->route('admin.component.all')->with('success', 'Component added successfully!!');
    } // end method 'entryComponent'


    // public function allComponent(){
    //     $profileData = User::find(Auth::user()->id);
    //     $components = Component::orderBy('category')->paginate(15);
    //     $categories = Category::all();
    //     return view('admin.AllComponent', compact('profileData', 'components','categories'));
    // }

    public function allComponent(Request $request) {
        $profileData = User::find(Auth::user()->id);

        $query = Component::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('category', 'LIKE', '%' . $search . '%')
                  ->orWhere('component_code', 'LIKE', '%' . $search . '%')
                  ->orWhere('name', 'LIKE', '%' . $search . '%')
                  ->orWhere('model', 'LIKE', '%' . $search . '%');
            });
        }

        $components = $query->orderBy('category')->paginate(15);
        $categories = Category::all();
        return view('admin.AllComponent', compact('profileData', 'components','categories'));
    }





    public function deleteComponent($id)
    {
        $component = Component::find($id);
        if ($component) {
            // Delete the image file if it exists
            if (file_exists(public_path('upload/component/' . $component->image))) {
                unlink(public_path('upload/component/' . $component->image));
            }
            Component::where('rank', ">", $component->rank)->decrement('rank', 1);
            $component->delete();
            return redirect()->route('admin.component.all')->with('success', 'Component deleted successfully!');
        } else {
            return redirect()->route('admin.component.all')->with('error', 'Component not found!');
        }
    }


    public function updateComponent(Request $request) {
        $request->validate([
            'id' => 'required|exists:components,id',
            'name' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'unit_price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'remarks' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $component = Component::find($request->id);
        $component->component_code = $request->component_code;
        $component->name = $request->name;
        $component->model = $request->model;
        $component->category = $request->category;
        $component->purchase_quantity = $request->purchase_quantity;
        $component->available_quantity = $request->available_quantity;
        $component->issued_quantity = $request->issued_quantity;
        $component->unit_price = $request->unit_price;
        $component->total_price = $request->total_price;
        $component->remarks = $request->remarks;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHis') . $request->name . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/upload/component'), $filename);
            $component->image = $filename;
        }

        $component->save();

        return redirect()->route('admin.component.all')->with('success', 'Component updated successfully!');
    }


    // app/Http/Controllers/AdminController.php

public function showIssueComponentForm()
{
    $profileData = User::find(Auth::user()->id);
    $components = Component::orderBy('category')->get(); // Fetch all components for selection
    return view('admin.issueComponent', compact('components','profileData'));

}

public function issueComponent(Request $request)
{

    try {
        // Retrieve the component
        $component = Component::findOrFail($request->component_id);

        // Check if there's enough available quantity
        if ($component->available_quantity < $request->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough available quantity']);
        }

        // $component = Component::where('component_code', $request->component_code)->firstOrFail();
//
        // Increase available quantity
        $component->available_quantity -= $request->quantity;

        // Decrease issued quantity
        $component->issued_quantity += $request->quantity;
// Save the updated component
$component->save();
        // Create a new ComponentIssue instance
        $issue = new ComponentIssue;
        $issue->name = $request->name;
        $issue->student_id = $request->student_id;
        $issue->dept = $request->dept;
        $issue->component_code = $component->component_code;
        $issue->component_name = $component->name;
        $issue->available =  $component->available_quantity;
        $issue->model =  $component->model;
        $issue->quantity = $request->quantity;
        $issue->issue_date = $request->issue_date;
        $issue->return_date = $request->return_date;
        $issue->save();



        // Commit the transaction


        return redirect()->route('issued.items.all')->with('success', 'Component issued successfully!');
    } catch (\Exception $e) {
        // Rollback the transaction in case of error
        DB::rollBack();
        return redirect()->back()->withErrors(['error' => 'An error occurred while issuing the component.']);
    }
}



// public function fetchComponentDetails($id)
// {
//     $component = Component::findOrFail($id);

//     return response()->json([
//         'available_quantity' => $component->available_quantity,
//         'model' => $component->model,
//     ]);
// }

public function issuedItems(Request $request){
    $profileData = User::find(Auth::user()->id);
    // $issuedItems = ComponentIssue::all();
    // return view('admin.issuedItems', compact('profileData','issuedItems'));

    $search = $request->input('search');

    $issuedItems = ComponentIssue::query()
        ->when($search, function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('student_id', 'LIKE', "%{$search}%")
                ->orWhere('component_name', 'LIKE', "%{$search}%")
                ->orWhere('return_date', 'LIKE', "%{$search}%")
                ->orWhere('dept', 'LIKE', "%{$search}%");
        })
        ->orderBy('return_date')->paginate(15);

    return view('admin.issuedItems', compact('issuedItems', 'search', 'profileData'));
}



public function showReturnComponentForm()
{
    $profileData = User::find(Auth::user()->id);
    $components = Component::orderBy('category')->get();
    return view('admin.return_component', compact('profileData','components'));
}

// public function returnComponent(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'student_id' => 'required|string|max:255',
//         'component_code' => 'required|string|max:255',
//         'quantity' => 'required|integer|min:1',
//         'return_date' => 'required|date',
//     ]);

//     $component = Component::where('code', $request->component_code)->first();

//     if (!$component) {
//         return back()->with('error', 'Component not found.');
//     }

//     if ($request->quantity > $component->issued_quantity) {
//         return back()->with('error', 'Returned quantity exceeds issued quantity.');
//     }

//     $component->available_quantity += $request->quantity;
//     $component->issued_quantity -= $request->quantity;
//     $component->save();

//     // Optionally, log the return transaction
//     // ReturnTransaction::create([
//     //     'name' => $request->name,
//     //     'student_id' => $request->student_id,
//     //     'component_id' => $component->id,
//     //     'quantity' => $request->quantity,
//     //     'return_date' => $request->return_date,
//     // ]);

//     return back()->with('success', 'Component returned successfully.');
// }

// public function returnComponent(Request $request)
// {
//     // Start a transaction
//     DB::beginTransaction();

//     try {
//         // Retrieve the component
//         $component = Component::where('component_code', $request->component_code)->firstOrFail();

//         // Increase available quantity
//         $component->available_quantity += $request->quantity;

//         // Decrease issued quantity
//         $component->issued_quantity -= $request->quantity;

//         // Update the component in the database
//         $component->save();

//         // Find the corresponding issue record
//         $issue = ComponentIssue::where('component_code', $request->component_code)
//                                ->where('student_id', $request->student_id)
//                                ->whereNull('returned_date')
//                                ->firstOrFail();

//         // Update the issue record
//         $issue->returned_date = now();
//         $issue->save();

//         // If all components are returned, delete the issue record
//         if ($issue->quantity === $request->quantity) {
//             $issue->delete();
//         }

//         // Commit the transaction
//         DB::commit();

//         return redirect()->route('return.component.create')->with('success', 'Component returned successfully!');
//     } catch (\Exception $e) {
//         // Rollback the transaction in case of error
//         DB::rollBack();
//         return redirect()->back()->withErrors(['error' => 'An error occurred while returning the component.']);
//     }
// }

public function updateReturn(Request $request, $id)
    {
        // Validate return quantity
        $request->validate([
            'return_quantity' => 'required|numeric|min:0',
        ]);

        // Find the issued item
        $issuedItem = ComponentIssue::findOrFail($id);

        $component = Component::where('component_code', "=", $issuedItem->component_code)->firstOrFail();
        // Calculate new available and issued quantities
        $returnQuantity = $request->return_quantity;
        if ($returnQuantity > $issuedItem->quantity) {
            return back()->with('error', 'The return quantity is greater than issued quantity');
        }
        $component->available_quantity += $returnQuantity;
        $component->issued_quantity -= $returnQuantity;

        // Update the component's quantities
        // $component = $issuedItem->component;
        // $component->available_quantity = $newAvailableQuantity;
        // $component->issued_quantity = $newIssuedQuantity;
        $component->save();

        // Update the issued item
        if ($returnQuantity == $issuedItem->quantity) {
            // Delete the row if all quantity is returned
            $issuedItem->delete();
        }
         else {
            // Update the quantity returned
            $issuedItem->quantity -= $returnQuantity;
            $issuedItem->save();
        }

        return redirect()->back()->with('success', 'Component return updated successfully!');
    }

    public function destroy($id)
    {
        // Find the issued item
        $issuedItem = ComponentIssue::findOrFail($id);

        // Delete the issued item
        $issuedItem->delete();

        return redirect()->back()->with('success', 'Issued item deleted successfully!');
    }


    public function PasswordUpdate()
    {
        // if(Auth::user()->controller_role == 'Staff'){
        $profileData = User::find(Auth::user()->id);
        return view('admin.PasswordUpdate', compact('profileData'));
        // }
    }




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

        // $notification = array(
        //     'message' => 'Password changed successfully',
        //     'alert-type' => 'session'
        // );
        return back()->with('session', 'Password changed successfully');
    }

} // end controller
