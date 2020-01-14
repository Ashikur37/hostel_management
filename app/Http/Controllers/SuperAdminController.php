<?php

namespace App\Http\Controllers;

use App\superAdmin;
use App\User;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function deleteAdmin(Request $request){
       $admin= User::find($request->id);
        $admin->delete();
        return redirect('/admin-list');
    }
    public function adminList()
    {
        $admins=DB::select('select * from users where type=5 or type=6 or type=7');
        
        return view('superadmin.admin.list',['admins'=>$admins]);
    }
    public function editAdmin(Request $request)
    {
        $admin= User::find($request->id);
        return view('superadmin.admin.edit',['admin'=>$admin]);
    }
    public function updateAdmin(Request $request)
    {
        $user= User::find($request->admin);
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->type=$request->hostel;
        $user->save();
        return redirect('admin-list');
    }
    public function addAdmin()
    {
        return view('superadmin.admin.add');
    }
    public function insertAdmin(Request $request){
        
        $user=new User;
        $user->name=$request->name;
        $user->phone=$request->phone;
        $user->type=$request->hostel;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->save();
        return redirect('/admin-list');
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
