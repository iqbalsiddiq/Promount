<!-- ============================================================= HEADER ============================================================= -->
<header>
	<div class="container no-padding">
		
		<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
			@include('parts/widgets/header.logo')

		</div><!-- /.logo-holder -->

		<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
			@include('parts/widgets/header.search-bar')
		</div><!-- /.top-search-holder -->

		<div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
			@include('parts/widgets/header.shopping-cart-dropdown')
		</div><!-- /.top-cart-row -->

	</div><!-- /.container -->
	
	@include('parts/navigation.horizontal-menu')

</header>
<!-- ============================================================= HEADER : END ============================================================= -->