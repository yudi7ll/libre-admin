<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
        return view('staff.staff');
    }

    public function list()
    {
        $staffs = User::get();
        return view('staff.list', compact('staffs'));
    }
}
