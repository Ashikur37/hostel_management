<?php

namespace App\Http\Controllers;

use App\User;
use App\student;
use Illuminate\Http\Request;

class userController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function signup(Request $request)
    {
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->phone=$request->phone;
        $user->type=0;
        $user->save();
        $student=new student;
        $student->student_id=$request->student_id;
        $student->gender=$request->gender;
        $student->department=$request->department;
        $student->batch=$request->batch;
        $student->user_id=$user->id;
        $student->save();
        return redirect('/signin?msg=Signup Success. Wait for Approval');



    }
 public function signin(Request $request){
    $user=User::where('email', '=', $request->email)->where('password', '=', $request->password)->first();
    
    if(!$user){
        return redirect('/signin?msg=Invalid email or password');
    }
    else if($user->type==0){
        return redirect('/signin?msg=Your account is under approval');
    }
    else if($user->type==1){
        return redirect('/student');
    }
    else if($user->type==2){
        return redirect('/accountant');
    }
    else if($user->type==3){
        return redirect('/admin');
    }
    else if($user->type==4){
        return redirect('/superadmin');
    }

 }
    /**
     * Display the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $user)
    {
        //
    }
}
