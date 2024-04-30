<?php

namespace App\Http\Controllers;

use App\Models\Baptism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $baptism_approved = Baptism::where('is_approved' == 1 )->count();
    $baptism_pending = Baptism::where('is_approved' == 0 )->count();
    $christianUsersCount = User::role('christian')->count();
    $adminUsersCount = User::role('super admin')->count();
    $clergyUsersCount = User::role('clergy')->count();

    return view('home', [
        'christianUsersCount' => $christianUsersCount,
        'adminUsersCount' => $adminUsersCount,
        'clergyUsersCount' => $clergyUsersCount,
        'baptism_approved' => $baptism_approved,
        'baptism_pending' => $baptism_pending,
    ]);
}
}
