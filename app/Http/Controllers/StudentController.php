<?php

namespace App\Http\Controllers;

use App\student;
use App\Payment;
use App\Message;
use App\User;
use App\currentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class StudentController extends Controller
{
   
    public function profile(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $sql="select * from users u,rooms r,applications a,students s where s.user_id=u.id and r.id=a.room_id and s.application_id=a.id and u.id=".$student->id;
        $users=DB::select($sql);
        return view('student.profile',['student'=>$student,'users'=>$users]);
    }
    public function message(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $messages= DB::select('select * from messages where sender_id=? or receiver_id=?', [$student->id,$student->id]);
        return view('student.message',['student'=>$student,'messages'=>$messages]);
    } 
    public function insertMessage(Request $request){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        DB::statement( 'update messages set seen=1 where sender_id='.$student->id );
        $message=new message;
        $message->sender_id=$student->id;
        $admin=User::where('type', 5)->first();
        $message->receiver_id=$admin->id;
        $message->message=$request->message;
        $message->seen=0;
        $message->save();
        return redirect('/student-message');
    } 
    public function uploadReceipt(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        
        return view('student.payments.upload',['student'=>$student]);
    }
    public function uploadCanteenReceipt(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        
        return view('student.payments.canteenUpload',['student'=>$student]);
    }

    public function paymentHistory(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $payments = DB::select('select p.updated_at,p.month,p.year,p.status,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id  and  u.id = ? and p.type=0', [$student->id]);        
        
        return view('student.payments.history',['student'=>$student,"payments"=>$payments]);
    }
    public function canteenPaymentHistory(){
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        $payments = DB::select('select p.updated_at,p.month,p.year,p.status,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and  u.id = ? and p.type=1', [$student->id]);        
        
        return view('student.payments.canteenHistory',['student'=>$student,"payments"=>$payments]);
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
        $payment->save(); 


        return redirect('/student-canteen-payment');
    }
    public function home(Request $request) 
    {
        $cu=currentUser::all()->first();
         $student = User::where('id', $cu->current_student)->first();
        return view('student.home',['student'=>$student]);
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
