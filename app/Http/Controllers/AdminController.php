<?php

namespace App\Http\Controllers;

use App\admin;
use App\Payment;
use Mail;
use App\user;
use App\message;
use App\Application;
use App\Student;
use App\Room;
use App\Notice;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
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
    public function insertHostel(Request $request){
        $admin = session('admin');
        $type=$admin->type;
        if($type==5){
            $hostel='boys1';
        }
        else if($type==6){
            $hostel='boys2';
            
        }
        else{
            $hostel='girls';
        }
        $room=new Room;
        $room->room_no=$request->room;
        $room->hostel=$hostel;
        $room->total=$request->total;
        $room->available=$request->total;
        $room->save();
        return redirect('/room-list');
    }
    public function addHostel()
    {
        return view('superadmin.hostel.add');
    }

    public function home()
    {
       
        return view('admin.home');
        
    }
    public function addNotice(){
        return view('admin.notice.add');
    }
    public function insertNotice(Request $request){
        $notice=new Notice;
        $notice->title=$request->title;
        $notice->body=$request->body;
        $notice->save();
        return redirect('/notice-list');
    }
    public function noticeList(){
        $notices=Notice::all();
        return view('admin.notice.list',['notices'=>$notices]);
    }
    public function hostelList()
    {
        $admin = session('admin');
        $type=$admin->type;
        if($type==5){
            $hostel='boys1';
        }
        else if($type==6){
            $hostel='boys2';
            
        }
        else{
            $hostel='girls';
        }
        $rooms=Room::where('hostel','=',$hostel)->get();
        
        return view('superadmin.hostel.list',['rooms'=>$rooms]);
    }
    public function insertMessage(Request $request){
     
        $message=new message;
        $admin=User::where('type', 3)->first();
        $message->receiver_id=$request->student;
        $message->sender_id=$admin->id;
        $message->message=$request->message;
        $message->seen=0;
        $message->save();
        return redirect('/admin-message?student='.$request->student);
    } 
    public function message(Request $request){
        $student=$request->student;
        $messages= DB::select('select s.name as sender,r.name as receiver,m.created_at,message from messages m,users s,users r where m.sender_id=s.id and m.receiver_id=r.id and (sender_id=? or receiver_id=?)', [$student,$student]);
        return view('admin.message.chat',['student'=>$student,'messages'=>$messages]);
    }
    public function inbox(){
        $sql="SELECT m.created_at,message,s.name,s.id,s.email from messages m, users s,users r where m.sender_id=s.id and m.receiver_id=r.id and s.type!=3 and m.seen=0";
        $messages = DB::select($sql);
        
        return view('admin.message.inbox',["messages"=>$messages]);
    }
    public function approvePayment(Request $request){
        $payment=Payment::where('id', $request->id)->first();
        $payment->status=1;
        $payment->save();
        return redirect('/pending-payment');
    }
    public function pendingPayment(){
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=0 and  p.status = ?', [0]);        
        return view('admin.payments.pending',['payments'=>$payments]);
    }
    public function paymentHistory(){
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=0 and  p.status = ?', [1]);        
        return view('admin.payments.success',['payments'=>$payments]);
    }

    public function approvePaymentCanteen(Request $request){
        $payment=Payment::where('id', $request->id)->first();
        $payment->status=1;
        $payment->save();
        return redirect('/pending-payment-canteen');
    }
    public function pendingPaymentCanteen(){
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=1 and  p.status = ?', [0]);        
        return view('admin.payments.pendingCanteen',['payments'=>$payments]);
    }
    public function paymentHistoryCanteen(){
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=1 and  p.status = ?', [1]);        
        return view('admin.payments.successCanteen',['payments'=>$payments]);
    }

    public function supervisor(Request $request){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $image_path = "/images/supervisor.jpg";  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
            }

        request()->image->move(public_path('images'), "supervisor.jpg");
        return redirect('/signatures');
    }
    public function registrar(Request $request){
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $image_path = "/images/registrar.jpg";  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
            }

        request()->image->move(public_path('images'), "registrar.jpg");
        return redirect('/signatures');
    }
    public function cancelBook(Request $request){
        $application=Application::where('id', $request->id)->first();
        $application->status=2;
        $application->save();
        return redirect('/view-room?id='.$request->room);
    }
    public function viewRoom(Request $request)
    {
        $applications=Application::where([
            ['room_id', '=', $request->id],
            ['status', '=', '1']
        ])->get();
        
        return view('admin.room.students',['students'=>$applications,'room'=>$request->id]);
    }
    public function roomList()
    {
        $rooms=Room::all();
        
        return view('admin.room.list',['rooms'=>$rooms]);
    }
    public function reject(Request $request){
        $body=$request->body;
        $application=Application::where('id', $request->id)->first();
        $application->status=2;
        $application->save();
        $name=$application->name;;
        $email=$application->email;
        $data=array("name"=>$name,"body"=>"Your application has been recjected. ".$body);
        Mail::send('mail',$data,function($message) use ($name,$email){
            $message->to($email)
             ->subject('Hostel Booking Rejected');
        });
         return redirect('/unapproved-application');

    }
    public function confirmApprove(Request $request){
        $password=$request->password;
        $room_id=$request->room;
        $seat=$request->seat;
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
        $room=Room::where('id', $room_id)->first();
        $room->available=$room->available-1;
        $room->save();
        //update application
        $application->status=1;
        $application->room_id=$room_id;
        $application->seat_no=$seat;
        $application->save();
        //send mail
        $name=$user->name;
       $email=$user->email;
       $data=array("seat"=>$seat,"room"=>$room->room_no,"name"=>$name,"body"=>"Your application has been accepted. Use the email ".$user->email." and password ".$user->password." to login");
       Mail::send('approveMail',$data,function($message) use ($name,$email){
           $message->to($email)
            ->subject('Hostel Booking Success');
       });
      
        return redirect('/approved-application');

    }
    public function unapprovedUser(){
        $admin = session('admin');
        $type=$admin->type;
        if($type==5){
            $hostel='boys1';
        }
        else if($type==6){
            $hostel='boys2';
            
        }
        else{
            $hostel='girls';
        }
        $applications = DB::select('select a.image,a.id,room_no,name,student_id,email,phone,department,batch,father,mother,address,guardian from applications a,rooms r where a.room_id=r.id and status = ? and a.hostel=?', [0,$admin->type]);        
        $rooms=Room::where('hostel','=',$hostel)->get();
        return view('admin.unapproved_user.list',['applications'=>$applications,'rooms'=>$rooms]);
    }
    public function approvedUser(){
        $admin = session('admin');
        $type=$admin->type;
        if($type==5){
            $hostel='boys1';
        }
        else if($type==6){
            $hostel='boys2';
            
        }
        else{
            $hostel='girls';
        }
        $applications = DB::select('select a.id,room_no,name,student_id,email,phone,department,batch,father,mother,address,guardian from applications a,rooms r where a.room_id=r.id and status = ? and a.hostel=?', [1,$admin->type]);        
        return view('admin.approved_user.list',['applications'=>$applications]);
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
