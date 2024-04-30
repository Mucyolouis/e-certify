<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Baptism;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBaptismRequest;
use App\Notifications\CertificateApproved;
use App\Http\Requests\UpdateBaptismRequest;

class BaptismController extends Controller
{
    /**
     * Instantiate a new baptismController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-baptism|edit-baptism|delete-baptism', ['only' => ['index','show']]);
       $this->middleware('permission:create-baptism', ['only' => ['create','store']]);
       $this->middleware('permission:edit-baptism', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-baptism', ['only' => ['destroy']]);
       $this->middleware('permission:manage-baptism', ['only' => ['manage']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        if (Gate::allows('access-all-records')) {
            // Fetch all records (no restriction)
            $baptism = Baptism::latest()->paginate(3);
        } else {
            // Fetch data for the current user (e.g., created by them)
            $baptism = Baptism::where('user_id', auth()->id())->paginate(3);
        }
        return view('baptisms.index', [
            
            'baptisms' => $baptism,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {   
        $user_id = Auth::user()->id;
        return view('baptisms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorebaptismRequest $request): RedirectResponse
    {
        Baptism::create($request->all());
        notify()->success('Baptism request created successfully!');
        return redirect()->route('baptisms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(baptism $baptism): View
    {
        return view('baptisms.show', [
            'baptism' => $baptism
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(baptism $baptism): View
    {
        return view('baptisms.edit', [
            'baptism' => $baptism
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebaptismRequest $request, Baptism $baptism): RedirectResponse
    {
        $baptism->update($request->all());
        notify()->success('Baptism request updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(baptism $baptism): RedirectResponse
    {
        $baptism->delete();
        notify()->success('Baptism request deleted successfully.');
        return redirect()->route('baptisms.index');
    }
    
    
        public function approve($id)
    {

        $user = auth()->user(); // Get the currently authenticated user
        
        $baptism = Baptism::findOrFail($id);
        $baptism->update(['is_approved' => 1,
                            'clergy_name' => $user->name,
                        ]);
        User::find($user->id)->notify(new CertificateApproved);
        notify()->success('Baptism Certificate is approved successfully.');
        return back();
    }

}
