@extends('layout.lay_home')

<!-- START @PAGE CONTENT -->
@section('content')
<section id="blog-single">
	 <div class="container">

	 	<!-- ========================================= CONTENT ========================================= -->

	 	<div class="posts col-md-9">

	 		<div class="post-entry">
	 			
	 			<div class="clearfix">
	 				<!-- ========================================== SECTION – HERO ========================================= -->
				 <?php
		            $id=$_GET['ID'];
		            // $products =DB::table('item')->where('id', $id)->get();
		            // foreach ($products as $product ):   
		            // $category =DB::table('category')->where('id', $id)->get();
		            // foreach ($categorys as $$category ):   
		            $products = DB::table('category')
                     ->join('item', 'category.id', '=', 'item.idcategory')
                     ->select(DB::raw('item.description as description, item.detail as detail,item.title as title , item.timestamp as timestamp, category.title as category,item.image as image'))
                     ->where('item.id', $id) 
                     ->get();  	
		             foreach ($products as $product ):   
		        ?>			
				<div id="hero">
					<div id="owl-main" class="owl-carousel owl-carousel-blog owl-inner-nav owl-ui-sm">
						
						<div class="item">
							<img width="889px" height="450px" src="assets/images/item/{{$product->image}}" alt="">
						</div><!-- /.item --> 

					</div><!-- /.owl-carousel -->
				</div>
							
				<!-- ========================================= SECTION – HERO : END ========================================= -->
	 			</div><!-- /.clearfix -->
	           

	            <div class="post-content">
					<h2 class="post-title">{{$product->title}}</h2>
					<ul class="meta">
						<li>Posted By : Admin</li>
						<li>{{ date('F d, Y', strtotime($product->timestamp))}} </li>
						<li>{{$product->category}} </li> 
					</ul><!-- /.meta -->
					<p class="highlight">{{$product->detail}}</p>
					<p>{{$product->description}}</p>
					 
				</div><!-- /.post-content -->
	 		</div><!-- /.post-entry -->

	 	 
		</div><!-- /.posts -->

		<!-- ========================================= CONTENT :END ========================================= -->
			
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-md-3"> 
        </div><!-- /.col -->
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
      
    </div>
</section>
<?php endforeach   ?> 
@stop