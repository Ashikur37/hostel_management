<?php

namespace App\Http\Controllers;

use App\superAdmin;
use App\User;
use App\Hostel;
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
        
        $hostel=new Hostel;
        $hostel->room_no=$request->room;
        $hostel->building_no=$request->building;
        $hostel->price=$request->price;
        $hostel->location=$request->location;
        $hostel->lat="0";
        $hostel->long="0";
        $hostel->gender=$request->gender;
        
        $hostel->empty=0;
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $hostel->image=$imageName;
        $hostel->save();
        return redirect('/hostel-list');
    }
    public function hostelList()
    {
        $hostels=Hostel::all();
        
        return view('superadmin.hostel.list',['hostels'=>$hostels]);
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
