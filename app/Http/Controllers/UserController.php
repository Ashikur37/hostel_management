<?php

namespace App\Http\Controllers;

use App\User;
use App\student;
use App\currentUser;
use App\StudentData;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoapClient;

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
    public function logout(Request $request){
    $request->session()->flush();
    return redirect('/');
    }
public function checkNumber(){
       $data= StudentData::where('phone','=',request()->number)->first();
       if($data){
           $r=rand(1000,9999);

           try{
            $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
            $paramArray = array(
            'userName' => "01825314306",
            'userPassword' => "2978d85534",
            'mobileNumber' => "01736937161",
            'smsText' => "This is a SMS",
            'type' => "TEXT",
            'maskName' => '',
            'campaignName' => '',
            );
            $value = $soapClient->__call("OneToOne", array($paramArray));
            echo $value->OneToOneResult;
           } catch (Exception $e) {
            echo $e->getMessage();
           }
           
           return $r;
       }
       else{
           return "not";
       }
    }
 public function signin(Request $request){

    $user=User::where('email', '=', $request->email)->where('password', '=', $request->password)->first();
    $cu=currentUser::all()->first();

    if(!$user){
        return redirect('/login?msg=Invalid email or password');
    }
    Auth::loginUsingId($user->id);
  if($user->type==0){
        return redirect('/login?msg=Your account is under approval');
    }
    else if($user->type===1){
        $cu->current_student=$user->id;
        $cu->save();
        return redirect('/student');
    }
    else if($user->type==2){
        return redirect('/accountant');
    }
    else if($user->type===5||$user->type==6||$user->type==7||$user->type==8){
        
        Auth::loginUsingId($user->id);
   
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

/*
bujtasina amar pc te kaj kortesilo . give me 20 min time i'll comeback with solution
*/
