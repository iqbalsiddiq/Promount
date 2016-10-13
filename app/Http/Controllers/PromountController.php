<?php

namespace App\Http\Controllers;

use View;

class PromountController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Blankon Controller
      |--------------------------------------------------------------------------
      |
     */

    // url for asset outside folder laravel
    public $assetUrl;
    // global css
    public $css = [];
    // global js
    public $js = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->setApp();
    }

    /**
     * initialize blankon
     */
    public function setApp() {
        
        $this->assetUrl = config('constant.assetUrl');

        // set global mandatory css
        $this->css = [
            'globals' => [
            'assets/css/bootstrap.min.css',
            
            ]
        ];

        $this->js = [
            'cores' => $this->getCoresJs(),
        ];

        // pass variable to view
        View::share('assetUrl', $this->assetUrl);
        View::share('title', 'Promount');
        View::share('css', $this->css);
        View::share('js', $this->js);
    }

    /**
     * get js core scripts
     * @return array blankon's core javascript plugins 
     */
    private function getCoresJs() {
    return [
        'assets/js/jquery-1.10.2.min.js',
        'assets/js/jquery-migrate-1.2.1.js',
        'assets/js/bootstrap.min.js',
        'assets/js/jquery.easing-1.3.min.js',
        ];
    }

    /**
     * get Internet Explorer plugin
     * @return array javascript plugins for IE
     */
    private function getIesJs() {
        return [
           'assets/js/html5shiv.js',
            'assets/js/respond.min.js'
        ];
    }

}
