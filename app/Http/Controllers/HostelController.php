<?php

namespace App\Http\Controllers;

use App\hostel;
use App\user;
use Mail;
use App\Room;
use App\Notice;
use App\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HostelController extends Controller
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
    public function maleHostel()
    {
        $boys1 = DB::select('select COALESCE(sum(total), 0) as total_seat,COALESCE(sum(available), 0) as total_available from rooms where hostel = ?', ['boys1']);  
        $boys2 = DB::select('select COALESCE(sum(total), 0) as total_seat,COALESCE(sum(available), 0) as total_available from rooms where hostel = ?', ['boys2']); 
        return view('maleHostel',['boys1'=>$boys1,'boys2'=>$boys2]);
    }
    public function femaleHostel()
    {
        $girls = DB::select('select COALESCE(sum(total), 0) as total_seat,COALESCE(sum(available), 0) as total_available from rooms where hostel = ?', ['girls']);
        return view('femaleHostel',['girls'=>$girls]);
        
    }

    public function apply(Request $request)
    {
       $hostel=$request->hostel;
       
     
       return view('application',['hostel'=>$hostel]);

    }
    public function insertApplication(Request $request){
        //unique email
        $request->validate([
            'email' => 'required|unique:applications|max:255',
            'student_id'=> 'required|unique:applications|max:255',
        ]);
        //unique student_id
        //unique seat_id
        $application=new Application;
        $application->hostel=$request->hostel;
        $admin=User::where('type', $request->hostel)->first();
        $application->name=$request->name;
        $application->student_id=$request->student_id;
        $application->department=$request->department;
        $application->batch=$request->batch;
        $application->semester=$request->semester;
        $application->email=$request->email;
        $application->phone=$request->phone;
        $application->father=$request->father;
        $application->mother=$request->mother;
        $application->address=$request->address;
        $application->guardian=$request->guardian;
        $application->room_id=2;

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $application->image=$imageName;    
        $application->status=0;
        $application->save();

        $name=$admin->name;
        $email=$admin->email;
        $data=array("name"=>$name,"body"=>"New Application from ".$request->name);
        Mail::send('mail',$data,function($message) use ($name,$email){
            $message->to($email)
             ->subject('New Hostel Booking');
        });
        return redirect('/apply?msg=Your application has been submitted successfully');
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
    public function notice(){
        $notices=Notice::all();
        return view('notice',['notices'=>$notices]);
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
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show(hostel $hostel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit(hostel $hostel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hostel $hostel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy(hostel $hostel)
    {
        //
    }
}
