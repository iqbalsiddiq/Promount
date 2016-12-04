@extends('layout.lay_home')
@section('content') 
<div id="top-banner-and-menu">
    <div class="container">
         <div id="single-product">
        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-md-9 items-holder no-margin">
            <?php          
                $ids=array();
                if(!empty($_SESSION['cart'])){
                     
                    $cart=$_SESSION['cart']; 
                    foreach($_SESSION['cart'] as $data){
                        array_push($ids, $data["id"]);    
                    }
                }else{
                    $ids=[];
                    echo "0";
                }
               // echo $cart;
                $items = DB::table('item')
                       ->whereIn('id', $ids)->get();
                $sumPrice=0;
                $c=count($_SESSION['cart'])-1;
                foreach ($items as $prices) {
                     $sumPrice=$sumPrice+$prices->price-($prices->price*$prices->discount/100);                   
                }
                $i=0;
                foreach ($items as $item ):     
            ?>
            <div class="row no-margin cart-item">
                <div class="col-xs-12 col-sm-2 no-margin">
                    <a href="/products?ID={{$item->id}}"> 
                        <img alt="" src="assets/images/item/{{$item->image}}" data-echo="assets/images/item/{{$item->image}}" />
                    </a>
                </div>

                <div class="col-xs-12 col-sm-5 ">
                    <div class="title">
                        <a href="/products?ID={{$item->id}}">{{$item->image}}</a>
                    </div>
                    <div class="brand">{{$item->detail}}</div>
                </div> 

                <div class="col-xs-12 col-sm-3 no-margin">
                    <div class="quantity">
                        <div class="le-quantity">
                            <form>
                                <a class="minus" href="#" onclick="MinCart({{$item->id}})"></a>
                                <input name="quantity" readonly="readonly" type="text" value=<?php echo $_SESSION['cart'][$c]["quantity"]; ?> />
                                <a class="plus" href="#" onclick="AddCart({{$item->id}})"></a>
                            </form>
                        </div>
                    </div>
                </div> 

                <div class="col-xs-12 col-sm-2 no-margin">
                    <div class="price" id=<?php echo "price".$i; ?>>
                        ${{($item->price-($item->price*$item->discount/100))*$_SESSION['cart'][$i]["quantity"]}}
                    </div>
                    <a class="close-btn" href="#"></a>
                </div>
            </div><!-- /.cart-item -->
            <?php $i++;$c--; endforeach ?>
                
        </div>
        <!-- ========================================= CONTENT : END ========================================= -->

        <!-- ========================================= SIDEBAR ========================================= -->

        <div class="col-xs-12 col-md-3 no-margin sidebar ">
            <div class="widget cart-summary">
                <h1 class="border">shopping cart</h1>
                <div class="body">
                    <ul class="tabled-data no-border inverse-bold">
                        <li>
                            <label>cart subtotal</label>
                            <div class="value pull-right">$<?php echo $sumPrice; ?></div>
                        </li>
                        <li>
                            <label>shipping</label>
                            <div class="value pull-right">free shipping</div>
                        </li>
                    </ul>
                    <ul id="total-price" class="tabled-data inverse-bold no-border">
                        <li>
                            <label>order total</label>
                            <div class="value pull-right">$<?php echo $sumPrice; ?></div>
                        </li>
                    </ul>
                    <div class="buttons-holder">
                        <a class="le-button big" href="/checkout" >checkout</a>
                        <a class="simple-link block" href="/" >continue shopping</a>
                    </div>
                </div>
            </div><!-- /.widget -->

            <div id="cupon-widget" class="widget">
                <h1 class="border">use coupon</h1>
                <div class="body">
                    <form>
                        <div class="inline-input">
                            <input data-placeholder="enter coupon code" type="text" />
                            <button class="le-button" type="submit">Apply</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.widget -->
        </div><!-- /.sidebar -->

        <!-- ========================================= SIDEBAR : END ========================================= -->
    </div>  </div> 
<!-- START @PAGE CONTENT -->
<script type="text/javascript">
    function AddCart($id) {
        alert($id);
        url="/cart/addCart/"+$id+"/1";
        window.location = url;
    }
     function MinCart($id) { 
        url="/cart/minCart/"+$id+"/1";
        window.location = url;
    }
</script>
@stop