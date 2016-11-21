<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">featured</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">new arrivals</a></li>
                <li><a href="#top-sales" data-toggle="tab">top sales</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                     <?php
                                $tabsFeatured =DB::table('item')->orderByRaw("RAND()")->where('featured', '1')->skip(0)->take(4)->get();
                                foreach ($tabsFeatured as $item ):          
                                ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            
                            <div class="product-item">
                                <?php 
                                    if ($item->sale=='1'){
                                          echo '<div class="ribbon red"><span>sale</span></div>'; 
                                    }
                                    if ($item->new=='1'){
                                          echo '<div class="ribbon blue"><span>new</span></div>'; 
                                    }
                                ?> 
                                <div class="image">
                                     <a href="/products?ID={{$item->id}}"> 
                                    <img alt="" src="assets/images/item/{{$item->image}}" data-echo="assets/images/item/{{$item->image}}" /></a>
                                </div>
                                <div class="body">
                                    <div class="label-discount green">{{$item->discount}}</div>
                                    <div class="title">
                                        <a href="/products?ID={{$item->id}}">{{$item->title}}</a>
                                    </div>
                                    <div class="brand">{{$item->detail}}</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">{{$item->price}}</div>
                                    <div class="price-current pull-right">{{$item->detail}}</div>

                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="/cart/addCart/{{$item->id}}/1" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php endforeach ?> 
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            load more products</a>
                    </div> 

                </div>
                <div class="tab-pane" id="new-arrivals">
                       <div class="product-grid-holder">
                        <?php
                                $tabsFeatured =DB::table('item')->orderByRaw("RAND()")->where('newdeals', '1')->skip(0)->take(4)->get();
                                foreach ($tabsFeatured as $item ):          
                                ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                             
                            <div class="product-item">
                                <?php 
                                    if ($item->sale=='1'){
                                          echo '<div class="ribbon red"><span>sale</span></div>'; 
                                    }
                                    if ($item->new=='1'){
                                          echo '<div class="ribbon blue"><span>new</span></div>'; 
                                    }
                                ?> 
                                <div class="image">
                                    <a href="/products?ID={{$item->id}}"> 
                                    <img alt="" src="assets/images/item/{{$item->image}}" data-echo="assets/images/item/{{$item->image}}" /></a>
                                </div>
                                <div class="body">
                                    <div class="label-discount green">{{$item->discount}}</div>
                                    <div class="title">
                                        <a href="/products?ID={{$item->id}}">{{$item->title}}</a>
                                    </div>
                                    <div class="brand">{{$item->detail}}</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">{{$item->price}}</div>
                        
                                    <div class="price-current pull-right">{{$item->detail}}</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="/cart" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php endforeach ?> 
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            load more products</a>
                    </div> 

                </div>

                <div class="tab-pane" id="top-sales">
                       <div class="product-grid-holder">
                       <?php
                                $tabsFeatured =DB::table('item')->orderByRaw("RAND()")->where('topdeals', '1')->skip(0)->take(4)->get();
                                foreach ($tabsFeatured as $item ):          
                                ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                             
                            <div class="product-item">
                                <?php 
                                    if ($item->sale=='1'){
                                          echo '<div class="ribbon red"><span>sale</span></div>'; 
                                    }
                                    if ($item->new=='1'){
                                          echo '<div class="ribbon blue"><span>new</span></div>'; 
                                    }
                                ?> 
                                <div class="image">
                                    <a href="/products?ID={{$item->id}}"> 
                                    <img alt="" src="assets/images/item/{{$item->image}}" data-echo="assets/images/item/{{$item->image}}" /></a>
                                </div>
                                <div class="body">
                                    <div class="label-discount green">{{$item->discount}}</div>
                                    <div class="title">
                                         <a href="/products?ID={{$item->id}}">{{$item->title}}</a>
                                    </div>
                                    <div class="brand">{{$item->detail}}</div>
                                </div>
                                <div class="prices">
                                    <div class="price-prev">{{$item->price}}</div>
                                   
                                    <div class="price-current pull-right">{{$item->detail}}</div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="/cart" class="le-button">add to cart</a>
                                    </div>
                                    <div class="wish-compare">
                                        <a class="btn-add-to-wishlist" href="#">add to wishlist</a>
                                        <a class="btn-add-to-compare" href="#">compare</a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php endforeach ?> 
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            load more products</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>