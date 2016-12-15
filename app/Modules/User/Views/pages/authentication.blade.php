<!-- ========================================= BREADCRUMB ========================================= -->
@extends('User::layout.lay_home')

<!-- START @PAGE CONTENT -->
@section('content')
<div id="top-mega-nav">
    <div class="container">
        <nav>
            <ul class="inline">
                <li class="dropdown le-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-list"></i> shop by department
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Computer Cases & Accessories</a></li>
                        <li><a href="#">CPUs, Processors</a></li>
                        <li><a href="#">Fans, Heatsinks &amp; Cooling</a></li>
                        <li><a href="#">Graphics, Video Cards</a></li>
                        <li><a href="#">Interface, Add-On Cards</a></li>
                        <li><a href="#">Laptop Replacement Parts</a></li>
                        <li><a href="#">Memory (RAM)</a></li>
                        <li><a href="#">Motherboards</a></li>
                        <li><a href="#">Motherboard &amp; CPU Combos</a></li>
                        <li><a href="#">Motherboard Components</a></li>
                    </ul>
                </li>

                <li class="breadcrumb-nav-holder"> 
                    <ul>
                        <li class="breadcrumb-item">
                            <a href="index.php?page=home">Home</a>
                        </li>
                        <li class="breadcrumb-item current gray">
                            <a href="index.php?page=about">Authentication</a>
                        </li>
                    </ul>
                </li><!-- /.breadcrumb-nav-holder -->
            </ul>
        </nav>
    </div><!-- /.container -->
</div><!-- /#top-mega-nav -->
<!-- ========================================= BREADCRUMB : END ========================================= -->
<!-- ========================================= MAIN ========================================= -->

<main id="authentication" class="inner-bottom-md">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6">
				<section class="section sign-in inner-right-xs">
					<h2 class="bordered">Sign In</h2>
					<p>Hello, Welcome to your account</p>

					<div class="social-auth-buttons">
						<div class="row">
							<div class="col-md-6">
								<button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
							</div>
							<div class="col-md-6">
								<button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
							</div>
						</div>
					</div> 
					<form role="form" class="login-form cf-style-1" action="#" >
						<div class="field-row">
                            <label>Email</label>
                            <input type="text" class="le-input" id="Emailsignin" >
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Password</label>
                            <input type="text" class="le-input" id="Passwordsignin" >
                        </div><!-- /.field-row -->

                        <div class="field-row clearfix">
                        	<span class="pull-left">
                        		<label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
                        	</span>
                        	<span class="pull-right">
                        		<a href="#" class="content-color bold">Forgotten Password ?</a>
                        	</span>
                        </div>

                        <div class="buttons-holder">
                            <button  class="le-button huge" onclick="signin()" >Secure Sign In</button>
                        </div><!-- /.buttons-holder -->
					</form><!-- /.cf-style-1 -->

				</section><!-- /.sign-in -->
			</div><!-- /.col -->

			<div class="col-md-6">
				<section class="section register inner-left-xs">
					<h2 class="bordered">Create New Account</h2>
					<p>Create your own Media Center account</p>

					<form role="form"  class="register-form cf-style-1" action="#">
						<div class="field-row">
                            <label>Email</label>
                            <input type="email" class="le-input"  id="email1">
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Password</label>
                            <input type="Password" class="le-input" id="p1">
                            <i id="cpass" style="display: none;color: red"></i>
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label>Confirm Password</label>
                            <input type="Password" class="le-input" onchange="confirm()" id="p2">
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <button class="le-button huge" onclick="signup()">Sign Up</button>
                        </div><!-- /.buttons-holder -->
					</form>

					<h2 class="semi-bold">Sign up today and you'll be able to :</h2>

					<ul class="list-unstyled list-benefits">
						<li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
						<li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
						<li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
					</ul>

				</section><!-- /.register -->

			</div><!-- /.col -->

		</div><!-- /.row -->
	</div><!-- /.container -->
</main><!-- /.authentication -->
<script type="text/javascript">
    function confirm() { 
        var a= document.getElementById('p1').value;
        var b= document.getElementById('p2').value;
        if(a!=b){
            document.getElementById('cpass').style.display="block";
            document.getElementById('cpass').innerHTML="Password not valid";
        }else{
            document.getElementById('cpass').style.display="none";
            document.getElementById('cpass').innerHTML="";
        }
    }

    function signin(){
        var email= document.getElementById('Emailsignin').value;
        var pass= document.getElementById('Passwordsignin').value;
        url="/signin/signin/"+email+"/"+pass;  
        //alert(url);
        window.location = url;
    }
    function signup(){
        var email= document.getElementById('email1').value;
        var pass= document.getElementById('p1').value;
        url="/signin/signup/"+email+"/"+pass;
        window.location = url;
    }
</script>

<!-- ========================================= MAIN : END ========================================= -->
@stop 