@extends('layouts.base')
@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Toolbar-->
    <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">My Courses List</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                           
                        <a href="#" class="btn btn-primary er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Add courses</a>

                        </div>
                    </div>
                
                </div>
                <div class="card-body pt-0">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                    <!--begin::Table row-->
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">#</th>
                        <th class="min-w-125px">Course name</th>
                        <th class="min-w-125px">Course code</th>
                        <th class="min-w-125px">Duration</th>
                        <th class="min-w-125px">Venue</th>
                 </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">

                       @foreach($courses as $index => $course)

                        <tr>
                            <td><?= $index +1 ?></td>
                            <td>
                                <a href="#" class="text-hover-primary text-gray-600"><?= $course->course_name ?></a>
                            </td>
                            <td>
                                <span class="badge badge-light-success fs-7 fw-bolder"><?= $course->course_code ?></span>
                            </td>
                            <td> <?= $course->periodic_time ?> </td>
                            <td><?= $course->venue_name ?? '' ?></td>

                             

                             </tr>
                         @endforeach
                   </tbody>
            </table>
         {!! $courses->render() !!}
                </div>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content rounded">
        <div class="modal-header pb-0 border-0 justify-content-end">
            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                <span class="svg-icon svg-icon-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                    </svg>
                </span>
            </div>
        </div>
        
        <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
            <form id="kt_modal_new_target_form" class="form" action="/pickcourse" method="POST">
                 @csrf
                
                <div class="mb-15">
                    
                        <div class="d-flex flex-column flex-stacked ">
                            
                            <label class="form-check  form-check-solid me-10 form-group">
                            <?php
                                if (!empty($allcourses)) {
                                foreach ($allcourses as $allcourse) {
                                ?>
                                <ul>
                                <input type="checkbox" class="form-check-input h-20px w-20px" id="features<?= $allcourse->id ?>" value="{{$allcourse->id}}"  name="allcourse_ids[]">
                                <span class="form-check-label fw-bold"><?php echo $allcourse->course_name; ?></span>  
                                </ul>
                                &nbsp;
                                 <?php
                                } }
                                ?>
                            </label>

                        </div>
                    </div>
               

                <div class="text-center">
                    <input type="hidden" value="<?= $student_id ?>" name="student_id" />
                    <button type="submit" id="kt_modal_new_target_submit" class="btn btn-primary">
                        <span class="indicator-labeli">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


@endsection