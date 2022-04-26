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
            <a href="#" class="btn btn-sm btn-primary my-1">Add new program</a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body p-0">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <!--begin::Thead-->
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
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fw-6 fw-bold text-gray-600">
                    <tr>
                        <td>1</td>
                        <td>
                            <a href="#" class="text-hover-primary text-gray-600">Bsc IN TELECOMMUNICATIONS ENGINEERING</a>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bolder">Degree</span>
                        </td>
                        <td> 4 Years</td>
                        <td>BSc TE</td>
                        <td><a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Edit</a></td>
                    </tr>
                    <tr>
                        <td>2</td>

                        <td>
                            <a href="#" class="text-hover-primary text-gray-600">BSC IN COMPUTER ENGINEERING</a>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bolder">Degree</span>
                        </td>
                        <td> 4 Years</td>
                        <td>BSc CE</td>
                        <td><a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Edit</a></td>
                    </tr>

                    <tr>
                        <td>3</td>

                        <td>
                            <a href="#" class="text-hover-primary text-gray-600">BSC IN COMPUTER SCIENCE</a>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bolder">Degree</span>
                        </td>
                        <td> 3 Years</td>
                        <td>BSc CS</td>
                        <td><a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Edit</a></td>
                    </tr>

                    <tr>
                        <td>4</td>

                        <td>
                            <a href="#" class="text-hover-primary text-gray-600">DIPLOMA IN COMPUTER SCIENCE</a>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bolder">Diploma</span>
                        </td>
                        <td> 2 Years</td>
                        <td> CS</td>
                        <td><a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Edit</a></td>
                    </tr>
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
