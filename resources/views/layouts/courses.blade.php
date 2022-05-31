@extends('layouts.base')
@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
    <div class="card mb-5 mb-lg-10">
    <div class="card-header">
        <div class="card-title">
            <h3>All Courses</h3>
        </div>
        <div class="card-toolbar">
            <a href="/createcourses" class="btn btn-sm btn-primary my-1">Add new Course</a>
        </div>
    </div>
  

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                    <tr>
                        <th class="min-w-50px">#</th>
                        <th class="min-w-250px">Course name</th>
                        <th class="min-w-100px">Course code</th>
                        <th class="min-w-150px">Duration</th>
                        <th class="min-w-150px">Venue</th>
                        <th class="min-w-150px">Action</th>
                    </tr>
                </thead>

                <tbody class="fw-6 fw-bold text-gray-600">
                    @foreach($courses as $index => $course)

                    <tr>
                        <td><?= $index +1 ?></td>
                        <td>
                            <a href="#" class="text-hover-primary text-gray-600"><?= $course->course_name ?></a>
                        </td>
                        <td>
                            <span class="badge badge-light-success fs-7 fw-bolder"><?= $course->course_code ?></span>
                        </td>
                        <td> <?= $course->periodic_time ?> Years</td>
                        <td><?= $course->venue_name ?? '' ?></td>
                        <td>
                            <?php  $show_url = "course/show/$course->id"; ?>
                        <a href="<?= url($show_url) ?>" class="menu-link px-3 btn btn-info" data-kt-users-table-filter="delete_row">view</a>
                       </td>
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
