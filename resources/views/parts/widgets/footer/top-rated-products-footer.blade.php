<!-- ============================================================= TOP RATED PRODUCTS ============================================================= -->
<div class="widget">
    <h2>Top Rated Products</h2>
    <div class="body">
        <ul>
             @foreach ($toprate as $item )
            <li>
                <div class="row">
                    <div class="col-xs-12 col-sm-9 no-margin">
                       <a href="/products?ID={{$item->id}}">{{$item->title}}</a>
                        <div class="price">
                            <div class="price-prev">{{$item->price}}</div>
                            <div class="price-current">{{$item->price-($item->price*$item->discount/100)}}</div>
                        </div>
                    </div>  

                    <div class="col-xs-12 col-sm-3 no-margin">
                        <a href="#" class="thumb-holder">
                            <img alt="" src="{{$assetUrl}}assets/images/item/{{$item->image}}" data-echo="{{$assetUrl}}assets/images/item/{{$item->image}}" />
                        </a>
                    </div>
                </div>
            </li>
         @endforeach
        </ul>
    </div><!-- /.body -->
</div><!-- /.widget -->
<!-- ============================================================= TOP RATED PRODUCTS : END ============================================================= -->