@extends('layout.lay_home')

<!-- START @PAGE CONTENT -->
@section('content')
<!-- ========================================= BREADCRUMB ========================================= -->
<?php
	$id=$_GET['ID'];
	// $products =DB::table('item')->where('id', $id)->get();
	// foreach ($products as $product ):   
	// $category =DB::table('category')->where('id', $id)->get();
	// foreach ($categorys as $$category ):   
	$products = DB::table('category')
	 ->join('item', 'category.id', '=', 'item.idcategory')
	 ->select(DB::raw('item.description as description, item.detail as detail,item.title as title , item.timestamp as timestamp, category.title as category,item.image as image , item.price as price,item.discount as discount,item.id as id'))
	 ->where('item.id', $id) 
	 ->get();  	
	 foreach ($products as $product ):   
?>
<div id="top-mega-nav">
    <div class="container">
        <nav>
            <ul class="inline">
                <li class="dropdown le-dropdown">
                    <a href="#" class="dropdown-toggle" >
                        <i class="fa fa-list"></i> {{$product->category}}
                    </a> 
                </li>

                <li class="breadcrumb-nav-holder"> 
                    <ul>  
                        <li class="breadcrumb-item current gray">
                            <a href="index.php?page=about">{{$product->title}}</a>
                        </li>
                    </ul>
                </li><!-- /.breadcrumb-nav-holder -->
            </ul>
        </nav>
    </div><!-- /.container -->
</div><!-- /#top-mega-nav -->

<!-- ========================================= BREADCRUMB : END -->
<section id="blog-single single-product">
	 <div class="container">

	 	<!-- ========================================= CONTENT ========================================= -->

	 	<div class="posts col-md-9">

	 		<div class="post-entry">
	 			
	 			<div class="clearfix">
	 				<!-- ========================================== SECTION – HERO ========================================= -->
				 			
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
    <aside class="sidebar blog-sidebar">
    
    <div class=" no-margin sidebar page-main-content">
            <div id="single-product" class="row" >
                <div class="no-margin body-holder">
        <div class="star-holder inline"><div class="star" data-score="4"></div></div>
        <div class="availability"><label>Availability:</label><span class="available">  in stock</span></div>

        <div class="title"><a href="#">{{$product->detail}}</a></div>
        <div class="brand">{{$product->title}}</div>

        <div class="social-row">
            <span class="st_facebook_hcount"></span>
            <span class="st_twitter_hcount"></span>
            <span class="st_pinterest_hcount"></span>
        </div>
        
        <div class="prices">
            <div class="price-prev">${{$product->price}}</div>
            <div class="price-current">${{$product->price-($product->price*$product->discount/100)}}</div>
        </div>

        <div class="qnt-holder">
            <div class="le-quantity">
               <form>
                    <a class="minus" href="/cart/minCart/{{$product->id}}/1"></a>
                        <input name="quantity" readonly="readonly" type="text" value="1" />
                    <a class="plus" href="#" onclick="AddCart({{$product->id}})"></a>
                </form>
            </div>
            <a id="addto-cart" href="/cart/addCart/{{$product->id}}/1" class="le-button">add to cart</a>
        </div><!-- /.qnt-holder -->

	</div>

</div>
</div>
	<!-- /.widget -->
    <div class="widget">
	    <h4>About</h4>
	    <div class="body">
	        <p>{{substr($product->description,0,200)}}</p>
	    </div>
	</div><!-- /.widget -->
    <div class="widget">
        <h4>Categories</h4>
        <div class="body">
            <ul class="le-links">
       
        <?php
            $AllCategory = DB::table('category')
                     ->join('item', 'category.id', '=', 'item.idcategory')
                     ->select(DB::raw('count(item.id) as sum, category.title as titles'))
                     ->groupBy('category.title')
                     ->get();  
            foreach ($AllCategory as $item ):          
        ?>
	            <li><a href="#">{{$item->titles    }}</a></li>
	            
	   <?php
            endforeach
       ?>
            </ul><!-- /.le-links -->
	    </div>
	</div><!-- /.widget -->
    <div class="widget">
    <div class="simple-banner">
        <a href="#"><img alt="" class="img-responsive" src="assets/images/item/{{$product->image}}"></a>
    </div>
</div>
    <!-- ========================================= RECENT POST ========================================= -->
<div class="widget">
    <h4>Recent Posts</h4>
    <div class="body">
        <ul class="recent-post-list">
            <?php
            $items = DB::table('item')->orderBy('timestamp', 'desc')->skip(0)->take(4)->get();
               foreach ($items as $item ):          
            ?>
            <li class="sidebar-recent-post-item">
                <div class="media">
                    <a href="/products?ID={{$item->id}}" class="thumb-holder pull-left">
                        <img alt="" src="assets/images/item/{{$item->image}}">
                    </a>
                    <div class="media-body">
                        <h5><a href="/products?ID={{$item->id}}">{{$item->title}}</a></h5>
                        <div class="posted-date">{{ date('F d, Y', strtotime($item->timestamp))}} </div>
                    </div>
                </div>
            </li><!-- /.sidebar-recent-post-item -->
            <?php
               endforeach
            ?> 
        </ul><!-- /.recent-post-list -->
    </div><!-- /.body -->
</div><!-- /.widget -->
<!-- ========================================= RECENT POST : END ========================================= -->
    <!-- <div class="widget">
    <h4>Popular Tags</h4>
    <div class="body">
        <div class="tagcloud">
            <a style="font-size: 12pt;" href="#">Beautiful</a> 
            <a style="font-size: 20pt;" href="#">Media Center</a> 
            <a style="font-size: 10pt;" href="#">Quality</a> 
            <a style="font-size: 14pt;" href="#">Website</a> 
            <a style="font-size: 16pt;" href="#">Template</a> 
            <a style="font-size: 12pt;" href="#">Professional</a> 
            <a style="font-size: 20pt;" href="#">Design</a> 
            <a style="font-size: 10pt;" href="#">Multipurpose</a> 
            <a style="font-size: 16pt;" href="#">Portfolio</a> 
            <a style="font-size: 10pt;" href="#">Customization</a> 
            <a style="font-size: 19pt;" href="#">Bootstrap</a> 
            <a style="font-size: 9pt;" href="#">Mobile</a> 
            <a style="font-size: 14pt;" href="#">Features</a> 
            <a style="font-size: 9pt;" href="#">Styles</a> 
            <a style="font-size: 13pt;" href="#">Responsive</a> 
            <a style="font-size: 9pt;" href="#">Font Icons</a> 
            <a style="font-size: 22pt;" href="#">Love</a> 
            <a style="font-size: 10pt;" href="#">Digital</a> 
            <a style="font-size: 18pt;" href="#">Awesome</a> 
            <a style="font-size: 12pt;" href="#">Passion</a> 
            <a style="font-size: 13pt;" href="#">Typography</a> 
            <a style="font-size: 13pt;" href="#">Clean</a> 
            <a style="font-size: 9pt;" href="#">Easy to use</a> 
            <a style="font-size: 20pt;" href="#">Buy it</a> 
            <a style="font-size: 12pt;" href="#">Success</a> -->
        <!-- </div>tagcloud -->
    <!-- </div>/.body -->
<!--</div> /.widget -->
</aside><!-- /.sidebar .blog-sidebar -->        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
      
    </div>
</section>
<?php endforeach   ?> 

<script type="text/javascript">
    function AddCart($id) {
        alert($id);
        url="/cart/addCart/"+$id+"/1";
        window.location = url;
    }
</script>

@stop