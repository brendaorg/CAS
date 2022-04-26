<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;

class UserController extends Controller {
    
	public function __construct() {
        //$this->middleware('auth');
    }

	public function loginform(){
		return view('auth/login');
	}

	public function users(){
		return view('layouts/users');
	}

	public function students(){
		return view('layouts/students');
	}

	public function registerStudent(){
		return view('auth/register');
	}

	public function userRules(){
		$data = request()->validate([
            'first_name' => 'required|string',
			'middle_name'=>'string',
            'last_name' => 'required|string',
            'email' =>  'required|email|string|unique:users,email',
			'program_id' => 'required|integer|exists:programs,id',
			'registration_number' => 'required|string|unique:users',
			'gender' => 'required|string',
			'password' => ['required','confirmed',Rules\Password::min(8)->mixedCase()->numbers()->symbols()]
		]);
		return $data;
	}

	public function register(){
	    $data = $this->userRules();
		$user = \App\Models\User::create([
            'first_name'  => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name'   => $data['last_name'],
            'email'       => $data['email'],
			'usertype'    => 'Student',
            'gender'      => $data['gender'],
            'program_id'  => $data['program_id'],
			'status'      => 1,
            'registration_number' => $data['registration_number'],
            'password'    => bcrypt($data['password'])
        ]);

		// $this->sendEmailAndSms($request);
        return redirect('users/index')->with('success', 'User ' .  $data['first_name'] . ' created successfully');
	}



	public function login(){
         $credentials = request()->validate([
            'email'    =>  'required|email|string|exists:users,email',
            'password' =>  'required'
          ]);

         if(!Auth::attempt($credentials)){
              return response(['error' => 'The provided credentials are not correct'],422);
           }

        return redirect('users/index')->with('success', 'User ' .  $data['first_name'] . ' created successfully');
	}


	public function resetPassword(){
		$id = request('user_id');
        $pass = 'cas_' . rand(32323, 443434344) . '';
        $user = \App\Models\User::find($id);
        $user->update(['password' => bcrypt($pass)]);
        $content = 'Hello ' . $user->name() . ' Your password has been updated. Kindly login  with email ' . $user->email . ' and password ' . $pass;
        $this->sendEmail($user, $content);
        return redirect()->back()->with('success', 'Password sent successfully');
	}
   

	public function editUser(){
		$user_id = request('user_id');
		$user = \App\Models\User::where('id',(int) $user_id)->first();
	    $data = $this->userRules();
        
		if ($user !== null) {
			\App\Models\User::where('id',(int)$user_id)->update($data);
        } else{
			$user = new \App\Models\User();
		}
	}
	
}