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
            <input class="search-field" placeholder="Search for item" name="search" style="width:350px;" id="search" />
            <ul class="categories-filter animate-dropdown">
                <!-- <li class="dropdown"> 
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="index.php?page=category-grid">all categories</a> 
                 -->    <!-- <ul class="dropdown-menu" role="menu" > -->
                    <select class="form-control" style=" -moz-appearance: none;width: 170px; overflow: hidden;   appearance: none;" name="idcategory" onchange="find()" id="idcategory">
                     <option value="0" class="dropdown" >All Categories</option> 
                    <?php
                        $categorys =DB::table('category')->get();
                        $s=array();
                        $i=0;
                        foreach ($categorys as $category ): 
                        $s[$i]="";
                        if(array_key_exists('idcategory', $_GET)){        
                            if($_GET['idcategory']==$category->id){
                                $i++;
                                $s[$i]="selected";
                            }
                        }

                    ?>
                        <!-- <li role="presentation"><input name="idcategory" value="1" style="display: none;">dsada</li> -->
                        <option value="{{$category->id}}" class="dropdown" {{$s[$i]}}>{{$category->title}}</option> 
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
 
<script type="text/javascript">
    function find() {
        var search= document.getElementById('search').value;
        var idcategory= document.getElementById('idcategory').value;
        var url ='find?search='+search+'&idcategory='+idcategory;
        window.location = url;
    }
</script>
