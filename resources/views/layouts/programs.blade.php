@extends('layouts.base')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
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
                        <a href="<?= url($show_url) ?>" class="menu-link px-3 btn btn-info" data-kt-users-table-filter="delete_row">view</a></td>
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
