<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Testing</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/css/apple/style.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/css/apple/style-responsive.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/css/apple/theme/default.css" rel="stylesheet" id="theme" />
	<!-- ================== END BASE CSS STYLE ================== -->
	<link href="{{ url('/') }}/assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{ url('/') }}/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
	<!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ url('/') }}/assets/plugins/pace/pace.min.js"></script>
    <!-- ================== END BASE JS ================== -->

    <style type="text/css">
        th,td { white-space:nowrap }
        div.dataTables_wrapper {
            overflow-x:scroll;
            width: auto;
            margin: 0 auto;
        }
    </style>

    @if (Request::segment(1) == 'upload_file')
   <style>
        tr.odd td:first-child,
        tr.even td:first-child {
            padding-left: 4em;
        }
    </style>
   @endif

    <style type="text/css">

        .modal-lg {
            max-width: 90% !important;
        }

    </style>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><b>Testing</b></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->

			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">


				<li class="dropdown navbar-user">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
						<span class="user-image online"><img src="{{ url('/') }}/assets/img/user/user-13.jpg" alt="" /></span>
						<span class="d-none d-md-inline">Testing</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{url('logout')}}" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->

		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{ url('/') }}/assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								Testing
							</div>
						</a>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>



                    {{-- <li class="{{ Request::is('/') ? 'active' : '' }}">
						<a href="{{url('/')}}">
							<i class="ion-ios-pulse-strong"></i>
							<span>Dashboard</span>
						</a>
					</li> --}}

                    <li class="{{ Request::is('perusahaan') ? 'active' : '' }}">
						<a href="{{url('perusahaan')}}">
							<i class="ion-ios-color-filter-outline bg-purple"></i>
							<span>Company</span>
						</a>
					</li>

                    <li class="{{ Request::is('upload_file') ? 'active' : '' }}">
						<a href="{{url('upload_file')}}">
							<i class="ion-ios-infinite-outline bg-gradient-aqua"></i>
							<span>Upload File</span>
						</a>
					</li>

                    <li class="has-sub">
						<a href="javascript:;">
						    <b class="caret"></b>
						    <i class="ion-ios-grid-view-outline bg-green"></i>
						    <span>Control Chart (SPC)</span>
						</a>
						<ul class="sub-menu">
                            <li class="{{ Request::is('variabel') ? 'active' : '' }}"><a href="{{url('variabel')}}">Variabel</a></li>
                            <li class="{{ Request::is('atribut') ? 'active' : '' }}"><a href="{{url('atribut')}}">Atribut</a></li>
                            <li class="{{ Request::is('special') ? 'active' : '' }}"><a href="{{url('special')}}">Special</a></li>

						</ul>
                    </li>

                    <li class="{{ Request::is('line') ? 'active' : '' }}">
						<a href="{{url('line')}}">
							<i class="ion-stats-bars bg-gradient-orange"></i>
							<span>Run Chart</span>
						</a>
					</li>


                    <li class="{{ Request::is('pareto') ? 'active' : '' }}">
						<a href="{{url('pareto')}}">
							<i class="ion-ios-pulse-strong"></i>
							<span>Pareto</span>
						</a>
					</li>




			        <!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-left"></i> <span>Collapse</span></a></li>
			        <!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
        @yield('content')
        @include('layouts.modal._preview')
        @include('layouts.modal._modal')

		<!-- end #content -->

        <!-- begin theme-panel -->
        <div class="theme-panel">
            <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="ion-ios-cog"></i></a>
            <div class="theme-panel-content">
                <h5 class="m-t-0">Testing</h5>
                <ul class="theme-list clearfix">
                    <li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="{{ url('/') }}/assets/css/apple/theme/green.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="{{ url('/') }}/assets/css/apple/theme/red.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li class="active"><a href="javascript:;" class="bg-blue" data-theme="default" data-theme-file="{{ url('/') }}/assets/css/apple/theme/default.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="{{ url('/') }}/assets/css/apple/theme/purple.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="{{ url('/') }}/assets/css/apple/theme/orange.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="{{ url('/') }}/assets/css/apple/theme/black.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                </ul>
                <div class="divider"></div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                        <select name="header-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">inverse</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                        <select name="header-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                        <select name="sidebar-styling" class="form-control form-control-sm">
                            <option value="1">default</option>
                            <option value="2">grid</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                        <select name="sidebar-fixed" class="form-control form-control-sm">
                            <option value="1">fixed</option>
                            <option value="2">default</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                        <select name="content-gradient" class="form-control form-control-sm">
                            <option value="1">disabled</option>
                            <option value="2">enabled</option>
                        </select>
                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-md-12">
                        <a href="javascript:;" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage">Reset Local Storage</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end theme-panel -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ url('/') }}/assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>



	<!--[if lt IE 9]>
		<script src="{{ url('/') }}/assets/crossbrowserjs/html5shiv.js"></script>
		<script src="{{ url('/') }}/assets/crossbrowserjs/respond.min.js"></script>
		<script src="{{ url('/') }}/assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="{{ url('/') }}/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="{{ url('/') }}/assets/js/theme/apple.min.js"></script>
	<script src="{{ url('/') }}/assets/js/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ url('/') }}/assets/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/masked-input/masked-input.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="{{ url('/') }}/assets/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="{{ url('/') }}/assets/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/jquery-tag-it/js/tag-it.min.js"></script>
    <script src="{{ url('/') }}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="{{ url('/') }}/assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="{{ url('/') }}/assets/js/demo/form-plugins.demo.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script src="{{ url('/') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ url('/') }}/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="{{ url('/') }}/assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
	<script src="{{ url('/') }}/assets/js/demo/ui-modal-notification.demo.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ url('/') }}/assets/plugins/highlight/highlight.common.js"></script>
	<script src="{{ url('/') }}/assets/js/demo/render.highlight.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ url('/') }}/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="{{ url('/') }}/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="{{ url('/') }}/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{ url('/') }}/assets/js/demo/table-manage-default.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
    <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>

    <script src="{{ url('/') }}/js/app.js"></script>
    <script src="{{ url('/') }}/js/sweetalert2.min.js"></script>

    @stack('scripts')

	<script>
		$(document).ready(function() {
			App.init();
            Notification.init();
            Highlight.init();
            TableManageDefault.init();
			FormPlugins.init();
		});
	</script>
</body>
</html>
