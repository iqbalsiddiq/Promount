<?php

namespace App\Modules\User\Controllers;

use View;
use Input;
use DB;

class ProductController extends PromountController {
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
        
        return view('User::pages/blog-post');
    }


    public function insertReview(){
        $name=Input::get('name');
        $email=Input::get('email');
        $rating=Input::get('rating');
        $review=Input::get('review'); 
        $iditem=Input::get('id'); 

        try{
        $values = array('name' => $name,'email' => $email,'rating' => $rating,'review' => $review,'iditem' => $iditem);

            DB::table('review')->insert($values);
            echo "Insert SUCCESS ";
        }catch (Exception $e){
            echo "Insert Failed ";

        }
    }
    
    public function selectReview($iditem){

    $id=Input::get('iditem');
    $item= DB::select("select * from item where iditem='$iditem';");

    return $item;

    }

    public function selectRating($iditem){

    $id=Input::get('iditem');
    $review= DB::select("SELECT round(sum(rating)/count(1)) FROM review where iditem='$iditem';");

    return $review;

    }

    // SELECT round(sum(rating)/count(1)) FROM `review` where iditem=1
}
