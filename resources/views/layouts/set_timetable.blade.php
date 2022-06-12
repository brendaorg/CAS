@extends('layouts.base')
@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">


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
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-header pt-5">
                            <div class="card-title">
                               <a href="/createTimetable" class="btn btn-sm btn-primary my-1">Create timetable</a>
                            </div>
                       </div>

                        <div class="card-body pt-0">
                            <table id="example" class="table dt-responsive nowrap" style="width:100%">
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

<!-- </div> -->






<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.j"></script>

<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
 
 <script type="text/javascript">
     
    $(document).ready(function() {
        $('#example').DataTable();
    }); </script>
@endsection
