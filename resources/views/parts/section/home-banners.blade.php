<!-- ========================================= HOME BANNERS ========================================= -->
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="col-xs-12 col-lg-6 no-margin banner">
            <a href="index.php?page=category-grid-2">
                <div class="banner-text theblue">
                    <?php
                    $NewCategory = DB::table('category')->orderBy('timestamp', 'desc')->first();
                    echo "<h1>".$NewCategory->title."</h1>";
                    ?>
                    <span class="tagline"><b>Introducing New Category</b></span>
                </div>
                <img style="opacity: 0.5" class="banner-image > alt="" src=<?php echo "assets/images/category/".$NewCategory->image;?> data-echo=<?php echo "assets/images/category/".$NewCategory->image;?> />
            </a>
        </div>
        <div class="col-xs-12 col-lg-6 no-margin text-right banner">
            <a href="index.php?page=category-grid-2">
                <div class="banner-text right">
                    <?php
                    $NewItem = DB::table('category')->orderBy('timestamp', 'desc')->first();
                    echo "<h1>".$NewItem->title."</h1>";
                    ?>
                    <span class="tagline"><b>Checkout new arrivals Item</b></span>
                </div>
               <img style="opacity: 0.5" class="banner-image > alt="" src=<?php echo "assets/images/category/".$NewCategory->image;?> data-echo=<?php echo "assets/images/category/".$NewCategory->image;?> />
            
            </a>
        </div>
    </div><!-- /.container -->
</section><!-- /#banner-holder -->
<!-- ========================================= HOME BANNERS : END ========================================= -->