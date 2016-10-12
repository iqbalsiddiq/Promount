@extends('layouts.lay_home')

<!-- START @PAGE CONTENT -->
@section('content')
 <!-- START @PRELOADER -->
            <div id="loader-wrapper">
                <div class="loader-brand">
                    <div class="sk-double-bounce">
                        <div class="sk-child sk-double-bounce1"></div>
                        <div class="sk-child sk-double-bounce2"></div>
                    </div>
                    <div class="loader-text">
                        PROMOUNT
                    </div>
                </div>
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
            </div><!-- /#loader-wrapper -->
<!-- START @BANNER -->
<section id="banner">
    <div id="rev_slider_108_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="food-carousel80" style="margin:0px auto;background-color:#eef0f1;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.0.7 fullwidth mode -->
        <div id="rev_slider_108_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
        @include('partials.slider',array('item'=>DB::table('item')->skip(0)->take(6)->get()))

        <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div><!-- END REVOLUTION SLIDER -->
</section> <!-- /#banner -->
<!--/ END BANNER -->
    <div class="row">
        <div class="col-lg-12 text-center" style="height: 30px"></div>
        <div class="col-lg-2 text-center">     
        </div>
        <div class="col-lg-2 text-center">
        ----------------------------------
        <br>
        ## Explore
        <br>
        ----------------------------------
        <br>
        @include('partials.category',array('categories'=>DB::table('category')
                         ->join('item', 'category.id', '=', 'item.idcategory')
                         ->select(DB::raw('count(item.id) as sum, category.title as titles'))
                         ->groupBy('category.title')
                         ->get()))      
        </div>    
          @include('partials.exclusive',array('items'=>DB::table('item')->orderByRaw("RAND()")->where('exclusive', '1')->get()))      
        </div>
        <div class="col-lg-2 text-center">     
        </div> 
        <div class="col-lg-12 text-left" style="margin-left: 10%"> <h3>New Deals</h3><a href="#"> view all</a>  
        </div>  
         @include('partials.newdeals',array('newdeals'=>DB::table('item')->orderByRaw("RAND()")->where('newdeals', '1')->skip(0)->take(4)->get()))     
        <div class="col-lg-12 text-left" style="margin-left: 10%"> <h3>Top Deals For You</h3><a href="#"> view all</a>  
        </div>  
          @include('partials.topdeals',array('topdeals'=>DB::table('item')->orderByRaw("RAND()")->where('topdeals', '1')->skip(0)->take(4)->get())) 
        <div class="col-lg-2 text-center">     
        </div>
        @include('partials.rightslider',array('rightslider'=>DB::table('item')->where('mostwanted', '1')->orderBy('id', 'asc')->skip(0)->take(4)->get()))  
        <div class="col-lg-2 text-center">     
        </div>
        <div class="col-lg-12 text-left" style="margin-left: 20% "> <h3>Top Pick</h3><a href="#"> view all</a>  
        </div>  
         @include('partials.toppick',array('toppick'=>DB::table('item')->where('toppick', '1')->orderBy('id', 'asc')->skip(0)->take(3)->get()))  
        <div class="col-lg-12 text-left"> <label></label><a href="#"></a>  
    <!-- Start footer content -->
    @include('layouts.footer-home')
    <!--/ End footer content -->

</section><!-- /#page-content -->
@stop
<!--/ END PAGE CONTENT -->
