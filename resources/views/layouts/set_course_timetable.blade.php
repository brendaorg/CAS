@extends('layouts.base')
@section('content')


 <div class="post d-flex flex-column-fluid" id="kt_post">
     <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <!--begin::Page title-->
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Courses Time table</h1>
                <!--end::Title-->
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>
    
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search " />
                </div>
            </div>
           
        </div>

        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">#</th>
                        <th class="min-w-125px">Course name</th>
                        <th class="min-w-125px">Course code</th>
                        <th class="min-w-125px">Venue</th>
                        <th class="text-end min-w-70px">Set date</th>
                 </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @if(isset($courses))
                       @foreach($courses as $index => $course)

                        <tr>
                            <td><?= $index +1 ?></td>
                            <td>
                                <a href="#" class="text-hover-primary text-black"><?= $course->course_name ?></a>
                            </td>
                            <td>
                                <span class="badge badge-light-info fs-7 fw-bolder"><?= $course->course_code ?></span>
                            </td>
                            <td><?= $course->venue_name ?? '' ?></td>

                               <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-info" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                             <?php  $show_url = "course/set/$course->id"; ?>
                                             <a href="<?= url($show_url) ?>" class="menu-link px-3 btn btn-" data-kt-users-table-filter="delete_row">set</a>
                                        </div>
                                    </div>
                                </td>
                             </tr>
                         @endforeach
                         @endif
                   </tbody>
            </table>
              {!! $courses->render() !!}

        </div>
    </div>
   
</div>
</div>



@endsection
