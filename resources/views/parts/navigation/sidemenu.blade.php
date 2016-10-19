<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown">
    <div class="head"><i class="fa fa-list"></i> all Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
            <?php
            $AllCategory = DB::table('category')
                     ->join('item', 'category.id', '=', 'item.idcategory')
                     ->select(DB::raw('count(item.id) as sum, category.title as titles'))
                     ->groupBy('category.title')
                     ->get();  
            foreach ($AllCategory as $item ):          
            ?>
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$item->titles}} <small>({{$item->sum}})</small></a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        
                        @include('parts/navigation.megamenu-vertical')
        <!--content-->
                    </li>
                </ul>
            </li><!-- /.menu-item --> 
           <?php endforeach ?> 
           
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->