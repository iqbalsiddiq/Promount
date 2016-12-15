<?php

namespace App\Modules\User\Controllers;

use View;

class CategoryController extends PromountController {
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
        
        return view('User::pages/category');
    }

    

}
