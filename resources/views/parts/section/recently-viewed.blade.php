<?php 
	$carouselID = isset($carouselID) ? $carouselID : 'owl-recently-viewed';
	$containerClass = isset($containerClass) ? $containerClass : 'container';
	$productItemSize = isset($productItemSize) ? $productItemSize : 'size-small';
?>
<!-- ========================================= RECENTLY VIEWED ========================================= -->
<section id="recently-reviewd" class="wow fadeInUp">
	<div class="<?php echo $containerClass;?>">
		<div class="carousel-holder hover">
			
			<div class="title-nav">
				<h2 class="h1">Recently Viewed</h2>
				<div class="nav-holder">
					<a href="#prev" data-target="#<?php echo $carouselID;?>" class="slider-prev btn-prev fa fa-angle-left"></a>
					<a href="#next" data-target="#<?php echo $carouselID;?>" class="slider-next btn-next fa fa-angle-right"></a>
				</div>
			</div><!-- /.title-nav -->

			<div id="<?php echo $carouselID;?>" class="owl-carousel product-grid-holder">
			  @foreach ($recently as $item )
				<div class="no-margin carousel-item product-item-holder <?php echo $productItemSize;?> hover">
					<div class="product-item">
						<div class="ribbon red"><span>sale</span></div> 
						<div class="image">
						    <a href="/products?ID={{$item->id}}"> 
							<img alt="" src="assets/images/blank.gif" data-echo="assets/images/item/{{$item->image}}" />
							</a>
						</div>
						<div class="body">
							<div class="title">
								  <a href="/products?ID={{$item->id}}">{{$item->title}}</a>
							</div>
							<div class="brand">{{$item->detail}}</div>
						</div>
						<div class="prices">
							<div class="price-current text-right">${{$item->price-($item->price*$item->discount/100)}}</div>
						</div>
						<div class="hover-area">
							<div class="add-cart-button">
								<a href="/cart/addCart/{{$item->id}}/1" class="le-button">Add to Cart</a>
							</div>
							<div class="wish-compare">
								<a class="btn-add-to-wishlist" href="#">Add to Wishlist</a>
								<a class="btn-add-to-compare" href="#">Compare</a>
							</div>
						</div>
					</div><!-- /.product-item -->

				</div><!-- /.product-item-holder -->
 		@endforeach
			</div><!-- /#recently-carousel -->

		</div><!-- /.carousel-holder -->
	</div><!-- /.container -->
</section><!-- /#recently-reviewd -->
<!-- ========================================= RECENTLY VIEWED : END ========================================= -->