<?php

namespace App\Modules\User\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;    
use View;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthenticationController extends PromountController {
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
        View::share('title', 'Sign in');
        
        return view('User::pages/authentication');
    }

    public function signup($email,$pass){   

        $user= User::create([
            'name' =>'',
            'email' => $email,
            'password' => $pass,
            'usertype' =>'member',
        ]);

        $_SESSION['userid']=$user->id;
        $_SESSION['useremail']=$email;
     
        if($user){
            return Redirect::back()->with('message','Operation Successful !');
        }
    }
     

    public function signin($email,$pass){     

        $users = DB::table('users')->where('email',$email)->where('password', $pass)->get();
        $count = DB::table('users')->where('email',$email)->where('password', $pass)->count();

        $email="";
        $id="";
        $name="";
        foreach ($users as $user)
        {
            $email=$user->email;
            $id=$user->id;
            $name=$user->name;
        } 
        if ($count>0) { 
            $_SESSION['email']=$email;
            $_SESSION['id']=$id;
            $_SESSION['name']=$name; 
            if(!empty($_SESSION['name'])){
                return redirect()->intended('/');
            }            
        }else{
            //return "Aa";
           //return Redirect::back()->with('error_code', 5);
            return Redirect::back();
        }
        //      return redirect()->intended('/');
        //     // return "<script>alert('Invalid Username or Password');</script>";
        // }
      
     
        // if($user){
        //     return Redirect::back()->with('message','Operation Successful !');
        // }else{
            
        // }
    }

    public function logout(){
        session_destroy();
        return redirect()->intended('/');;
    }


    public function test(){
        session_destroy();
        return  $_SESSION['name'];
    }
     
}
