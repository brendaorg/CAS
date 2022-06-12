@extends('layouts.base')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">

     <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Set Course timetable</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>

    

     <div class="flex-lg-row-fluid ms-lg-10">
                                        <!--begin::Card-->
                    <div class="card card-flush mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header pt-5">
                            <!--begin::Card title-->
                            <div class="card-title">
                             <a href="/createTimetable" class="btn btn-sm btn-primary my-1">Create timetable</a>

                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1" data-kt-view-roles-table-toolbar="base">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-roles-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Users" />
                                </div>
                                <!--end::Search-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-view-roles-table-toolbar="selected">
                                    <div class="fw-bolder me-5">
                                    <span class="me-2" data-kt-view-roles-table-select="selected_count"></span>Selected</div>
                                    <button type="button" class="btn btn-danger" data-kt-view-roles-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_roles_view_table">
                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">ID</th>
                                        <th class="min-w-150px">Course Name</th>
                                        <th class="min-w-125px">Course Code</th>
                                        <th class="min-w-125px">Number of Classes</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="fw-bold text-gray-600">
                                  @foreach($courses as $index => $course)

                                    <tr>
                                        <td>
                                            <?= $index +1 ?>.                                       
                                        </td>
                                        <td><?= $course->course_name ?></td>
                                        <td><?= $course->course_code ?></td>
                                        <td><?php
                                         $course_count = \DB::table('course_timetable')->where('course_id',$course->id)->count();

                                        echo $course_count; ?></td>

                                         <td class="text-end min-w-100px">
                                            <?php $edit_url = "timetable/edit/$course->id"; 
                                                $show_url = "timetable/show/$course->id"; ?>
                                            <a href="<?= url($edit_url) ?>" class="menu-link px-3 btn btn-primary" data-kt-users-table-filter="delete_row">Edit</a>
                                        <a href="<?= url($show_url) ?>" class="menu-link px-3 btn btn-info" data-kt-users-table-filter="delete_row">view</a>
                                    </td>

                                    </tr>
                                 @endforeach
                            </table>
                        </div>
                    </div>
                </div>


</div>

@endsection
