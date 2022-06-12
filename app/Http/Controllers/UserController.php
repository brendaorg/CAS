<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;


class UserController extends Controller {
    
	public function __construct() {
        //$this->middleware('auth');
    }

	public function loginform(){
		return view('auth/login');
	}

	public function users(){
		$this->data['users'] = \App\Models\User::whereIn('usertype',array('Admin','Lecturer'))->where('status',1)->get();
		return view('layouts/users',$this->data);
	}

	public function students(){
	    $data['users'] = \App\Models\User::join('programs', 'programs.id', '=', 'users.program_id')
		->where('users.status','=','1')->where('users.usertype','=','Student')->select('users.*','programs.id as program_id')
		->paginate(10);
		return view('layouts/students',$data);
	}

	public function registerStudent(){
		$this->data['programs'] = \App\Models\Program::all();
		return view('auth/register',$this->data);
	}

	public function userRules(){
		$data = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' =>  'required|email|string|unique:users,email',
			'program_id' => 'required|integer|exists:programs,id',
			'registration_number' => 'required|string|unique:users',
			'gender' => 'required|string',
			'password' => 'required|confirmed|min:8'
		]);
		
		return $data;
	}

	

	public function createStudent(){
	     $data = $this->userRules();
	     $cas_id = $this->generateNumber();
         
		$user = \App\Models\User::create([
            'first_name'  => $data['first_name'],
            'middle_name' => $data['middle_name'] ?? '',
            'last_name'   => $data['last_name'],
            'email'       => $data['email'],
			'usertype'    => 'Student',
            'gender'      => $data['gender'],
            'program_id'  => $data['program_id'],
			'status'      => 1,
            'registration_number' => $data['registration_number'],
            'password'    => bcrypt($data['password']),
            'cas_id'      => $cas_id
        ]);
        return redirect('/')->with('success', 'User ' .  $data['first_name'] . ' created successfully');
	}

	private function generateNumber()
	{
        $cas_id = \collect(\DB::select("select max(cas_id) as max_cas from users  where usertype = 'Student' "))->first();
        return (int)$cas_id->max_cas + 1;
	}


	public function registerStaff()
	{
		$data = request()->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' =>  'required|email|string|unique:users,email',
			'gender' => 'required|string',
			'password' => ['required',Rules\Password::min(8)->mixedCase()->numbers()->symbols()]
		]);

		$user = \App\Models\User::create([
            'first_name'  => $data['first_name'],
            'last_name'   => $data['last_name'],
            'email'       => $data['email'],
			'usertype'    => 'Lecturer',
            'gender'      => $data['gender'],
			'program_id'  => 0,
			'status'      => 1,
            'registration_number' => 0002,
            'password'    => bcrypt($data['password'])
        ]);

        return redirect('users/staffs')->with('success',' created successfully');

	}



	public function login(){
         $credentials = request()->validate([
            'email'    =>  'required|email|string|exists:users,email',
            'password' =>  'required'
          ]);

          if(!\Auth::attempt($credentials)){
              return response(['error' => 'The provided credentials are not correct'],422);
           }

        return redirect('dashboard/home')->with('success', 'Successfully');
	}


	public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

    

	public function resetPassword(Request $request){
	
		$user = \App\Models\User::find(\Auth::user()->id);
        if (\Auth::attempt(['email' => $user->email, 'password' => request('Oldpassword')])) {
            $new1 = request('newpassword');
            $new2 = request('confirm_password');
            if ($new1 != $new2) {
                return redirect()->back()->with('error', 'New password and confirmed one  do not match');
            }
            $this->validate(request(), [
                'newpassword' => 'required|string|min:6'
                    ], ['Password must be 6–30 characters, and include a number, a symbol, a lower and a upper case letter']);
            $user->update(['password' => bcrypt($new1)]);
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Current Password is not valid');
        }
        return redirect()->back()->with('success', 'Password Updated successfully');

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
	


	 public function studentCourses()
    {
          request()->validate([
            'allcourse_ids' => 'required',
            'student_id'=>'required',
        ]);

		$allcourses = request('allcourse_ids');
		$student_id = request('student_id');

        foreach($allcourses as $key => $value){
        	$array_data = array('student_id'=> (int) $student_id,'course_id'=> (int) $value);
            $data = \DB::table('student_courses')->where($array_data)->first();
		
			if(empty($data)){
               \DB::table('student_courses')->insert($array_data);
			}
        }
        return redirect()->back()->with('success', 'Updated successfully');

    }


	public function userProfile(){
		$data['stdprofile'] = \DB::table('users')->leftJoin('programs','programs.id','=','users.program_id')->select('users.*','programs.program_name')->where('users.id',\Auth::user()->id)->first();
		return view('layouts/profile',$data);
	}
}