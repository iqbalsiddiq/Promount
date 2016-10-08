 
    <div class="row" style="margin-left: 10%; margin-right: 10%">
  <?php foreach ($newdeals as $item ): ?>  
     
    <div class = "col-sm-6 col-md-3" >
      <div class = "thumbnail" style="margin-bottom: -10px;">
         <a href="{{$item->url}}"><img src = "{{$item->image}}" alt = "Generic placeholder thumbnail"></a>
      </div>      
      <div class = "caption" style="background-color: rgba(0, 0, 0, 0.0470588)">
         <h4>{{$item->title}}</h4>
         <p>{{$item->detail}}</p> 
         <p>
            <a href = "#">
               {{$item->location}}
            </a> 
            
            <label>{{$item->price}}</label> 
         </p>
         
      </div>
   </div>
<?php endforeach ?> 
    </div>


 
 
