<?php

namespace App\Http\Controllers;

use App\student;
use App\Payment;
use App\Message;
use App\User;
use App\Application;
use App\currentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Notice;
use App\LeaveApplication;

class StudentController extends Controller
{
   public function changePassword(){
    $cu=currentUser::all()->first();
    $student = User::where('id', $cu->current_student)->first();
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
    return view('student.changePassword',['student'=>$student,'unseen'=>$unseen]);
   }
   public function leaveApp(Request $request){
    $leave=new LeaveApplication;
    $leave->application_id=$request->aid;
    $leave->leave_at=$request->start;
    $leave->status=0;
    $leave->save();
    return redirect('/profile?msg=leave');

   }
   public function updateImage(Request $request){
    $cu=currentUser::all()->first();
    $student = Student::where('user_id', $cu->current_student)->first();

    $application=Application::where('id',$student->application_id)->first();
    request()->validate([

        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);
    $imageName = time().'.'.request()->image->getClientOriginalExtension();
    request()->image->move(public_path('images'), $imageName);
    $application->image=$imageName;    
    $application->save();
    return redirect('/profile');
   }
   public function updatePassword(Request $request){
    $cu=currentUser::all()->first();
    $student = User::where('id', $cu->current_student)->first();
    $student->password=$request->password;
    $student->save();
    return redirect('/change-password?msg=success');
    }

    public function profile(){
        $cu=currentUser::all()->first();
        $student = User::where('id', $cu->current_student)->first();
        $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
       
        $sql="select a.id,a.name,image,student_id,department,batch,semester,a.email,a.phone,a.hostel,room_no,seat_no,a.updated_at,a.leaved_at from users u,rooms r,applications a,students s where s.user_id=u.id and r.id=a.room_id and s.application_id=a.id and u.id=".$student->id;
        $users=DB::select($sql);

        return view('student.profile',['student'=>$student,'users'=>$users,'unseen'=>$unseen]);
    }
    public function notice(){
        $cu=currentUser::all()->first();
        $student = User::where('id', $cu->current_student)->first();
        $s=Student::where('user_id', $student->id)->first();
        $a=Application::where('id', $s->application_id)->first();
     
        $notices=Notice::where('hostel', $a->hostel)->get();
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
        return view('student.notice',['student'=>$student,'notices'=>$notices,'unseen'=>$unseen]);
    }
    public function message(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
         DB::statement("update messages set seen=1 where receiver_id=".$student->id);
        $messages= DB::select('select * from messages where sender_id=? or receiver_id=?', [$student->id,$student->id]);
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
       
        return view('student.message',['student'=>$student,'messages'=>$messages,'unseen'=>$unseen]);
    } 
    public function deleteMessage(Request $request){
        $message = Message::where('id', $request->id)->first();
        $message->delete();
       return redirect('/student-message');
    }
    public function updateMessage(Request $request){
        $message = Message::where('id', $request->id)->first();
        $message->message=$request->msg;
        $message->save();
       return redirect('/student-message');
    }
    public function insertMessage(Request $request){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $s=Student::where('user_id', $student->id)->first();
        $a=Application::where('id', $s->application_id)->first();
     
        DB::statement( 'update messages set seen=1 where sender_id='.$student->id );
        $message=new message;
        $message->sender_id=$student->id;
        $admin=User::where('type', $a->hostel)->first();
        $message->receiver_id=$admin->id;
        $message->message=$request->message;
        $message->seen=0;
        $message->save();
        return redirect('/student-message');
    } 
    public function uploadReceipt(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
        
        return view('student.payments.upload',['student'=>$student,'unseen'=>$unseen]);
    }
    public function uploadCanteenReceipt(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
        
        return view('student.payments.canteenUpload',['student'=>$student,'unseen'=>$unseen]);
    }

    public function paymentHistory(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $payments = DB::select('select p.updated_at,p.month,p.year,p.status,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id  and  u.id = ? and p.type=0', [$student->id]);        
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
        
        return view('student.payments.history',['student'=>$student,"payments"=>$payments,'unseen'=>$unseen]);
    }
    public function canteenPaymentHistory(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $payments = DB::select('select p.updated_at,p.month,p.year,p.status,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and  u.id = ? and p.type=1', [$student->id]);        
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));
        
        return view('student.payments.canteenHistory',['student'=>$student,"payments"=>$payments,'unseen'=>$unseen]);
    }
    public function insertReceipt(Request $request){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();

        $request->validate([

            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $payment = new Payment;
        $payment->user_id=$student->id;
        $payment->type=0;
        $payment->year=$request->year;
        $payment->month=$request->month;
        $imageName = time().'.'.$request->receipt->getClientOriginalExtension();
        $request->receipt->move(public_path('images'), $imageName);
        $payment->receipt=  $imageName;
        $payment->status=0;
        $payment->last=1;        
        $payment->amount=0;

        $payment->save(); 


        return redirect('/student-payment');
    }
    public function insertCanteenReceipt(Request $request){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();

        $request->validate([

            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $payment = new Payment;
        $payment->user_id=$student->id;
        $payment->type=1;
        $payment->year=$request->year;
        $payment->month=$request->month;
        $imageName = time().'.'.$request->receipt->getClientOriginalExtension();
        $request->receipt->move(public_path('images'), $imageName);
        $payment->receipt=  $imageName;
        $payment->status=0;
        $payment->last=1;        
        $payment->amount=0;
        $payment->save(); 


        return redirect('/student-canteen-payment');
    }
    public function home(Request $request) 
    {
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
    $unseen=count(DB::select("select * from messages where seen=0 and  receiver_id=".$student->id));

        return view('student.home',['student'=>$student,'unseen'=>$unseen]);
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
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
