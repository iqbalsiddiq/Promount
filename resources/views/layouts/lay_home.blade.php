<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

    <!-- START @HEAD -->
    <head>
        <!-- START @META SECTION -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Blankon is a theme fullpack admin template powered by Twitter bootstrap 3 front-end framework. Included are multiple example pages, elements styles, and javascript widgets to get your project started.">
        <meta name="keywords" content="admin, admin template, bootstrap3, clean, fontawesome4, good documentation, lightweight admin, responsive dashboard, webapp">
        <meta name="author" content="Djava UI">
        <title>{{$title}}</title>
        <!--/ END META SECTION -->


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
        <!--/ END THEME STYLES -->
        <link href="js/js-image-slider.css" rel="stylesheet" type="text/css" />
        <script src="js/js-image-slider.js" type="text/javascript"></script>
        <link href="js/generic.css" rel="stylesheet" type="text/css" />
    </head>
    <!--/ END HEAD -->

   
    <body {!! !empty($bodyClass) ? 'class="'.$bodyClass.'"' : null !!}>

       
        <section id="wrapper">

            <!-- START @HEADER -->
            	@include('layouts.header-home')
            <!--/ END HEADER -->
            <!-- START @PAGE CONTENT -->
            	@yield('content')
            <!--/ END PAGE CONTENT -->

	    <!-- START @ALL MODALS --> 	
	    @if((Request::is('component','component/modals')))	
	    	@include('component._all-modals')
	    @endif
	    <!--/ END ALL MODALS -->
	
        </section><!-- /#wrapper -->
        <!--/ END WRAPPER -->

	

        <!-- START @BACK TOP -->
        <div id="back-top" class="animated pulse circle">
            <i class="fa fa-angle-up"></i>
        </div><!-- /#back-top -->
        <!--/ END BACK TOP -->

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


    </body>
    <!--/ END BODY -->

</html>
