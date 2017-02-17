 
@extends('User::layout.lay_home')

@section('content') 
<?php
    $cart=array();
    $qty=array();
     
    if(!empty($_SESSION['cart'])){ 
        foreach($_SESSION['cart'] as $data){
            array_push($cart, $data["id"]);   
            array_push($qty, $data["quantity"]);   
        }

    }else{
        $cart=[]; 
        echo "aaa";
        // header("Location:/");
        
    }
?>
<section id="checkout-page">
    <div class="container">
        <div class="col-xs-12 no-margin">
            
            <div class="billing-address">
                <h2 class="border h1">Order Info</h2>
                <form>
                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>full name*</label>
                            <input class="le-input" id="fullname" >
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>last name*</label>
                            <input class="le-input" id="lastname">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12">
                            <label>company name</label>
                            <input class="le-input" id="companyname" >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-6">
                            <label>address*</label>
                            <input class="le-input" data-placeholder="street address" id="address" >
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <label>&nbsp;</label>
                            <input class="le-input" data-placeholder="town" id="town" >
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div class="col-xs-12 col-sm-4">
                            <label>postcode / Zip*</label>
                            <input class="le-input" id="Zipcode" >
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <label>email address*</label>
                            <input class="le-input" id="email" >
                        </div>

                        <div class="col-xs-12 col-sm-4">
                            <label>phone number*</label>
                            <input class="le-input" id="phone">
                        </div>
                    </div><!-- /.field-row -->

                    <div class="row field-row">
                        <div id="create-account" class="col-xs-12">
                            <input  class="le-checkbox big" type="checkbox"  />
                            <a class="simple-link bold" href="#">Create Account?</a> - you will receive email with temporary generated password after login you need to change it.
                        </div>
                    </div><!-- /.field-row -->

                </form>
            </div><!-- /.billing-address -->


            <section id="shipping-address">
                <h2 class="border h1">shipping address</h2>
                <form>
                    <div class="row field-row">
                        <div class="col-xs-12">
                            <input  class="le-checkbox big" type="checkbox" id="sa2" onclick="displayAddress()" />
                            <a class="simple-link bold" href="#">ship to different address?</a>
                            <textarea class="le-input" id="address2" value="" style="display: none"> </textarea>
                        </div>
                    </div><!-- /.field-row -->
                </form>
            </section><!-- /#shipping-address -->


            <section id="your-order">
                <h2 class="border h1">your order</h2>
                <!-- <?php                        
                    
                    // $sum=0;
                    // foreach ($_SESSION['cart'] as $prices ):     
                    //     $sum=$sum+$prices->price-($prices->price*$prices->discount/100);
                    // endforeach
                ?> -->
                <form>
                    <?php 
                        $sum=0;
                        foreach ($_SESSION['cart'] as $item ):  
                        $sum=$sum+$item['quantity']*($item['price']-($item['price']*$item['discount']/100));
                        
                    ?>
                    <div class="row no-margin order-item">
                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="#" class="qty"><?php echo $item['quantity']; ?>x</a>
                        </div>

                        <div class="col-xs-12 col-sm-7 ">
                            <div class="title">
                                <img width="50px;" style="margin-left: -50px;" height="50px" alt="" src="assets/images/item/{{$item['image']}}" data-echo="assets/images/item/{{$item['image']}}" /><br>
                                <a href="/products?ID={{$item['id']}}">{{$item['title']}}</a>
                            </div>
                            <div class="brand">{{$item['detail']}}</div>
                        </div>
                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">@ ${{$item['price']-($item['price']*$item['discount']/100)}}</div>
                        </div>
                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">${{$item['quantity']*($item['price']-($item['price']*$item['discount']/100))}}</div>
                        </div>
                    </div><!-- /.order-item -->
                     <?php endforeach ?>
                </form>
            </section><!-- /#your-order -->

            <div id="total-area" class="row no-margin">
                <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                    <div id="subtotal-holder">
                        <ul class="tabled-data inverse-bold no-border">
                            <li>
                                <label>cart subtotal</label>
                                <div class="value ">$<?php  echo  $sum ;?></div>
                            </li>
                            <li>
                                <label>shipping</label>
                                <div class="value">
                                    <div class="radio-group">
                                        <input class="le-radio" type="radio" name="group1" value="free"> <div class="radio-label bold">free shipping</div><br>
                                        <!-- <input class="le-radio" type="radio" name="group1" value="local" checked>  <div class="radio-label">local delivery<br><span class="bold">$15</span></div> -->
                                    </div>
                                </div>
                            </li>
                        </ul><!-- /.tabled-data -->

                        <ul id="total-field" class="tabled-data inverse-bold ">
                            <li>
                                <label>order total</label>
                                <div class="value">$<?php  echo  $sum ;?></div>
                            </li>
                        </ul><!-- /.tabled-data -->

                    </div><!-- /#subtotal-holder -->
                </div><!-- /.col -->
            </div><!-- /#total-area -->

            <div id="payment-method-options">
                <form>
                    <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="Direct">
                        <div class="radio-label bold ">Direct Bank Transfer<br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rutrum tempus elit, vestibulum vestibulum erat ornare id.</p>
                        </div>
                    </div><!-- /.payment-method-option -->
                    
                  <!--   <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="cheque">
                        <div class="radio-label bold ">cheque payment</div>
                    </div> -->
                    <!-- /.payment-method-option -->
                    
                    <!-- <div class="payment-method-option">
                        <input class="le-radio" type="radio" name="group2" value="paypal">
                        <div class="radio-label bold ">paypal system</div>
                    </div> -->
                    <!-- /.payment-method-option -->
                </form>
            </div><!-- /#payment-method-options -->
            
            <div class="place-order-button">
                <button class="le-button big" onclick="checkoutStore()">place order</button>
            </div><!-- /.place-order-button -->

        </div><!-- /.col -->
    </div><!-- /.container -->    
</section><!-- /#checkout-page -->
<!-- ========================================= CONTENT : END ========================================= -->
<script type="text/javascript">
    function displayAddress(){

        if(!document.getElementById('sa2').checked){
            document.getElementById('address2').style.display='none';
            document.getElementById('address2').value="";
        }else{
            document.getElementById('address2').style.display='block';
        }
    }

    function displayAddress(){

        if(!document.getElementById('sa2').checked){
            document.getElementById('address2').style.display='none';
            document.getElementById('address2').value="";
        }else{
            document.getElementById('address2').style.display='block';
        }
    }

    function checkoutStore(){
        // alert("aa");
        jQuery.ajax({
               type: 'get',
                url: '/checkout/store',
                dataType: 'html',
                data: {
                    'fullname' :document.getElementById("fullname").value,
                    'lastname' :document.getElementById("lastname").value,
                    'company' :document.getElementById("companyname").value,
                    'address' :document.getElementById("address").value,
                    'address2' :document.getElementById("address2").value,
                    'town' :document.getElementById("town").value,
                    'zipcode' :document.getElementById("Zipcode").value,
                    'email' :document.getElementById("email").value,
                    'phone' :document.getElementById("phone").value,
                    'payment' :0,
                    'id_cart' :""
                },
               success:function(response)
               {    
                    // console.log(response);
                    window.location = "/order?id="+response;
               }
           });
        // $.ajax({
        //         type: 'post',
        //         url: '/store',
        //         data: {
        //             'fullname' :"a",
        //             'lastname' :"a",
        //             'company' :"a",
        //             'address' :,
        //             'address2' :"a",
        //             'town' :"a",
        //             'zipcode' :"a",
        //             'email' :"a",
        //             'phone' :"a",
        //             'payment' :"a",
        //             'id_cart' :"a"
        //         },
        //         success: function(response)
        //         {
        //             console.log(response);
        //         },
        //     });
    }
</script>
@stop