<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="color-bg">
    
    <div class="container">
        <div class="row no-margin widgets-row">
            <div class="col-xs-12  col-sm-4 no-margin-left">
               @include('User::parts/widgets/footer.featured-products-footer',array('featuredf'=>DB::table('item')->where('featured','1')->skip(0)->take(3)->get()))
                
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                @include('User::parts/widgets/footer.on-sale-products-footer',array('onsale'=>DB::table('item')->where('sale','1')->skip(0)->take(3)->get()))
                
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-4 ">
                 @include('User::parts/widgets/footer.top-rated-products-footer',array('toprate'=>DB::table('item')->where('topdeals','1')->skip(0)->take(3)->get()))
                
            </div><!-- /.col -->

        </div><!-- /.widgets-row-->
    </div><!-- /.container -->

    <div class="sub-form-row">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2 no-padding">
                <form role="form">
                    <input placeholder="Subscribe to our newsletter">
                    <button class="le-button">Subscribe</button>
                </form>
            </div>
        </div><!-- /.container -->
    </div><!-- /.sub-form-row -->

    <div class="link-list-row">
        <div class="container no-padding">
            <div class="col-xs-12 col-md-4 ">
                @include('User::parts/widgets/footer.contact-info-footer')
            </div>

            <div class="col-xs-12 col-md-8 no-margin">
                @include('User::parts/widgets/footer.links-footer')
            </div>
        </div><!-- /.container -->
    </div><!-- /.link-list-row -->

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="copyright">
                    &copy; <a href="">Media Center</a> - all rights reserved
                </div><!-- /.copyright -->
            </div>
            <div class="col-xs-12 col-sm-6 no-margin">
                <div class="payment-methods ">
                    <ul>
                        <li><img alt="" src="assets/images/payments/payment-visa.png"></li>
                        <li><img alt="" src="assets/images/payments/payment-master.png"></li>
                        <li><img alt="" src="assets/images/payments/payment-paypal.png"></li>
                        <li><img alt="" src="assets/images/payments/payment-skrill.png"></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div><!-- /.container -->
    </div><!-- /.copyright-bar -->

</footer><!-- /#footer -->
<!-- ============================================================= FOOTER : END ============================================================= -->