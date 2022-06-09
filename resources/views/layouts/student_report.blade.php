@extends('layouts.base')
@section('content')

<div id="kt_content_container" class="container-xxl">

<div class="toolbar" id="kt_toolbar">
<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
    <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">My report</h1>
        <span class="h-20px border-gray-200 border-start mx-4"></span>
    </div>
</div>
</div>


    <form action="/searchCourse" method="post">
        @csrf
        <div class="card mb-7">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2 row">
                       
                        <select name="course_id" id="" class="form-control form-control-solid ps-10">
                          @if(!empty($courses->get()))
                            @foreach($courses->get() as $value)
                              <option value="<?= $value->id ?>"><?= $value->course_name ?></option>
                            @endforeach
                          @endif
                        </select>

                        <br>
                        <br>
                        <div class="d-flex align-items-center">
                           <button type="submit" class="btn btn-primary me-5">Search </button>
                       </div>
                    </div>
  
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
                            <label class="col-lg-4 fw-bold text-muted">Courses </label>
                            <div class="col-lg-8">
                                <span class="fw-bolder fs-6 text-gray-800"><?= \Auth::user()->name() ?></span>
                            </div>
                        </div>

                        </div>
                        
                    </div>
                 </div>
            </div>


                              


@endsection
