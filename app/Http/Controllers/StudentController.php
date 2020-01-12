<?php

namespace App\Http\Controllers;

use App\student;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function uploadReceipt(){
        if(!session('student')){
            return redirect('/');
        }
        $student = session('student');
        
        return view('student.payments.upload',['student'=>$student]);
    }

    public function paymentHistory(){
        if(!session('student')){
            return redirect('/');
        }
        $student = session('student');
        $payments = DB::select('select p.updated_at,p.month,p.year,p.status,p.created_at,receipt,p.id,a.name,student_id,department,room_no,seat_no from users u,rooms r,payments p,students s,applications a where u.id=s.user_id and u.id=p.user_id and r.id=a.room_id and a.id=s.application_id and  u.id = ?', [$student->id]);        
        
        return view('student.payments.history',['student'=>$student,"payments"=>$payments]);
    }
    public function insertReceipt(Request $request){
        if(!session('student')){
            return redirect('/');
        }
        $student = session('student');

        $request->validate([

            'receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $payment = new Payment;
        $payment->user_id=$student->id;
        $payment->year=$request->year;
        $payment->month=$request->month;
        $imageName = time().'.'.$request->receipt->getClientOriginalExtension();
        $request->receipt->move(public_path('images'), $imageName);
        $payment->receipt=  $imageName;
        $payment->status=0;
        $payment->save(); 


        return redirect('/student-payment');
    }
    public function home() 
    {
        if(!session('student')){
            return redirect('/');
        }
        $student = session('student');
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
