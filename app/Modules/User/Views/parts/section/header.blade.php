<!-- ============================================================= HEADER ============================================================= -->
<header>
	<div class="container no-padding">
		
		<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
			<!-- <div include('parts/widgets/header.logo') </div> -->
			<a href="/"><img src="{{$assetUrl}}assets/images/logo.jpeg" style="width: 600px;height: 100px"></a>
		</div><!-- /.logo-holder -->

		<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
			@include('User::parts/widgets/header.search-bar')
		</div><!-- /.top-search-holder -->

		<div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
			@include('User::parts/widgets/header.shopping-cart-dropdown')
		</div><!-- /.top-cart-row -->

	</div><!-- /.container -->
	 
	@include('User::parts/navigation.horizontal-menu',array('categorymenu'=>DB::table('category')->get()))
</header>
<!-- ============================================================= HEADER : END ============================================================= -->