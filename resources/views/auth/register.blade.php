@extends('auth.base')
@section('content')

<<<<<<< HEAD
<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
        <!--begin::Heading-->
        <div class="mb-10 text-center">
            <!--begin::Title-->
            <h1 class="fw-bolder ">CLASS ATTENDANCE SYSTEM</h1>
=======
<h1>CLASS ATTENDANCE SYSTEM</h1>
<div class="w-lg-900px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
 

    <form class="form w-160" novalidate="novalidate" action="/createstudent" method="POST">
        @csrf
        
        <div class="mb-10 text-center">
>>>>>>> f3699a74665794fb05f67fa0846b18b4e5a86922
              <a href="#" class="mb-18">
				 <img alt="Logo" src="assets/media/logos/bg-1.png" class="h-150px " />
			 </a>
<<<<<<< HEAD
            <h1 class="fw-normal mb-3 fs-12">Create an Account</h1>
=======
            <h1 class="text-dark mb-3">Create an Account(Students)</h1>
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
            <a href="{{ url('/')}}" class="link-primary fw-bolder">Sign in here</a></div>
        </div>
>>>>>>> f3699a74665794fb05f67fa0846b18b4e5a86922


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

<<<<<<< HEAD
        <div class="mb-10 fv-row" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Label-->
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Hint-->
            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
            <!--end::Hint-->
        </div>
        <!--end::Input group=-->
        <!--begin::Input group-->
        <div class="fv-row mb-5">
            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm Password" name="confirm-password" autocomplete="off" />
        </div>

        <div class="text-center">
            <a href={{ url('/dashboard/home') }} type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-success">
=======
        
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
           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm Password" required name="password" />
            @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
       </div>
     </div>

        <div class="text-center">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
>>>>>>> f3699a74665794fb05f67fa0846b18b4e5a86922
                <span class="indicator-label">Submit</span>
            </button>
        </div>
         <div class="text-gray-400 fw-bold fs-4">Already have an account?
            <a href="{{ url('/')}}" class="link-success fw-bolder">Sign in here</a></div>
            <!--end::Link-->
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
