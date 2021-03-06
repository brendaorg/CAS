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
                    <div class="col-md-6 pe-lg-10">
                        <!--begin::Form-->
                        <form action="/createPrograms" class="form mb-15" method="post" id="kt_contact_form">
                            @csrf

                            <h1 class="fw-bolder text-dark mb-9">Create Programs</h1>
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">Program Name</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="program_name" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">Program Code</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="" name="program_code" />
                                </div>
                            </div>
                          
                            <div class="row mb-5">
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">Program Period</label>
                                    <input type="number" min="1" max="6" class="form-control form-control-solid" placeholder="eg 4 YEARS" name="program_time" />
                                </div>
                                <div class="col-md-6 fv-row">
                                    <label class="fs-5 fw-bold mb-2">Program Type</label>
                                    <input type="text" class="form-control form-control-solid" placeholder="eg Diploma/Degree" name="program_type" />
                                </div>
                            </div>
                          
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
