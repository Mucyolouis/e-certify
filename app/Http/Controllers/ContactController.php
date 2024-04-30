<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $Contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resources.
     */
    public function edit(Contact $Contact)
    {
        //
    }

    /**
     * Update the specified resources in storage.
     */
    public function update(Request $request, Contact $Contact)
    {
        //
    }

    /**
     * Remove the specified resources from storage.
     */
    public function destroy(Contact $Contact)
    {
        //
    }
}
