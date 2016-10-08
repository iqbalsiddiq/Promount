<div id="slider" style="padding-right: -100px">
<?php foreach ($rightslider as $item ): ?>  
    <a href="#">
        <img src="{{$item->image}}" alt="Welcome to jQuery Slider" />
    </a>
<?php endforeach ?> 
</div> 
<div id="thumbs" style="background-color: white">
<?php foreach ($rightslider as $item ): ?>  
    <div class="thumb">
        <div class="frame"><img src="{{$item->thumb}}" /></div>
        <div class="thumb-content">{{$item->title}}</div>
        <div class="thumb-content">{{$item->price}}</div>
        <div style="clear:both;"></div>
    </div>
<?php endforeach ?> 
</div>


       
  
         