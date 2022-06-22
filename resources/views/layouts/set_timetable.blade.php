@extends('layouts.base')
@section('content')


<div class="post d-flex flex-column-fluid" id="kt_post">

     <div class="toolbar" id="kt_toolbar">
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
            <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Set Course timetable for <?= $course_name->course_name ?></h1>
                <span class="h-20px border-gray-200 border-start mx-4"></span>
            </div>
        </div>
    </div>

     <div class="flex-lg-row-fluid ms-lg-10">
                    <div class="card card-flush mb-6 mb-xl-9">
                        <div class="card-header pt-5">
                            <div class="card-title">
                               <a href="#" class="btn btn-info er fs-6 px-8 py-4" data-bs-toggle="modal" data-bs-target="#kt_modal_new_card">Create timetable</a>
                            </div>
                       </div>

                        <div class="card-body pt-0">
                            <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">

                                <thead>
                                    <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="min-w-50px">ID</th>
                                        <th class="min-w-150px">Date</th>
                                        <th class="min-w-125px">Venue</th>
                                      
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                </thead>

                                <tbody class="fw-bold text-gray-600">
                                @if(isset($courses_timetables))
                                  @foreach($courses_timetables as $index => $courses_timetable)

                                    <tr>
                                        <td>
                                            <?= $index +1 ?>.                                       
                                        </td>
                                        <td><?= $courses_timetable->timein ?></td>
                                        <td><?= $courses_timetable->date ?></td>
                                     
                                         <td class="text-end min-w-100px">
                                            <?php $edit_url = "timetable/edit/$courses_timetable->id";  
                                               ?>
                                          <a href="<?= url($edit_url) ?>" class="btn btn-info er fs-6 px-5 py-2">Edit</a>
                                        </td>

                                        </tr>
                                    @endforeach
                                    @endif
                            </table>


                        </div>
                    </div>
                </div>

<!-- </div> -->



                               <div class="modal fade" id="kt_modal_new_card" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Add New date</h2>
												<div class="btn btn-sm btn-icon btn-active-color-info" data-bs-dismiss="modal">
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
												</div>
											</div>
											<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
												<form id="kt_modal_new_card_form" class="form" action="/createcoursesTimetable"  method="POST">
                                                       @csrf     
													  
													<div class="d-flex flex-column mb-7 fv-row">
														<label class="required fs-6 fw-bold form-label mb-2">Pick date and time</label>
														<div class="position-relative">
															<input type="datetime-local" class="form-control form-control-solid" name="timein" />
														</div>
														
													</div>
												
													<div class="text-center pt-15">
														<input type="hidden"  name="course_id" value="<?= $course_id ?>" />

														<button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                                                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-info">
															<span class="indicator-label">Submit</span>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>

                           



                                <div class="modal fade" id="kt_modal_new_card_edit" tabindex="-1" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<div class="modal-content">
											<div class="modal-header">
												<h2>Edit this date</h2>
												<div class="btn btn-sm btn-icon btn-active-color-info" data-bs-dismiss="modal">
													<span class="svg-icon svg-icon-1">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
														</svg>
													</span>
												</div>
											</div>
											<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
												<form id="kt_modal_new_card_form" class="form" action="/editcoursesTimetable"  method="POST">
                                                       @csrf     
													  
													<div class="d-flex flex-column mb-7 fv-row">
														<label class="required fs-6 fw-bold form-label mb-2">Pick date and time</label>
														<div class="position-relative">
															<input type="datetime-local" class="form-control form-control-solid" name="timein" value=<?= old('timein') ?>/>
														</div>
													</div>
												
													<div class="text-center pt-15">
														<input type="hidden"  name="course_id" value="<?= $course_id ?>" />

														<button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3">Discard</button>
                                                        <button type="submit" id="kt_modal_new_card_submit" class="btn btn-info">
															<span class="indicator-label">Edit</span>
														</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>


 
 <script type="text/javascript">
     
    $(document).ready(function() {
        $('#example').DataTable();
    }); </script>
@endsection
