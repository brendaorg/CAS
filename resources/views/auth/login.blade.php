@extends('auth.base')
@section('content')

<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" method="POST" action="/login">
        @csrf

        <div class="text-center mb-10">

            <!--begin::Title-->
            <h1>CLASS ATTENDANCE SYSTEM</h1>

              <a href="#" class="mb-18">
				 <img alt="Logo" src="assets/media/logos/bg-1.png" class="h-150px " />
			 </a>
        </div>

        <div class="fv-row mb-10">
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email" autocomplete="off" required/>
             @if ($errors->has('email'))
                 <span class="text-danger">{{ $errors->first('email') }}</span>
             @endif
        </div>

        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" required/>
            </div>
            @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password') }}</span>
             @endif
             
              <a href="../../demo1/dist/authentication/layouts/basic/password-reset.html" class="link-success fs-6 fw-bolder">Forgot Password ?</a>
        </div>
        <div class="text-center">
            <button  type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-success w-100 mb-5">
                Sign in
            </button>
            <div class="text-gray-400 fw-bold fs-4">New Here?
            <a href="{{ url('/register')}}" class="link-success fw-bolder">Register</a></div>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
