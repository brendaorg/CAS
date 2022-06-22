@extends('layouts.base')
@section('content')


</style>
<script type="text/javascript"  src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

<div class="post d-flex flex-column-fluid" id="kt_post">
     <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Timetable</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>

    
     <div class="flex-lg-row-fluid ms-lg-10">
        <div class="card card-flush mb-6 mb-xl-9">

        <div class="card-header pt-5">
        <div class="card-toolbar">
        <form class="form w-400" novalidate="novalidate" method="POST" action="/editcoursesTimetable">
        @csrf
      
        <div class="fv-row mb-10">
            <div class="d-flex flex-stack mb-2">
               <input type="datetime-local" class="form-control form-control-lg form-control-solid date" 
                  value="<?= $timein ?>"  name="timein" />
            </div>
         </div>

            <div class="text-center">
                <input type="hidden" value="<?= $timetable_id ?>" name="timetable_id"/>
                <button  type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-info w-20 mb-5">
                    Submit
                </button>
            </div>
            </form>

            </div>
        </div>
    </div>
</div>




</div>



@endsection
