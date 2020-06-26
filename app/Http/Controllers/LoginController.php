<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;

use DB;

class LoginController extends Controller
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

    public function logout(Request $request)
    {
        $request->session()->forget('info');
        echo $request->session()->get('info');
        return redirect('/');
    }

    public function login(Request $request)
    {
      // $login=new Login;
      // $login->FullName=$request->email;
      // $login->Email=$request->password;
      // $login=Login::where('Email','$request->email')->where('Password','$request->password')->get();
      // echo $login=DB::select('select * from logins where Email=? && Password=?',[$request->email,$request->password]);
      $email=$request->email;
      $pass=$request->password;
      echo gettype($email);
      $login=DB::table('logins')->where('Email',$email)->where('Password',$pass)->first();
      $request->session()->put('info',$login->ID);
      $UserId=$request->session()->get('info');
      if($login){
        // echo $login->Email;
        // echo $login->Password;

        // print_r($info);
        return view('dashboard',compact('UserId'));
        // dd($login);
        // echo $login->Email;
      }else{
        echo "Serious Error!!!";
      }

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

    public function change(Request $request)
    {
        //
        $UserId=$request->session()->get('info');
        return view('change-password',compact('UserId'));
    }

    public function updatepassword(Request $request)
    {
        //

        $UserId=$request->session()->get('info');
        $login=DB::table('logins')->where('ID',$UserId)->where('Password',$request->currentpassword)->first();
        if($login){
          $input=array();
          // $login=DB::table('logins')->where('ID',$UserId)->first();
          // $login['FullName']=$request->fullname;
          // $login['Email']=$request->email;
          // $input['MobileNumber']=$request->contactnumber;
          $input['Password']=$request->newpassword;

          $success=DB::table('logins')->where('ID',$UserId)->update($input);
          if($success){
            // echo "Entered!!!";
            // return view('/user-profile');
            // return redirect()->route('user');
            return view('add-expense',compact('UserId'));
          }else{
            // return view('register',['msg'=>'Something Went Wrong. Please try again']);
            echo "ERROR!!! To Change Password";
          }
        }else{
            echo "CuREnt!!! To Change Password ERROR";
        }


        return view('change-password');
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
        $login=new Login;
        $login->FullName=$request->name;
        $login->Email=$request->email;
        $login->MobileNumber=$request->mobilenumber;
        $login->Password=$request->password;
        if($login->save()){
          return view('register',['msg'=>'You have successfully registered']);
        }else{
          return view('register',['msg'=>'Something Went Wrong. Please try again']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function edit(Login $login,Request $request)
    {
        //
        $UserId=$request->session()->get('info');
        // echo $UserId;
        $user=DB::table('logins')->where('Id',$UserId)->first();
        return view('user-profile',compact('user','UserId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Login $login)
    {
        //
        $UserId=$request->session()->get('info');
        $login=array();
        // $login=DB::table('logins')->where('ID',$UserId)->first();
        $login['FullName']=$request->fullname;
        // $login['Email']=$request->email;
        $login['MobileNumber']=$request->contactnumber;
        // $login['Password']=$request->regdate;

        $success=DB::table('logins')->where('ID',$UserId)->update($login);
        // $login=Login::where('Id',$UserId)->first();
        // $login->FullName=$request->fullname;
        // $login->Email=$request->email;
        // $login->MobileNumber=$request->contactnumber;
        // $login->Password=$request->regdate;
        // print_r($login);
        // dd();
        if($success){
          // echo "Entered!!!";
          // return view('/user-profile');
          return redirect()->route('user');
        }else{
          // return view('register',['msg'=>'Something Went Wrong. Please try again']);
          echo "ERROR!!!";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Login  $login
     * @return \Illuminate\Http\Response
     */
    public function destroy(Login $login)
    {
        //
    }
}
