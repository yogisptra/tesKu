<?php

namespace App\Http\Controllers\Akses;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\VerifyAkses;
use App\Mail\VerifyMail;
use Auth;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register');
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
        $user = $request->all();
        $request->validate([
        'name'=>'required',
        'email'=>'required',
        'password'=>'required',
        ]);
        $user['password'] = bcrypt($request->password);
        $users = User::create($user);
          $VerifyAkses = VerifyAkses::create([
            'user_id' => $users->id,
            'token' => sha1(time())
          ]);
          \Mail::to($users->email)->send(new VerifyMail($users));
          return back();
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Login
    public function login()
    {
        return view('login');
    }

    public function postlogin(Request $request)
    {
        $request->validate([
          'email' => 'email|required',
          'password' => 'required'
        ]); 


        // Attempt to log the user in

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])) 
        {
        $user = auth()->user();
        // if successful, then redirect to their intended location
        return redirect('/admin/')-> with('success','Logged in successfully');;
        } else {
            return back();
        }
          
    }   

    public function logout()
    {
        Auth::logout();
        return redirect('/akses/login');
    }
    // Verify
    public function verifyUser($token)
    {
      $verifyUser = VerifyAkses::where('token', $token)->first();
      if(isset($verifyUser) ){
        $user = $verifyUser->user;
        if(!$user->verified) {
          $verifyUser->user->verified = 1;
          $verifyUser->user->save();
          $status = "Your e-mail is verified. You can now login.";
        } else {
          $status = "Your e-mail is already verified. You can now login.";
        }
      } else {
        return redirect('akses/login')->with('warning', "Sorry your email cannot be identified.");
      }
      return redirect('akses/login')->with('status', $status);
    }
}
