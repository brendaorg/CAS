@extends('layouts.base')
@section('content')

<div id="kt_content_container" class="container-xxl">

     <div class="toolbar" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Search Attendance</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>


    <form action="/searchattendance" method="post">
        @csrf
        <div class="card mb-7">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="position-relative w-md-400px me-md-2">
                        <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                       <input type="date" class="form-control form-control-solid ps-10" name="search_date" 
                              value="<?= old('search_date') ?>"  required />

                      <input type="hidden"  name="course_id" value="<?= $course_id ?>" />
                    </div>
                    <!--end::Input group-->
                    <!--begin:Action-->
                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn btn-primary me-5">Search </button>
                    </div>
                    <!--end:Action-->
                </div>
             
                </div>
               </div>
            </form>
        </div>



    @if(isset($attendances))
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Card-->
                <div class="card">

                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">#</th>
                                    <th class="min-w-125px">Full name</th>
                                    <th class="min-w-125px">Registration number</th>
                                    <th class="min-w-125px">Program</th>
                                    <th class="min-w-125px">email</th>
                                    <th class="min-w-125px">Time in</th>
                             </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600">

                                   @foreach($attendances as $index => $attendance)

                                    <tr>
                                        <td><?= $index +1 ?></td>
                                        <td>
                                            <a href="#" class="text-hover-primary text-gray-600"><?= $attendance->first_name .' '. $attendance->last_name?></a>
                                        </td>
                                           <td>
                                            <?= $attendance->registration_number ?>                              </td>
                                        <td>
                                            <span class="badge badge-light-info fs-7 fw-bolder"><?= $attendance->program_name ?? '' ?></span>
                                        </td>
                                        <td> <?= $attendance->email ?></td>
                                        <td> <?= $attendance->timein ?? '' ?></td>
                                     </tr>
                                   @endforeach
                                                                       
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
               </div>
            </div>
       @endif

@endsection
