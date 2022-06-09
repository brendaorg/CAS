@extends('layouts.base')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">

     <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <!--begin::Title-->
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Programs List</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>


    <div id="kt_content_container" class="container-xxl">
    <div class="card mb-5 mb-lg-10">
    <!--begin::Card header-->
    <div class="card-header">
        <!--begin::Heading-->
        <div class="card-title">
            <h3>Degree/Diploma Programs</h3>
        </div>
        <div class="card-toolbar">
            <a href="/createprograms" class="btn btn-sm btn-primary my-1">Add new program</a>
        </div>
    </div>
  

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                    <tr>
                        <th class="min-w-50px">#</th>
                        <th class="min-w-250px">Name</th>
                        <th class="min-w-100px">Level</th>
                        <th class="min-w-150px">Duration</th>
                        <th class="min-w-150px">Code name</th>
                        <th class="min-w-150px">Action</th>
                    </tr>
                </thead>

                <tbody class="fw-6 fw-bold text-gray-600">
                    @foreach($programs as $index => $program)

                    <tr>
                        <td><?= $index +1 ?></td>
                        <td>
                            <a href="#" class="text-hover-primary text-gray-600"><?= $program->program_name ?></a>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bolder"><?= $program->program_type ?></span>
                        </td>
                        <td> <?= $program->program_time ?> Years</td>
                        <td><?= $program->program_code ?></td>
                        <td>
                            <?php $edit_url = "program/edit/$program->id"; $show_url = "program/show/$program->id"; ?>
                            <a href="<?= url($edit_url) ?>" class="menu-link px-3 btn btn-primary" data-kt-users-table-filter="delete_row">Edit</a>
                       <!--  <a href="<?= url($show_url) ?>" class="menu-link px-3 btn btn-info" data-kt-users-table-filter="delete_row">view</a>
 -->                    </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

@endsection
