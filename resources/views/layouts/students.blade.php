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
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Students List</h1>
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
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search student" />
                        </div>
                    </div>
                
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                   #
                                </th>
                                <th class="min-w-125px">FULL NAME</th>
                                <th class="min-w-125px">EMAIL</th>
                                <th class="min-w-125px">JOIN DATE</th> 
                                <th class="min-w-125px">GENDER</th> 
                                <th class="min-w-125px">REGISTRATION No</th> 
                                <th class="min-w-125px">PROGRAM</th> 
                                <th class="min-w-125px">ATTENDANCE ID</th> 
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        
                        @if(isset($users))
                        <tbody class="text-gray-600 fw-bold">
                             @foreach($users as $index => $user)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <?= $index + 1 ?>
                                    </div>
                                </td>

                                <td class=" align-items-center">
                                     <?= $user->first_name .' '. $user->last_name ?>
                                </td>

                                <td class="align-items-center">
                                     <?= $user->email ?>
                                </td>
                             
                                <td class="align-items-center">
                                    <div class="badge badge-light fw-bolder"><?= date('d,M,Y',strtotime($user->created_at)) ?></div>
                                </td>
                             
                                <td class="align-items-start"><?= strtoupper($user->gender) ?></td>

                                 <td class="text-start">
                                     <?= $user->registration_number ?>                              
                                </td>

                                <td class="align-items-start">
                                     <?= $user->program_name ?>                              
                                </td>

                                 <td class="text-start">
                                     <?= $user->cas_id ?? ''?>                              
                                </td>

                                <!--end::Action=-->
                            </tr>
                          @endforeach
                        </tbody>

                        @endif
                    </table>
                         {!! $users->render() !!}

                    <!--end::Table-->
                </div>

                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection