<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Staff;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.list', compact('staffs'));
    }

    /**
     * Display profile of the current user
     */
    public function profile(Request $request)
    {
        $user = Staff::find($request);
        return view('staff.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create_staff');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:191|string',
            'email' => 'email|required|unique:users',
            'jabatan' => 'required|string',
            'nip' => 'required|unique:users',
        ]);

        $users = new Staff;
        $users->nama = $request->nama;
        $users->email = $request->email;
        $users->jabatan = $request->jabatan;
        $users->nip = $request->nip;
        $users->save();

        return redirect()->route('staff.index')->with('messages', ['success', 'Done!', 'Staff baru berhasil didaftarkan.']);
    }

    /**
     * Display the specified resource.
     * Profile Route
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = 1)
    {
        $staff = Staff::find($id)->first();
        return view('staff.profile_staff');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::where('id', $id)->first();
        return view('staff.edit_staff', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:191|string',
            'email' => 'email|required|unique:users',
            'jabatan' => 'required|string',
            'nip' => 'required|unique:users',
        ]);
        $users = Staff::where('id', $id);
        $users->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip
        ]);

        return redirect()->route('staff.index')->with('messages', ['success', 'Done!', 'Data berhasil diperbaharui.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Staff::find($id)->delete();
        return redirect()->route('staff.index');
    }
}
