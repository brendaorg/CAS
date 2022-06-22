@extends('layouts.base')
@section('content')


<div class="post d-flex flex-column-fluid" id="kt_post">
     <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Course Timetable</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>

    
     <div class="flex-lg-row-fluid ms-lg-10">
         <div class="card mb-5 mb-lg-10">
                                    <!--begin::Card header-->
                                    <div class="card-header">
                                        <!--begin::Heading-->
                                        <div class="card-title">
                                            <h3>Class Sessions for   <?= $name ?></h3>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                                                    <tr>
                                                        <th class="min-w-250px">Location</th>
                                                        <th class="min-w-100px">Date</th>
                                                        <th class="min-w-150px">Time(Hours)</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Thead-->
                                                <!--begin::Tbody-->
                                                <tbody class="fw-6 fw-bold text-gray-600">
                                                   @foreach($courses as $key => $value)
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="text-hover-primary text-gray-600">
                                                              <?= $value->venue_name ?>
                                                           </a>
                                                        </td>
                                                         <td><?= date('d-m-Y', strtotime($value->date)) ?> </td>
                                                        <td> <?= $value->periodic_time?></td>
                                                    </tr>
                                                    @endforeach
                                              </tbody>
                                                <!--end::Tbody-->
                                            </table>
                                            <!--end::Table-->
                                        </div>
                                        <!--end::Table wrapper-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
   </div>


                              



</div>

@endsection
