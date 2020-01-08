<?php

namespace App\Http\Controllers;

use App\superAdmin;
use App\User;
use App\Room;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function home() 
    {
        return view('superadmin.home');
    }
    public function adminList()
    {
        $admins=User::where('type', '=', '3')->get();
        
        return view('superadmin.admin.list',['admins'=>$admins]);
    }
    public function addAdmin()
    {
        return view('superadmin.admin.add');
    }
    public function insertAdmin(Request $request){
        
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->phone=$request->phone;
        $user->type=3;
        $user->save();
        return redirect('/admin-list');
    }
    public function insertHostel(Request $request){
        
        $room=new Room;
        $room->room_no=$request->room;
        $room->hostel=$request->hostel;
        $room->total=$request->total;
        $room->available=$request->total;
        $room->save();
        return redirect('/room-list');
    }
    public function hostelList()
    {
        $rooms=Room::all();
        
        return view('superadmin.hostel.list',['rooms'=>$rooms]);
    }
    public function addHostel()
    {
        return view('superadmin.hostel.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(superAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(superAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, superAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\superAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(superAdmin $superAdmin)
    {
        //
    }
}
