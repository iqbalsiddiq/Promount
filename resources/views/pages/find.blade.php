<?php
    $isListView = isset($_GET['view']) && ($_GET['view'] == 'list') ? true : false;
?>
@extends('layout.lay_home')

<!-- START @PAGE CONTENT -->
@section('content')
<section id="category-grid">
    <div class="container">
        
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">

            <!-- ========================================= PRODUCT FILTER ========================================= -->
<!-- <div class="widget">
    <h1>Product Filters</h1>
    <div class="body bordered">
        
        <div class="category-filter">
            <h2>Brands</h2>
            <hr>
            <ul>
                <li><input checked="checked" class="le-checkbox" type="checkbox"  /> <label>Samsung</label> <span class="pull-right">(2)</span></li>
                <li><input  class="le-checkbox" type="checkbox" /> <label>Dell</label> <span class="pull-right">(8)</span></li>
                <li><input  class="le-checkbox" type="checkbox" /> <label>Toshiba</label> <span class="pull-right">(1)</span></li>
                <li><input  class="le-checkbox" type="checkbox" /> <label>Apple</label> <span class="pull-right">(5)</span></li>
            </ul>
        </div> 
        
        <div class="price-filter">
            <h2>Price</h2>
            <hr>
            <div class="price-range-holder">

                <input type="text" class="price-slider" value="" >

                <span class="min-max">
                    Price: $89 - $2899
                </span>
                <span class="filter-button">
                    <a href="#">Filter</a>
                </span>
            </div>
        </div> 

    </div> 
</div> -->
<!-- ========================================= PRODUCT FILTER : END ========================================= -->

    <div class="widget">
    <h1 class="border">special offers</h1>
    <ul class="product-list">
     <?php
                    $search=$_GET['search']; 
                    $idcategory=$_GET['idcategory']; 
                   $products = DB::table('category')
                     ->join('item', 'category.id', '=', 'item.idcategory')
                     ->select(DB::raw('item.description as description, item.detail as detail,item.title as title , item.timestamp as timestamp, category.title as category,category.id as idcategory,item.image as image,item.price as price,item.discount as discount,item.topdeals as topdeals'))
                     ->where('item.title', 'like', '%'.$search.'%')  
                     ->orwhere('item.description', 'like', '%'.$search.'%') 
                     ->orWhere('item.detail', 'like', '%'.$search.'%') 
                     ->orWhere('item.price', 'like', '%'.$search.'%') 
                     ->orWhere('item.discount', 'like', '%'.$search.'%') 
                     ->orWhere('item.timestamp', 'like', '%'.$search.'%') 
                     ->get();    
                    
                     foreach ($products as $product ):  
                      if( $idcategory==0){
                        ?>
                        <li>
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 no-margin">
                                <a href="#" class="thumb-holder">
                                    <img alt="" src="assets/images/item/{{$product->image}}"   />
                                </a>
                            </div>
                            <div class="col-xs-8 col-sm-8 no-margin">
                                <a href="#">{{$product->title}}</a>
                                <div class="price">
                                    <div class="price-prev">${{$product->price}}</div>
                                    <div class="price-current">${{$product->price-($product->price*$product->discount/100)}}</div>
                                </div>
                            </div>  
                        </div>
                       </li>
                    <?php }else{   
                     if($product->idcategory==$idcategory && $product->topdeals==1 ){
                ?>          
        <li>
            <div class="row">
                <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/item/{{$product->image}}"   />
                    </a>
                </div>
                <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">{{$product->title}}</a>
                    <div class="price">
                        <div class="price-prev">${{$product->price}}</div>
                        <div class="price-current">${{$product->price-($product->price*$product->discount/100)}}</div>
                    </div>
                </div>  
            </div>
        </li>
 <?php } }endforeach   ?> 
    </ul>
</div><!-- /.widget -->

 
           <!-- ========================================= FEATURED PRODUCTS ========================================= -->
<div class="widget">
    <h1 class="border">Featured Products</h1>
    <ul class="product-list">
        <?php
                   $search=$_GET['search']; 
                   $idcategory=$_GET['idcategory']; 
                   $products = DB::table('category')
                     ->join('item', 'category.id', '=', 'item.idcategory')
                     ->select(DB::raw('item.description as description, item.detail as detail,item.title as title , item.timestamp as timestamp, category.title as category,category.id as idcategory,item.image as image,item.price as price,item.discount as discount,item.featured as featured'))
                     ->where('item.title', 'like', '%'.$search.'%')  
                     ->orwhere('item.description', 'like', '%'.$search.'%') 
                     ->orWhere('item.detail', 'like', '%'.$search.'%') 
                     ->orWhere('item.price', 'like', '%'.$search.'%') 
                     ->orWhere('item.discount', 'like', '%'.$search.'%') 
                     ->orWhere('item.timestamp', 'like', '%'.$search.'%') 
                     ->get();    
                     foreach ($products as $product ):  
                     if($idcategory==0){?>
                     <li class="sidebar-product-list-item">
            <div class="row">
               <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/item/{{$product->image}}"   />
                    </a>
                </div>
              <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">{{$product->title}}</a>
                    <div class="price">
                        <div class="price-prev">${{$product->price}}</div>
                        <div class="price-current">${{$product->price-($product->price*$product->discount/100)}}</div>
                    </div>
                </div>  
            </div>
        </li><!-- /.sidebar-product-list-item -->
        <?php

                     }  else{ 
                     if($product->idcategory==$idcategory && $product->featured==1 ){
                ?>          
        <li class="sidebar-product-list-item">
            <div class="row">
               <div class="col-xs-4 col-sm-4 no-margin">
                    <a href="#" class="thumb-holder">
                        <img alt="" src="assets/images/item/{{$product->image}}"   />
                    </a>
                </div>
              <div class="col-xs-8 col-sm-8 no-margin">
                    <a href="#">{{$product->title}}</a>
                    <div class="price">
                        <div class="price-prev">${{$product->price}}</div>
                        <div class="price-current">${{$product->price-($product->price*$product->discount/100)}}</div>
                    </div>
                </div>  
            </div>
        </li><!-- /.sidebar-product-list-item -->
 <?php } }endforeach   ?> 
    </ul><!-- /.product-list -->
</div><!-- /.widget -->
<!-- ========================================= FEATURED PRODUCTS : END ========================================= -->

        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->

        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">

           <section id="recommended-products" class="carousel-holder hover small">

    <div class="title-nav"> 
        <div class="nav-holder">
            <a href="#prev" data-target="#owl-recommended-products" class="slider-prev btn-prev fa fa-angle-left"></a>
            <a href="#next" data-target="#owl-recommended-products" class="slider-next btn-next fa fa-angle-right"></a>
        </div>
    </div><!-- /.title-nav -->

   
</section><!-- /.carousel-holder -->
            
            <section id="gaming">
    <div class="grid-list-products">
         <?php
                    
                    $categorys =DB::table('category')->where('id',$_GET['idcategory'])->get();
                    $count =DB::table('category')->where('id',$_GET['idcategory'])->count();
                    foreach ($categorys as $category ):    
                        echo '<h2 class="section-title">'.$category->title.'</h2>'; 
                    endforeach;
                    if($count==0){
                         echo '<h2 class="section-title">All Categories</h2>'; 
                    }
                // }   
         ?>

        
        <div class="control-bar">
            <div id="popularity-sort" class="le-select" >
                <select data-placeholder="sort by popularity">
                    <option value="1">1-100 players</option>
                    <option value="2">101-200 players</option>
                    <option value="3">200+ players</option>
                </select>
            </div>
            
            <div id="item-count" class="le-select">
                <select>
                    <option value="1">24 per page</option>
                    <option value="2">48 per page</option>
                    <option value="3">32 per page</option>
                </select>
            </div>

            <div class="grid-list-buttons">
                <ul>
                    <li class="grid-list-button-item <?php if(!$isListView) echo 'active';?>"><a data-toggle="tab" href="#grid-view"><i class="fa fa-th-large"></i> Grid</a></li>
                    <li class="grid-list-button-item <?php if($isListView) echo 'active';?>"><a data-toggle="tab" href="#list-view"><i class="fa fa-th-list"></i> List</a></li>
                </ul>
            </div>
        </div><!-- /.control-bar -->
                                
        <div class="tab-content">
            <div id="grid-view" class="products-grid fade tab-pane <?php if(!$isListView) echo 'in active';?>">
                
                <div class="product-grid-holder">
                    <div class="row no-margin">
                        <?php
                            $search=$_GET['search']; 
                            $idcategory=$_GET['idcategory']; 
                           $products = DB::table('category')
                             ->join('item', 'category.id', '=', 'item.idcategory')
                             ->select(DB::raw('item.id as id,item.description as description, item.detail as detail,item.title as title , item.timestamp as timestamp, category.title as category,category.id as idcategory,item.image as image,item.price as price,item.discount as discount,item.featured as featured,item.sale as sale,item.new as new'))
                             ->where('item.title', 'like', '%'.$search.'%')  
                             ->orwhere('item.description', 'like', '%'.$search.'%') 
                             ->orWhere('item.detail', 'like', '%'.$search.'%') 
                             ->orWhere('item.price', 'like', '%'.$search.'%') 
                             ->orWhere('item.discount', 'like', '%'.$search.'%') 
                             ->orWhere('item.timestamp', 'like', '%'.$search.'%') 
                             ->get();    
                             foreach ($products as $product ):   
                              if($idcategory==0){?>
                             <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                            <div class="product-item">
                                <?php 
                                    if ($product->sale=='1'){
                                          echo '<div class="ribbon red"><span>sale</span></div>'; 
                                    }
                                    if ($product->new=='1'){
                                          echo '<div class="ribbon blue"><span>new</span></div>'; 
                                    }
                                ?>  
                                <div class="image">
                                    <a href="/products?ID={{$product->id}}"><img alt="" src="assets/images/item/{{$product->image}}"   /></a>
                                </div>
                                <div class="body">
                                    <div class="label-discount green">-{{$product->discount}}% Sale</div>
                                    <div class="title">
                                        <a href="/products?ID={{$product->id}}">{{$product->title}}</a>
                                    </div>
                                    <div class="brand">{{$product->detail}}</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">${{$product->price}}</div>
                                    <div class="price-current pull-right">${{$product->price-($product->price*$product->discount/100)}}</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button"> 
                                        <a href="/products?ID={{$product->id}}" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div><!-- /.product-item -->
                        </div><!-- /.product-item-holder -->
                        <?php }else{
                             if($product->idcategory==$idcategory){
                        ?>          
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
                            <div class="product-item">
                                <?php 
                                    if ($product->sale=='1'){
                                          echo '<div class="ribbon red"><span>sale</span></div>'; 
                                    }
                                    if ($product->new=='1'){
                                          echo '<div class="ribbon blue"><span>new</span></div>'; 
                                    }
                                ?>  
                                <div class="image">
                                    <a href="/products?ID={{$product->id}}"><img alt="" src="assets/images/item/{{$product->image}}"   /></a>
                                </div>
                                <div class="body">
                                    <div class="label-discount green">-{{$product->discount}}% Sale</div>
                                    <div class="title">
                                        <a href="/products?ID={{$product->id}}">{{$product->title}}</a>
                                    </div>
                                    <div class="brand">{{$product->detail}}</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">${{$product->price}}</div>
                                    <div class="price-current pull-right">${{$product->price-($product->price*$product->discount/100)}}</div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button"> 
                                        <a href="/products?ID={{$product->id}}" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div><!-- /.product-item -->
                        </div><!-- /.product-item-holder -->

                     <?php } }endforeach   ?> 

                    </div><!-- /.row -->
                </div><!-- /.product-grid-holder -->
                
                <div class="pagination-holder">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-6 text-left">
                            <ul class="pagination ">
                                <li class="current"><a  href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">next</a></li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-6">
                            <div class="result-counter">
                                Showing <span>1-9</span> of <span>11</span> results
                            </div>
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->
            </div><!-- /.products-grid #grid-view -->

            <div id="list-view" class="products-grid fade tab-pane <?php if($isListView) echo 'active in';?>">
                <div class="products-list">
                     <?php
                            $search=$_GET['search']; 
                            $idcategory=$_GET['idcategory']; 
                            $products = DB::table('category')
                             ->join('item', 'category.id', '=', 'item.idcategory')
                             ->select(DB::raw('item.id as id,item.description as description, item.detail as detail,item.title as title , item.timestamp as timestamp, category.title as category,category.id as idcategory,item.image as image,item.price as price,item.discount as discount,item.featured as featured,item.sale as sale,item.new as new'))
                             ->where('item.title', 'like', '%'.$search.'%')  
                             ->orwhere('item.description', 'like', '%'.$search.'%') 
                             ->orWhere('item.detail', 'like', '%'.$search.'%') 
                             ->orWhere('item.price', 'like', '%'.$search.'%') 
                             ->orWhere('item.discount', 'like', '%'.$search.'%') 
                             ->orWhere('item.timestamp', 'like', '%'.$search.'%') 
                             ->get();    
                             foreach ($products as $product ):     
                             if($product->idcategory==$idcategory){
                    ?>          
                    <div class="product-item product-item-holder">
                          <?php 
                                    if ($product->sale=='1'){
                                          echo '<div class="ribbon red"><span>sale</span></div>'; 
                                    }
                                    if ($product->new=='1'){
                                          echo '<div class="ribbon blue"><span>new</span></div>'; 
                                    }
                                ?>  
                        <div class="row">
                            <div class="no-margin col-xs-12 col-sm-4 image-holder">
                                <div class="image">
                                     <a href="/products?ID={{$product->id}}"><img alt="" src="assets/images/item/{{$product->image}}"   /></a>
                                </div>
                            </div><!-- /.image-holder -->
                            <div class="no-margin col-xs-12 col-sm-5 body-holder">
                                <div class="body">
                                    <div class="label-discount green">-{{$product->discount}}% Sale</div>
                                    <div class="title">
                                        <a href="/products?ID={{$product->id}}">{{$product->title}}</a>
                                    </div>
                                    <div class="brand">{{$product->detail}}</div>
                                    <div class="excerpt">
                                        <p>{{$product->description}}</p>
                                    </div>
                                    <div class="addto-compare">
                                        <a class="btn-add-to-compare" href="#">add to compare list</a>
                                    </div>
                                </div>
                            </div><!-- /.body-holder -->
                            <div class="no-margin col-xs-12 col-sm-3 price-area">
                                <div class="right-clmn">
                                    <div class="price-current">${{$product->price}}</div>
                                    <div class="price-prev">${{$product->price-($product->price*$product->discount/100)}}</div>
                                    <div class="availability"><label>availability:</label><span class="available">  in stock</span></div>
                                    <a class="le-button" href="#">add to cart</a>
                                    <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                </div>
                            </div><!-- /.price-area -->
                        </div><!-- /.row -->
                    </div><!-- /.product-item -->
                    <?php } endforeach   ?> 
 
                </div><!-- /.products-list -->

                <div class="pagination-holder">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <ul class="pagination">
                                <li class="current"><a  href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">next</a></li>
                            </ul><!-- /.pagination -->
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="result-counter">
                                Showing <span>1-9</span> of <span>11</span> results
                            </div><!-- /.result-counter -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.pagination-holder -->

            </div><!-- /.products-grid #list-view -->

        </div><!-- /.tab-content -->
    </div><!-- /.grid-list-products -->

</section><!-- /#gaming -->
            
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->    
    </div><!-- /.container -->
</section><!-- /#category-grid -->

@stop