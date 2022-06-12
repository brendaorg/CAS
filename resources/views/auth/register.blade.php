@extends('auth.base')
@section('content')

<div class="w-lg-900px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
<h1 class="text-center">CLASS ATTENDANCE SYSTEM</h1>
   

    <form class="form w-160" novalidate="novalidate" action="/createstudent" method="POST">
        @csrf
        
        <div class="mb-10 text-center">
              <a href="#" class="mb-18">
				 <img alt="Logo" src="assets/media/logos/bg-1.png" class="h-100px " />
			 </a>
            <h1 class="text-dark mb-3">Create an Account(Students)</h1>
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
            <a href="{{ url('/')}}" class="link-primary fw-bolder">Sign in here</a></div>
        </div>


        <div class="row fv-row mb-7">
            <div class="col-xl-4">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="First Name" name="first_name"  required/>
                 @if ($errors->has('first_name'))
                 <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>
            <div class="col-xl-4">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Middle Name (Option)" name="middle_name"  />
            </div>
            <div class="col-xl-4">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Last Name" name="last_name"  required/>
                  @if ($errors->has('last_name'))
                 <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <!--end::Col-->
        </div>

        <div class="row fv-row mb-7">
             <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email"  />
                  @if ($errors->has('email'))
                 <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="col-xl-6">
                    <select name="gender" class="form-control form-control-lg form-control-solid" required>
                        <option value="0">Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
              </div>
          </div>

        
       <div class="row fv-row mb-7">
        <div class="col-xl-6">
            <select name="program_id" class="form-control form-control-lg form-control-solid" required>
                <option value="0">Choose Program</option>
               <?php if(isset($programs)) {
                  foreach ($programs as $program) { ?>
                <option value="<?= $program->id ?>"><?= $program->program_name ?></option>
                <?php }
                 } ?>
            </select>
       </div>
       <div class="col-xl-6">
           <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Registration number" name="registration_number"  required/>
             @if ($errors->has('registration_number'))
                 <span class="text-danger">{{ $errors->first('registration_number') }}</span>
            @endif
       </div>
      </div>

      <div class="row fv-row mb-7">
        <div class="col-xl-6">
           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password"  required/>
           @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
       </div>
       <div class="col-xl-6">
           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm Password" 
           @error('password') is-invalid @enderror required name="password_confirmation" />
          
       </div>
     </div>

        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Submit</span>
            </button>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
