<?php

namespace App\Http\Controllers;

use App\admin;
use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
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
        return view('admin.home');
    }

    public function unapprovedUser(){
        $users = DB::select('select u.id,name,email,phone,department,gender,batch,student_id from users u,students s where s.user_id=u.id and type = ?', [0]);
        return view('admin.unapproved_user.list',['users'=>$users]);
    }
    public function approvedUser(){
        $users = DB::select('select u.id,name,email,phone,department,gender,batch,student_id from users u,students s where s.user_id=u.id and type = ?', [1]);
        return view('admin.approved_user.list',['users'=>$users]);
    }
    public function approveUser(Request $request){
        $user=User::where('id', '=', $request->id)->first();
        $user->type=1;
        $user->save();
        return redirect('/unapproved-user');
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
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
