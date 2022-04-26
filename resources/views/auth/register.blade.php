@extends('auth.base')
@section('content')
<h1>CLASS ATTENDANCE SYSTEM</h1>
<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
        <!--begin::Heading-->
        <div class="mb-10 text-center">
            <!--begin::Title-->
              <a href="#" class="mb-18">
				 <img alt="Logo" src="assets/media/logos/bg-1.png" class="h-100px " />
			 </a>
            <h1 class="text-dark mb-3">Create an Account</h1>
            <!--end::Title-->
            <!--begin::Link-->
            <div class="text-gray-400 fw-bold fs-4">Already have an account?
            <a href="{{ url('/')}}" class="link-primary fw-bolder">Sign in here</a></div>
            <!--end::Link-->
        </div>


        <div class="row fv-row mb-7">
            <!--begin::Col-->
            <div class="col-xl-6">

                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="First Name" name="first-name" autocomplete="off" />
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-6">
                <input class="form-control form-control-lg form-control-solid" type="text" placeholder="Last Name" name="last-name" autocomplete="off" />
            </div>
            <!--end::Col-->
        </div>

        <div class="row fv-row mb-7">
             <div class="col-xl-6">
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email" name="email" autocomplete="off" />
            </div>
        <div class="col-xl-6">
        <!-- <div class="fv-row mb-7"> -->
            <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Program" name="email" autocomplete="off" />
        </div>
        </div>

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
            <a href={{ url('/dashboard/home') }} type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </a>
        </div>
    </form>
    <!--end::Form-->
</div>

@endsection
