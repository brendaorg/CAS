@extends('auth.base')
@section('content')
<h1>CLASS ATTENDANCE SYSTEM</h1>
<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
        <!--begin::Heading-->
        <div class="text-center mb-10">
            <!--begin::Title-->
              <a href="#" class="mb-18">
				 <img alt="Logo" src="assets/media/logos/bg-1.png" class="h-150px " />
			 </a>
            <!--end::Title-->
            <!--begin::Link-->

            <!--end::Link-->
        </div>

        <div class="fv-row mb-10">
            <!--begin::Label-->
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email" autocomplete="off" />
            <!-- </div> -->
            <!--end::Label-->
            <!--end::Input-->
        </div>
        <!--end::Input group-->
        <!--begin::Input group-->
        <div class="fv-row mb-10">
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" autocomplete="off" />

            </div>
              <a href="../../demo1/dist/authentication/layouts/basic/password-reset.html" class="link-success fs-6 fw-bolder">Forgot Password ?</a>
        </div>
        <div class="text-center">
            <!--begin::Submit button-->
            <a  href={{ url('/dashboard/home') }} type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-success w-100 mb-5">
                <span class="indicator-label">Sign in</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </a>
  <div class="text-gray-400 fw-bold fs-4">New Here?
            <a href="{{ url('/register')}}" class="link-success fw-bolder">Register</a></div>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
