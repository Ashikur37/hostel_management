<?php

namespace App\Http\Controllers;

use App\admin;
use Mail;
use App\user;
use App\Application;
use App\Student;
use App\Room;
use App\Booking;
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
    public function confirmApprove(Request $request){
        $password=$request->password;
        $application=Application::where('id', $request->id)->first();
        //insert in user
        $user=new User;
        $user->name=$application->name;
        $user->email=$application->email;
        $user->phone=$application->phone;
        $user->password=$password;
        $user->type=1;
        $user->save();
        //insert in student
        $student=new Student;
        $student->application_id=$application->id;
        $student->user_id=$user->id;
        $student->save();
        //insert in booking
        $booking=new Booking;
        $booking->user_id=$user->id;
        $booking->room_id=$application->room_id;
        $booking->save();
        //update room
        $room=Room::where('id', $application->room_id)->first();
        $room->available=$room->available-1;
        $room->save();
        //update application
        $application->status=1;
        $application->save();
        //send mail
        $name=$user->name;
       $email=$user->email;
       $data=array("name"=>$name,"body"=>"Your application has been accepted. Use the email ".$user->email." and password ".$user->password." to login");
       Mail::send('mail',$data,function($message) use ($name,$email){
           $message->to($email)
            ->subject('Hostel Booking Success');
       });
        return redirect('/approved-application');

    }
    public function unapprovedUser(){
        $applications = DB::select('select a.id,room_no,name,student_id,email,phone,department,batch,father,mother,address,guardian from applications a,rooms r where a.room_id=r.id and status = ?', [0]);        
        return view('admin.unapproved_user.list',['applications'=>$applications]);
    }
    public function approvedUser(){
        $applications = DB::select('select a.id,room_no,name,student_id,email,phone,department,batch,father,mother,address,guardian from applications a,rooms r where a.room_id=r.id and status = ?', [1]);        
        return view('admin.approved_user.list',['applications'=>$applications]);
    }
    public function approveUser(Request $request){
       $name="piash";
       $email="piash3700@gmail.com";
       $data=array("name"=>"test","body"=>"test email");
       Mail::send('mail',$data,function($message) use ($name,$email){
           $message->to($email)
            ->subject('lara');
       });
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
