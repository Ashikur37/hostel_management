<?php

namespace App\Http\Controllers;

use App\hostel;
use App\Room;
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
       $rooms=Room::where('hostel', '=', $hostel)->get();
     
       return view('application',['rooms'=>$rooms]);

    }
    public function insertApplication(Request $request){
        $application=new Application;
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

        $application->status=0;
        $application->save();
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
