<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>CAS</title>
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

		<!--end::Fonts-->
		<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

		<link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	</head>

    <body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					  @yield('content')
				</div>

			</div>
		</div>
		<!--end::Main-->
		<script>var hostUrl = "{{ asset('assets/')}}";</script>

		<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->

		<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
		<script src="{{ asset('assets/assets/js/custom/apps/customers/list/export.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/customers/list/list.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/customers/add.js') }}"></script>
		<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>

		<script>
			      @if(Session::has('success'))
                toastr.options =
                {
                   "closeButton" : true,
                   "progressBar" : true
                }
                toastr.success("{{ session('success') }}");
                @endif

                @if(Session::has('error'))
                toastr.options =
                {
                "closeButton" : true,
                "progressBar" : true
                }
                toastr.error("{{ session('error') }}");
                @endif

                @if(Session::has('info'))
                toastr.options =
                {
                "closeButton" : true,
                "progressBar" : true
                }
                toastr.info("{{ session('info') }}");
                @endif

                @if(Session::has('warning'))
                toastr.options =
                {
                "closeButton" : true,
                "progressBar" : true
                }
                toastr.warning("{{ session('warning') }}");
                @endif
		</script>
	</body>
	<!--end::Body-->
</html>
