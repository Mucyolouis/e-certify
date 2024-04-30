<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Marriage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreMarriageRequest;
use App\Http\Requests\UpdateMarriageRequest;
use App\Notifications\MarriageCertificateApproved;

class MarriageController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-marriage|edit-marriage|delete-marriage', ['only' => ['index','show']]);
       $this->middleware('permission:create-marriage', ['only' => ['create','store']]);
       $this->middleware('permission:edit-marriage', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-marriage', ['only' => ['destroy']]);
       $this->middleware('permission:manage-marriage', ['only' => ['manage']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (Gate::allows('access-all-records')) {
            // Fetch all records (no restriction)
            $marriage = Marriage::latest()->paginate(3);
        } else {
            // Fetch data for the current user (e.g., created by them)
            $marriage = Marriage::where('user_id', auth()->id())->paginate(3);
        }
        return view('marriages.index', [
            
            'marriages' => $marriage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('marriages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarriageRequest $request): RedirectResponse
{
    try {
        $marriage = new Marriage($request->all());
        $marriage->save();
        notify()->success('New marriage added successfully!');
        return redirect()->route('marriages.index');
    } catch (\Exception $e) {
        
        return back()->withErrors('An error occurred while storing the marriage.');
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Marriage $marriage): View
    {
        return view('marriages.show', [
            'marriage' => $marriage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marriage $marriage): View
    {
        return view('marriages.edit', [
            'marriage' => $marriage
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarriageRequest $request, Marriage $marriage): RedirectResponse
    {
        $marriage->update($request->all());
        notify()->success('Successfully Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marriage $marriage): RedirectResponse
    {
        $marriage->delete();
        notify()->success('Marriage request deleted successfully!');
        return redirect()->route('marriages.index');
    }

    // method to approve the marriage request
        public function approve($id)
    {

        $user = auth()->user(); // Get the currently authenticated user
        
        $marriage = Marriage::findOrFail($id);
        $marriage->update(['is_approved' => 1,
                            'clergy_name' => $user->name,
                        ]);
        User::find($user->id)->notify(new MarriageCertificateApproved);
        notify()->success('Marriage Certificate approved successfully!');

        return back();
    }
}
