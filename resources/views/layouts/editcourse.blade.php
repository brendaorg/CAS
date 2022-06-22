@extends('layouts.base')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Contact-->
        <div class="card">
            <!--begin::Body-->
            <div class="card-body p-lg-17">
                <!--begin::Row-->
                <div class="row mb-3">
                    <!--begin::Col-->
                    <div class="col-md-12 pe-lg-10">
                        <!--begin::Form-->
                        <form action="/edit_courses" class="form mb-15" method="post" id="kt_contact_form">
                            @csrf

                        <h1 class="fw-bolder text-dark mb-9">Courses</h1>
                        <div class="row mb-5">
                            <div class="col-md-3 fv-row">
                                <label class="fs-5 fw-bold mb-2">Course Name</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="course_name"  value="<?= $course->course_name ?>" />
                                @if ($errors->has('course_name'))
                                    <span class="text-danger">{{ $errors->first('course_name') }}</span>
                                @endif

                            </div>
                            <div class="col-md-3 fv-row">
                                <label class="fs-5 fw-bold mb-2">Course Code</label>
                                <input type="text" class="form-control form-control-solid" placeholder="" name="course_code" 
                                value="<?= $course->course_code ?>"/>
                                 @if ($errors->has('course_code'))
                                    <span class="text-danger">{{ $errors->first('course_code') }}</span>
                                @endif
                            </div>
                      
                            <div class="col-md-3 fv-row">
                                <label class="fs-5 fw-bold mb-2">periodic time</label>
                                <input type="number" min="1" max="6" class="form-control form-control-solid" placeholder="eg 2 hours" name="periodic_time" value="<?= $course->periodic_time ?>"/>
                                 @if ($errors->has('periodic_time'))
                                    <span class="text-danger">{{ $errors->first('periodic_time') }}</span>
                                @endif
                            </div>

                            <div class="col-md-3 fv-row">
                                <label class="fs-5 fw-bold mb-2">Venue name (Option)</label>
                                <input type="text" class="form-control form-control-solid" placeholder=""value="<?= $course->venue_name ?>" name="venue_name" />
                               
                            </div>
                            </div>
                            <input type="hidden" value="<?= $course->id ?>" name="course_id" />
                         
                           <button type="submit" class="btn btn-info" id="kt_contact_submit_button">
                            Submit
                          </button>
                        </form>
                    </div>
                   
                </div>
              
              
            </div>
        </div>
    </div>
</div>

@endsection
