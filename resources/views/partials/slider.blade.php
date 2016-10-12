   <ul> 
@<?php foreach ($item as $slide ): ?>
       <!-- SLIDE  -->
                <li data-index="rs-{{$slide->id}}" data-transition="fade" data-slotamount="7"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="{{$slide->thumb}}"  data-rotate="0"  data-saveperformance="off"  data-title="The Healthy Bowl" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="{{$slide->image}}"  alt="..."  data-bgposition="center center" data-bgfit="contain" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption FoodCarousel-Content   tp-resizeme"
                         id="{{$slide->image}}"
                         data-x="center" data-hoffset=""
                         data-y="center" data-voffset=""
                         data-width="['420']"
                         data-height="['420']"
                         data-transform_idle="o:1;"

                         data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:800;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:500;"
                         data-start="bytrigger"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"

                         data-end="bytrigger"
                         data-lasttriggerstate="reset"
                         style="z-index: 5; min-width: 420px; max-width: 420px; max-width: 420px; max-width: 420px; white-space: normal;"><span class="foodcarousel-headline">{{$slide->title}}</span><br/>
                        <hr  style="border-top: 1px solid #292e31;">
                        {{$slide->detail}} <a href="{{$slide->url}}" target="_blank">Slider Revolution</a>.
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption FoodCarousel-Button rev-btn "
                         id="slide-{{$slide->id}}-layer-1"
                         data-x="center" data-hoffset=""
                         data-y="bottom" data-voffset="50"
                         data-width="['auto']"
                         data-height="['auto']"
                         data-transform_idle="o:1;"
                         data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                         data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(41, 46, 49, 1.00);cursor:pointer;"

                         data-transform_in="opacity:0;s:300;e:Power3.easeInOut;"
                         data-transform_out="opacity:0;s:300;s:300;"
                         data-start="0"
                         data-splitin="none"
                         data-splitout="none"
                         data-actions='[{"event":"click","action":"startlayer","layer":"slide-{{$slide->id}}-layer-3","delay":""},{"event":"click","action":"startlayer","layer":"slide-{{$slide->id}}-layer-5","delay":"200"},{"event":"click","action":"stoplayer","layer":"slide-{{$slide->id}}-layer-1","delay":""}]'
                         data-responsive_offset="on"
                         data-responsive="off"
                         data-lasttriggerstate="reset"
                         style="z-index: 6; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><i class="pe-7s-note2" style="font-size: 21px; float: left;margin-top:-6px;margin-right:10px;"></i> VIEW PROMO
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption FoodCarousel-CloseButton rev-btn  tp-resizeme"
                         id="slide-{{$slide->id}}-layer-5"
                         data-x="441"
                         data-y="110"
                         data-width="['auto']"
                         data-height="['auto']"
                         data-transform_idle="o:1;"
                         data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;"
                         data-style_hover="c:rgba(255, 255, 255, 1.00);bg:rgba(41, 46, 49, 1.00);cursor:pointer;"

                         data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:800;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:500;"
                         data-start="bytrigger"
                         data-splitin="none"
                         data-splitout="none"
                         data-actions='[{"event":"click","action":"stoplayer","layer":"slide-{{$slide->id}}-layer-3","delay":""},{"event":"click","action":"stoplayer","layer":"slide-{{$slide->id}}-layer-5","delay":""},{"event":"click","action":"startlayer","layer":"slide-{{$slide->id}}-layer-1","delay":""}]'
                         data-responsive_offset="on"

                         data-end="bytrigger"
                         data-lasttriggerstate="reset"
                         style="z-index: 7; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><i class="fa-icon-remove"></i>
                    </div>
                </li> 
<?php endforeach ?> 
</ul>