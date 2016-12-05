
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
		<title>{{$title}}</title>

	   	 <!-- START @GLOBAL MANDATORY STYLES -->
	@if(!empty($css['globals']))
		@foreach($css['globals'] as $global)
			<link href="{{$assetUrl.$global}}" rel="stylesheet">
		@endforeach
	@endif
        <!--/ END GLOBAL MANDATORY STYLES -->

        <!-- START @PAGE LEVEL STYLES -->
        @if(!empty($css['pages']))
		@foreach($css['pages'] as $page)
			<link href="{{$assetUrl.$page}}" rel="stylesheet">
		@endforeach
	@endif
        <!--/ END PAGE LEVEL STYLES -->

        <!-- START @THEME STYLES -->
	@if(!empty($css['themes']))
		@foreach($css['themes'] as $key=>$theme)
			@if(is_array($theme))
				<link href="{{$assetUrl.$key}}" rel="stylesheet" id="{{$theme['id']}}">
			@else
				<link href="{{$assetUrl.$theme}}" rel="stylesheet">
			@endif
			
		@endforeach
	@endif
	 <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>

	</head>
<body>
	
	<div class="wrapper">
		<!--navigation-->
		@include('parts/navigation.top-menu-bar')
		@include('parts/section.header')
		<!--content-->
		@yield('content')
		
		<!--footer-->
		@include('parts/section.footer')
		
	    <!-- START @ALL MODALS --> 	
	    @if((Request::is('component','component/modals')))	
	    	@include('component._all-modals')
	    @endif
		
	</div><!-- /.wrapper -->


	<!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- START @CORE PLUGINS -->
	@if(!empty($js['cores']))
		@foreach($js['cores'] as $core)
			<script src="{{$assetUrl.$core}}"></script>
		@endforeach
	@endif
        <!--/ END CORE PLUGINS -->

        <!-- START @PAGE LEVEL PLUGINS -->

        @if(!empty($js['additionalScripts']))
            		@foreach($js['additionalScripts'] as $script)
            			<script src="{{$script}}"></script>
            		@endforeach
            	@endif

        @if(!empty($js['plugins']))
		@foreach($js['plugins'] as $plugin)
			<script src="{{$assetUrl.$plugin}}"></script>
		@endforeach
	@endif
        <!--/ END PAGE LEVEL PLUGINS -->

        <!-- START @PAGE LEVEL SCRIPTS -->
        @if(!empty($js['scripts']))
		@foreach($js['scripts'] as $script)
			<script src="{{$assetUrl.$script}}"></script>
		@endforeach
	@endif

        <!--/ END PAGE LEVEL SCRIPTS -->
        <!--/ END JAVASCRIPT SECTION -->
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
	<script src="http://w.sharethis.com/button/buttons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>
</html>