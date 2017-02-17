<?php

namespace App\Modules\User\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;  
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;  
use App\Modules\User\Model\Cart;
use App\Modules\User\Model\Order;
use Illuminate\Support\Facades\DB;


use View;

class CheckoutController extends PromountController {
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
       //  var_dump($_SESSION['idcart']);
        return view('User::pages/checkout');
    }

    // public function checkout2($id) {
    //       echo $this->id_cart;
    // }
    
    // public function displayOrder($id_cart){

    //     // theme styles
    //     $this->css['themes'] = [
    //     'assets/css/owl.carousel.css',
    //     'assets/css/owl.transitions.css',
    //     'assets/css/animate.min.css',
        
    //     'assets/css/font-awesome.min.css', 
    //     'assets/images/favicon.ico',
    //     'assets/css/main.css',
    //     'assets/css/green.css',


    //     ];

    //     // page level plugins
    //     $this->js['plugins'] = [
    //     'assets/js/gmap3.min.js',
    //     'assets/js/bootstrap-hover-dropdown.min.js',
    //     'assets/js/owl.carousel.min.js',
    //     'assets/js/css_browser_selector.min.js',
    //     'assets/js/echo.min.js',
    //     'assets/js/bootstrap-slider.min.js',
    //     'assets/js/jquery.raty.min.js',
    //     'assets/js/jquery.prettyPhoto.min.js',
    //     'assets/js/jquery.customSelect.min.js',
    //     'assets/js/wow.min.js',
         

    //     ];
        
    //     // page level scripts
    //     $this->js['scripts'] = [
    //         'assets/js/scripts.js'
    //     ];

    //     // pass variable to view
    //     View::share('css', $this->css);
    //     View::share('js', $this->js);
    //     View::share('title', 'Promount: Deal and Discount for Everything');  
    //    //  var_dump($_SESSION['idcart']);
    //     return view('User::pages/checkout2');
   
    // }
    public function Pay($id){
        
        // if(empty($_SESSION['idcart'])){
        //     $_SESSION['idcart']=array();
        // }
        // $s=count($_SESSION);
        // if(!in_array($id, $_SESSION['idcart'])){
        //     array_push($_SESSION['idcart'], $id);
        // }
        // var_dump($_SESSION['idcart']);
        // $e=count($_SESSION);
        // if($e>$s){
        //     return Redirect::back()->with('message','Operation Successful !');
        // }else{
        //     echo "<script>alert('failed add cart');</script>";
        //     return Redirect::back()->with('message','Operation Successful !'); 
        // }
    }

    public function store(Request $request)
    {
         $rand=substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,4);
        $this->id_cart=date_format(new \DateTime(),'YmdHis').$rand;
        
        $Carts=array();
        foreach ($_SESSION['cart'] as $c) {
           $Cart=[
               'title' => $c['title'],
               'detail' => $c['detail'],
               'price' => $c['price'],
               'quantity' => intval($c['quantity']),
               'discount' => $c['discount'],
               'image' => $c['image'],
               'id_cart' =>$this->id_cart
            ];
            array_push($Carts, $Cart); 
        };
        DB::table('cart')->insert($Carts);

        // $Order       = new Order;
        // $Order->fullname = $request->input('fullname');
        // $Order->lastname = $request->input('lastname');
        // $Order->company = $request->input('company');
        // $Order->address = $request->input('address');
        // $Order->address2 = $request->input('address2');
        // $Order->town = $request->input('town');
        // $Order->zipcode = $request->input('zipcode');
        // $Order->email = $request->input('email');
        // $Order->phone = $request->input('phone');
        // $Order->payment = $request->input('payment');
        // $Order->id_cart ="AA" ;

        $Order=[
            'fullname' => $request->input('fullname'),
            'lastname' => $request->input('lastname'),
            'company' => $request->input('company'),
            'address' => $request->input('address'),
            'address2' => $request->input('address2'),
            'town' => $request->input('town'),
            'zipcode' => $request->input('zipcode'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'payment' => $request->input('payment'),
            'id_cart' =>$this->id_cart
            ];

        // echo dump($Order);
        DB::table('order')->insert($Order);
        session_destroy();
        return $this->id_cart;
        // return redirect("/checkout/222");
        // header("Location: /order?id=".$id_cart)
    }
}
