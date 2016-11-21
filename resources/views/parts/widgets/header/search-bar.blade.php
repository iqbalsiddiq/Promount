<div class="contact-row">
    <div class="phone inline">
        <i class="fa fa-phone"></i> (+800) 123 456 7890
    </div>
    <div class="contact inline">
        <i class="fa fa-envelope"></i> contact@<span class="le-color">oursupport.com</span>
    </div>
</div><!-- /.contact-row -->
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form method="GET" action="find">
        <div class="control-group">
            <input class="search-field" placeholder="Search for item" name="search" style="width:350px;" " />
            <ul class="categories-filter animate-dropdown">
                <!-- <li class="dropdown"> 
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="index.php?page=category-grid">all categories</a> 
                 -->    <!-- <ul class="dropdown-menu" role="menu" > -->
                    <select class="search-field" style="width: 150px;" name="idcategory">
                    <?php
                        $categorys =DB::table('category')->get();
                        foreach ($categorys as $category ):          
                    ?>
                        <!-- <li role="presentation"><input name="idcategory" value="1" style="display: none;">dsada</li> -->
                        <option value="{{$category->id}}" class="dropdown" >{{$category->title}}</option> 
                    <?php endforeach ?> 
                    <!-- </ul> -->
                    </select>
                <!-- </li> -->
            </ul>
            <a class="search-button" href="#" onclick="$(this).closest('form').submit()">  </a>

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->