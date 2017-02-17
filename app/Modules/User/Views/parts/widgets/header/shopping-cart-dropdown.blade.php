<div class="top-cart-row-container">
    <div class="wishlist-compare-holder">
        <div class="wishlist ">
            <a href="#"><i class="fa fa-heart"></i> wishlist <span class="value">(21)</span> </a>
        </div>
        <div class="compare">
            <a href="#"><i class="fa fa-exchange"></i> compare <span class="value">(2)</span> </a>
        </div>
    </div>

    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
    <div class="top-cart-holder dropdown animate-dropdown">
        
        <div class="basket">
            
            <a class="dropdown-toggle" data-toggle="dropdown" href="/cart">
                <div class="basket-item-count">
                    <span class="count">
                        <?php 
                              $cart=array();

                              if(!empty($_SESSION['cart'])){
                                echo count($_SESSION['cart']);
                                foreach($_SESSION['cart'] as $data){
                                   array_push($cart, $data["id"]);    
                                }                                 
                              }else{
                                $cart=[];
                                 echo "0";
                              }

                        ?>
                    </span>
                    <img src="{{$assetUrl}}assets/images/icon-cart.png" alt="" />
                </div>

                <div class="total-price-basket"> 
                    <span class="lbl">your cart:</span>
                    <span class="total-price">
                    <?php                        
                        $items = DB::table('item')
                                ->whereIn('id', $cart)->get();
                        $sum=0;
                        foreach ($items as $prices ):     
                            $sum=$sum+$prices->price-($prices->price*$prices->discount/100);
                        endforeach
                    ?>
                        <span class="sign">$</span><span class="value"><?php echo $sum; ?></span>
                    </span>
                </div>
            </a>

            <ul class="dropdown-menu">
            <?php foreach ($items as $item ):  ?>
                <li>
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                <div class="thumb"> 
                                    <img alt="" src="assets/images/item/{{$item->image}}" data-echo="assets/images/item/{{$item->image}}" /></a>
                                </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 no-margin">
                                <div class="title">{{$item->title}}</div>
                                <div class="price">${{$item->price-($item->price*$item->discount/100)}}</div>
                            </div>
                        </div>
                        <a class="close-btn" href="#" onclick="DelItem({{$item->id}})"></a>
                    </div>
                </li>
            <?php endforeach ?>

                <li class="checkout">
                    <div class="basket-item">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <a href="/cart" class="le-button inverse">View cart</a>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <a href="/checkout" class="le-button">Checkout</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div><!-- /.basket -->
    </div><!-- /.top-cart-holder -->
</div><!-- /.top-cart-row-container -->
<!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->

<script type="text/javascript">
    function DelItem($id) { 
        url="/cart/Delitem/"+$id+"/1";
        window.location = url;
    }
</script>