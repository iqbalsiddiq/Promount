@extends('layout.lay_home')

<!-- START @PAGE CONTENT -->
@section('content')

<!-- ========================================= BREADCRUMB : END ========================================= -->
<div id="top-banner-and-menu">
	<div class="container">
		
		<div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
			@include('parts/navigation.sidemenu')
		</div><!-- /.sidemenu-holder -->

		<div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
			@include('parts/section.home-page-slider')		
		</div><!-- /.homebanner-holder -->

	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->


@include('parts/section.home-banners')

@include('parts/section.home-page-tabs')

@include('parts/section.best-sellers',array('topdeals'=>DB::table('item')->orderByRaw("RAND()")->where('topdeals', '1')->skip(0)->take(3)->get()))


@include('parts/section.top-brands',array('merchant'=>DB::table('merchant')->skip(0)->take(6)->get()))

 

@stop