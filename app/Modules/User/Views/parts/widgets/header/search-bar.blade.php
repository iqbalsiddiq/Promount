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
            <ul class="animate-dropdown" style="
    display: inline-block; 
     border-top: 1px solid #e0e0e0;
    border-left: none;
    padding-top: 3px;
    padding-bottom: -10px;
      line-height: 44px;
  padding-left: 7px;
  display: inline-block;
  border-left: 1px solid #e0e0e0;
  text-transform: capitalize;

  left: -8px;
}
    appearance: none;">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" name="idcategory" id="idcategory" >Choose Category..</a>
                  <ul class="dropdown-menu" role="menu" >
                  <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:find(0,'All categories');">All categories</a></li>  
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


                        <li role="presentation"><a role="menuitem" tabindex="-1" href="javascript:find(<?php echo $category->id?>,'<?php echo $category->title?>');">{{$category->title}}</a></li>
                   <?php endforeach ?> 

                    </ul>
                    </li>

             
            </ul>
            <a class="search-button" onclick="searchUrl()">  </a>

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->
 
<!-- get category from db -->
 <?php 
 $categorys =DB::table('category')->get();
 $title="";
 foreach ($categorys as $category) {
   $title=$title .  $category->title . ",";
 }
   
?>

<script type="text/javascript">

getSelectedCategory();

function searchUrl(){
    var search= document.getElementById('search').value;
    var idcategory=window.location.href.split("idcategory=");
    var url ='find?search='+search+'&idcategory='+idcategory[1];
    window.location=url;
}

function getSelectedCategory(){
    var idcategory=window.location.href.split("idcategory=");

    if(idcategory.length>1){
    if (idcategory[1]==0){
        document.getElementById('idcategory').innerHTML="All Categories";
    }else{
    var categorys="<?php echo $title; ?>";
    var category=categorys.split(",");
    document.getElementById('idcategory').innerHTML= category[parseInt(idcategory[1])-1];
    }
}
}


    function find(idcategory,title) {
        var search= document.getElementById('search').value;
        
        // var idcategory= document.getElementById('idcategory').value;

        var url ='find?search='+search+'&idcategory='+idcategory;
        window.location = url;
        document.getElementById('idcategory').innerHTML=title;
    }
</script>
