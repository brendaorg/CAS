@extends('auth.base')
@section('content')
<h1>CLASS ATTENDANCE SYSTEM</h1>
<div class="w-lg-900px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form class="form w-160" novalidate="novalidate" action="/createstudent" method="POST">
        @csrf
        
        <div class="mb-10 text-center">
            <!--begin::Title-->
              <a href="#" class="mb-18">
				 <img alt="Logo" src="assets/media/logos/bg-1.png" class="h-100px " />
			 </a>
            <h1 class="text-dark mb-3">Create an Account(Students)</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
            <a href="{{ url('/')}}" class="link-primary fw-bolder">Sign in here</a></div>
            <!--end::Link-->
        </div>


        <div class="row fv-row mb-7">
            <div class="col-xl-4">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="First Name" name="first_name"  required/>
            </div>
            <div class="col-xl-4">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Middle Name (Option)" name="middle_name"  />
            </div>
            <div class="col-xl-4">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Last Name" name="last_name"  required/>
            </div>
            <!--end::Col-->
        </div>

        <div class="row fv-row mb-7">
             <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email"  />
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
       </div>
      </div>

      <div class="row fv-row mb-7">
        <div class="col-xl-6">
           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password"  required/>
       </div>
       <div class="col-xl-6">
           <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Confirm Password" required name="password" />
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
