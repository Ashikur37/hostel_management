<?php

//ALTER TABLE `payments` ADD `fine` INT NOT NULL DEFAULT '0' AFTER `last`;
namespace App\Http\Controllers;
use App\admin;
use App\Payment;
use App\notification;
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
use App\LeaveApplication;
use App\StudentData;

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
    public function addStudentData(){
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.student_data.add',['notifications'=>$notifications]);
    }
    public function insertStudentData(Request $request){
        StudentData::create([
            "student_id"=>$request->student_id,
            "phone"=>$request->phone
        ]);
        return redirect('/student-data-list');
    }
    public function studentData(){
        $datas=StudentData::all();
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.student_data.list',['notifications'=>$notifications,"datas"=>$datas]);
    }
    public function deleteStudentData(){
        $data=StudentData::find(request()->id);
        $data->delete();
        return redirect('/student-data-list');
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
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('superadmin.hostel.add',['notifications'=>$notifications]);
    }

    public function home()
    {
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        
        return view('admin.home',['notifications'=>$notifications]);
        
    }
    public function addNotice(){
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.notice.add',['notifications'=>$notifications]);
    }
    public function insertNotice(Request $request){
        $admin = session('admin');
        $type=$admin->type;
        $notice=new Notice;
        $notice->hostel=$type;
        $notice->title=$request->title;
        $notice->body=$request->body;
        $notice->save();
        return redirect('/notice-list');
    }
    public function noticeList(){
        $admin = session('admin');
        $type=$admin->type;
        $notices=Notice::where('hostel','=',$type)->get();
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.notice.list',['notices'=>$notices,'notifications'=>$notifications]);
    }
    public function approveLeave(   Request $request){
        $leaveApplication=LeaveApplication::where('id', $request->id)->first();
        $leaveApplication->status=1;
        $leaveApplication->save();
        $application = Application::where('id', $leaveApplication->application_id)->first();
        $application->status=2;
        $application->save();
        $room=Room::where('id', $application->room_id)->first();
        $room->available=$room->available+1;
        $room->save();
        return redirect('/leave-list');
    }
    public function unapproveLeave(   Request $request){
        $leaveApplication=LeaveApplication::where('id', $request->id)->first();
        $leaveApplication->status=2;
        $leaveApplication->save();
        $application = Application::where('id', $leaveApplication->application_id)->first();
        $name=$application->name;;
        $email=$application->email;
        $data=array("name"=>$name,"body"=>"Your leave application has been recjected. ".$request->body);
        Mail::send('mail',$data,function($message) use ($name,$email){
            $message->to($email)
             ->subject('Leave application Rejected');
        });
        $message=new message;
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $message->sender_id=$a->id;
        $s=User::where('email', $email)->first();
        $message->receiver_id=$s->id;
        $message->message=$request->body;
        $message->seen=0;
        $message->save();
        return redirect('/leave-list');
    }
    public function leaveList(){
        $admin = session('admin');
        $type=$admin->type;
        $applications=DB::select('select a.email,l.id,l.leave_at,l.status,a.name,a.seat_no,a.student_id,a.phone,r.room_no from rooms r,applications a,leave_applications l where r.id=a.room_id and a.id=l.application_id and a.hostel=?', [$type]);
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.leave.list',['applications'=>$applications,'notifications'=>$notifications]);
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
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('superadmin.hostel.list',['rooms'=>$rooms,'notifications'=>$notifications]);
    }
    public function insertMessage(Request $request){
     
        $message=new message;
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $message->sender_id=$a->id;
        $message->receiver_id=$request->student;
        $message->message=$request->message;
        $message->seen=0;
        $message->save();
        return redirect('/admin-message?student='.$request->student);
    } 
    public function message(Request $request){
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $student=$request->student;
        $messages= DB::select('select m.id,s.id as sid,s.name as sender,r.name as receiver,m.created_at,message from messages m,users s,users r where m.sender_id=s.id and m.receiver_id=r.id and (sender_id=? or receiver_id=?)', [$student,$student]);
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.message.chat',['notifications'=>$notifications,'student'=>$student,'messages'=>$messages,'a'=>$a->id,'student'=>$student]);
    }
    public function deleteMessage(Request $request){
        $message = Message::where('id', $request->id)->first();
        $message->delete();
       return redirect('/admin-message?student='.$request->sid);
    }
    public function updateMessage(Request $request){
        $message = Message::where('id', $request->id)->first();
        $message->message=$request->msg;
        $message->save();
       return redirect('/admin-message?student='.$request->sid);
    }
    public function inbox(){
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $sql="SELECT m.created_at,message,s.name,s.id,s.email from messages m, users s where m.sender_id=s.id and m.seen=0 and receiver_id=".$a->id;
        $messages = DB::select($sql);
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.message.inbox',["messages"=>$messages,'notifications'=>$notifications]);
    }
    public function updateFine(Request $request){
        $payment=Payment::where('id', $request->id)->first();
        $payment->fine=$request->fine;
        $payment->save();
        $user=User::find($payment->user_id);
        $name=$user->name;;
        $email=$user->email;

        $message=new message;
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $message->sender_id=$a->id;
        $s=User::where('email', $email)->first();
        $message->receiver_id=$s->id;
        $message->message="You have been fined  ".$request->fine." for the payment of ".$payment->month." ".$payment->year;
        $message->seen=0;
        $message->save();

        $data=array("name"=>$name,"body"=>"You have been fined  ".$request->fine." for the payment of ".$payment->month." ".$payment->year);
        Mail::send('mail',$data,function($message) use ($name,$email){
            $message->to($email)
             ->subject('Fine added for');
        });
        
        return redirect('/due-payment');
    }
    public function approvePayment(Request $request){
       
        $payment=Payment::where('id', $request->id)->first();
        $payment->status=1;
        $payment->amount=$request->amount;
        $payment->save();
        $user=User::find($payment->user_id);
        $name=$user->name;;
        $email=$user->email;

        $message=new message;
        $admin = session('admin');
        $type=$admin->type;
        $a=User::where('type', $type)->first();
        $message->sender_id=$a->id;
        $s=User::where('email', $email)->first();
        $message->receiver_id=$s->id;
        $message->message="Your payment has been approved with amount ".$request->amount;
        $message->seen=0;
        $message->save();

        $data=array("name"=>$name,"body"=>"Your payment has been approved with amount ".$request->amount);
        Mail::send('mail',$data,function($message) use ($name,$email){
            $message->to($email)
             ->subject('Hostel payment approved');
        });
        
        return redirect('/pending-payment');
    }
    public function pendingPayment(){
        $admin = session('admin');
        $type=$admin->type;
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=0 and  p.status = ? and a.hostel=?', [0,$type]);        
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.payments.pending',['payments'=>$payments,'notifications'=>$notifications]);
    }
    public function paymentHistory(){
        $admin = session('admin');
        $type=$admin->type;
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=0 and  p.status = ? and a.hostel=?', [1,$type]);        
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.payments.success',['payments'=>$payments,'notifications'=>$notifications]);
    }
    public function duePayment(){
        $admin = session('admin');
        $type=$admin->type;
        if($type==5){
            $rent=1650;
        }
        else if($type==6){
            $rent=1400;
        }
        else{
            $rent=2000;
        }
        
        $payments = DB::select('select p.id,p.fine,p.amount as amount,p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=0 and  p.status = ? and a.hostel=? and amount<? and last=1', [1,$type,$rent]);        
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.payments.due',['payments'=>$payments,'rent'=>$rent,'notifications'=>$notifications]);
    }

    public function approvePaymentCanteen(Request $request){
        $payment=Payment::where('id', $request->id)->first();
        $payment->status=1;
        $payment->save();
        return redirect('/pending-payment-canteen');
    }
    public function pendingPaymentCanteen(){
        $admin = session('admin');
        $type=$admin->type;
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=1 and  p.status = ? and a.hostel=?', [0,$type]);        
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.payments.pendingCanteen',['payments'=>$payments,'notifications'=>$notifications]);
    }
    public function paymentHistoryCanteen(){
        $admin = session('admin');
        $type=$admin->type;
        $payments = DB::select('select p.year,p.month,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and p.type=1 and  p.status = ? and a.hostel=?', [1,$type]);        
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.payments.successCanteen',['payments'=>$payments,'notifications'=>$notifications]);
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
        $admin = session('admin');
        $type=$admin->type;
        $applications=Application::where([
            ['room_id', '=', $request->id],
            ['status', '=', '1']
        ])->get();
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.room.students',['notifications'=>$notifications,'students'=>$applications,'room'=>$request->id]);
    }
    public function roomList()
    {
        $admin = session('admin');
        $type=$admin->type;
        $rooms=Room::all();
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.room.list',['rooms'=>$rooms,'notifications'=>$notifications]);
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
        $app=DB::select('select * from applications where room_id="'.$request->room.'" and seat_no="'.$request->seat.'" and status=1');
        if(count($app)==1){
            return redirect('/unapproved-application?msg='.$request->id);
        }


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
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.unapproved_user.list',['applications'=>$applications,'rooms'=>$rooms,'notifications'=>$notifications]);
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
        $a=User::where('type', $type)->first();
        $notifications=notification::where('user_id',$a->id)->get();
        return view('admin.approved_user.list',['applications'=>$applications,'notifications'=>$notifications]);
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
