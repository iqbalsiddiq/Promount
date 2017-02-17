<?php

namespace App\Modules\User\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;   
use Illuminate\Support\Facades\DB;

use View;

class CartController extends PromountController {
    /*
      |--------------------------------------------------------------------------
      | DashboardController
      |--------------------------------------------------------------------------
     */

    public function __construct() {
        session_start();
        parent::__construct();

        $this->setApp();

    }

    /**
     * Show the application dashboard screen to the user.
     *
     * @return Response
     */
    public function index() {
        
       // theme styles
        $this->css['themes'] = [
        'assets/css/owl.carousel.css',
        'assets/css/owl.transitions.css',
        'assets/css/animate.min.css',
        
        'assets/css/font-awesome.min.css', 
        'assets/images/favicon.ico',
        'assets/css/main.css',
        'assets/css/green.css',


        ];

        // page level plugins
        $this->js['plugins'] = [
        'assets/js/gmap3.min.js',
        'assets/js/bootstrap-hover-dropdown.min.js',
        'assets/js/owl.carousel.min.js',
        'assets/js/css_browser_selector.min.js',
        'assets/js/echo.min.js',
        'assets/js/bootstrap-slider.min.js',
        'assets/js/jquery.raty.min.js',
        'assets/js/jquery.prettyPhoto.min.js',
        'assets/js/jquery.customSelect.min.js',
        'assets/js/wow.min.js',
         

        ];
        
        // page level scripts
        $this->js['scripts'] = [
            'assets/js/scripts.js'
        ];

        // pass variable to view
        View::share('css', $this->css);
        View::share('js', $this->js);
        View::share('title', 'Promount: Deal and Discount for Everything');
        // echo dump($_SESSION['cart']);
        // 
        // session_destroy();
        return view('User::pages/cart');
        // unset($_SESSION['cart'][0]);
        // echo substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10/strlen($x)) )),1,10);
    }

    
    public function addCart($id,$quantity){ 
        $cart = array();    
        $status=false;
        if(empty($_SESSION['cart'])){            
            $_SESSION['cart']=array();
            $title="";
            $discount="";
            $price="";
            $detail="";
            $image="";
            $items = DB::table('item')
                       ->where('id', $id)->get();
            foreach ($items as $item) {
                $title=$item->title;
                $discount=$item->discount;
                $price=$item->price;
                $detail=$item->detail;
                $image=$item->image;   
            }

            $cart['id'] = $id; 
            $cart['quantity'] = $quantity;
            $cart['title'] = $title; 
            $cart['discount'] = $discount;
            $cart['price'] = $price; 
            $cart['detail'] = $detail;
            $cart['image'] = $image;
            
            array_push($_SESSION['cart'], $cart);
            $status=true;
        }else{ 
            $check=array();

            foreach($_SESSION['cart'] as $product){
                array_push($check,$product['id'] );
            }
            
            if(in_array($id, $check)){ 
                $x=0;
                foreach($_SESSION['cart'] as $product){
                     if($id==$product['id']){
                        echo $_SESSION['cart'][$x]['id'];
                        $_SESSION['cart'][$x]["quantity"]++;
                        $status=true;
                        break;
                     }
                $x++;
                }               
            }else{
                $title="";
                $discount="";
                $price="";
                $detail="";
                $image="";
                $items = DB::table('item')
                           ->where('id', $id)->get();
                foreach ($items as $item) {
                    $title=$item->title;
                    $discount=$item->discount;
                    $price=$item->price;
                    $detail=$item->detail;
                    $image=$item->image;   
                }

                $cart['id'] = $id; 
                $cart['quantity'] = $quantity;
                $cart['title'] = $title; 
                $cart['discount'] = $discount;
                $cart['price'] = $price; 
                $cart['detail'] = $detail;
                $cart['image'] = $image;

                array_push($_SESSION['cart'], $cart);
                $status=true;
               
            }
                 
        }
        // if(!in_array($id, $_SESSION['cart'])){
        //     array_push($_SESSION['cart'], $cart);
        // }
      // var_dump($_SESSION['cart']);
        // $tes=array();
        // foreach($_SESSION['cart'] as $data){
        //         array_push($tes, 1);    
        // }
         
        
        // var_dump($tes);
       
      //  session_destroy();
        //echo $_SESSION['cart'][0]["id"];
       // unset($_SESSION['cart'][0]);
      //=== 
        if($status){
            return Redirect::back()->with('message','Operation Successful !');
        }else{
            echo "<script>alert('failed add cart');</script>";
             return Redirect::back()->with('message','Operation Successful !');
        }
       
         
    }

     public function minCart($id,$quantity){
        $cart = array();    
        $status=false;        
        $check=array();

        foreach($_SESSION['cart'] as $product){
            array_push($check,$product['id'] );
        }
            
        if(in_array($id, $check)){ 
        $i=0;
            foreach($_SESSION['cart'] as $product){
                if($id==$product['id']){
                    $_SESSION['cart'][$i]["quantity"]--; 
                    if($_SESSION['cart'][$i]["quantity"]==0){
                        unset($_SESSION['cart'][$i]);
                        $temp=array_values($_SESSION['cart']);
                        $_SESSION['cart']=$temp;
                    }  
                     $status=true;
                }
                $i++;
            } 
        }           
        if($status){
            return Redirect::back()->with('message','Operation Successful !');
        }else{
            echo "<script>alert('failed add cart');</script>";
             return Redirect::back()->with('message','Operation Successful !');
        }
       //  var_dump($_SESSION['cart']);
    }

     public function Delitem($id,$quantity){
        $cart = array();    
        $status=false;        
        $check=array();
        foreach($_SESSION['cart'] as $product){
            array_push($check,$product['id'] );
        }    
        if(in_array($id, $check)){ 
        $i=0;          
        foreach($_SESSION['cart'] as $product){
                if($id==$product['id']){
                   unset($_SESSION['cart'][$i]);   
                    $status=true;
                }
                $i++;
            } 
        }           
        if($status){
            return Redirect::back()->with('message','Operation Successful !');
        }else{
            return Redirect::back()->with('message','Operation Successful !');
        } 
        
    }
}
