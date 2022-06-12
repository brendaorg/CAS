@extends('layouts.base')
@section('content')

<div id="kt_content_container" class="container-xxl">

<div class="toolbar" id="kt_toolbar">
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">My profile</h1>
        <span class="h-20px border-gray-200 border-start mx-4"></span>
    </div>
</div>
</div>

    <form action="/resetPassword" method="post">
        @csrf
        <div class="card mb-7">
            <div class="card-body">
  
                   <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Update password</h3>
                            </div>
                        </div>


                      <div class="row mb-5">
                        <div class="col-md-4 fv-row">
                            <input type="password" class="form-control form-control-solid" placeholder="Old password" name="Oldpassword" required/>
                        </div>
                        <div class="col-md-4 fv-row">
                            <input type="password" class="form-control form-control-solid" placeholder="New Password" name="newpassword" required/>
                        </div>

                        <div class="col-md-4 fv-row">
                            <input type="password" class="form-control form-control-solid" placeholder="Confirm password" name="confirm_password" required/>
                        </div>
                       </div>


                     
                     <div class="d-flex align-items-center mb-10" >
                          <button type="submit" class="btn btn-primary me-5">update </button>
                    </div>
             
                </div>
               </div>
            </form>
        </div>



          <div class="post d-flex flex-column-fluid" id="kt_post">
             <div id="kt_content_container" class="container-xxl">
                  <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <!--begin::Card header-->
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Profile Details</h3>
                            </div>
                        </div>

                        <div class="card-body p-9">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Full Name</label>
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800"><?= \Auth::user()->name() ?></span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Role</label>
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800"><?= \Auth::user()->usertype?></span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Email</label>
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800"><?= \Auth::user()->email?></span>
                            </div>
                        </div>

                     <?php if(\Auth::user()->usertype=='Student') { ?>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-bold text-muted">Program </label>
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800"><?= $stdprofile->program_name ?? ''?></span>
                            </div>
                        </div>
                      <?php } ?>

                        </div>
                        
                    </div>
                 </div>
            </div>


                              


@endsection
