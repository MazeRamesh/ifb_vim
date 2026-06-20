<html ng-app lang="en">
<head>
    <meta charset="utf-8">
    <title>{{config('app.company_name')}} | VIM</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/fontawesome.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&display=swap" rel="stylesheet">

    <link href="{{ asset('css/css/layouts/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
</head>
<body>

<!-- <div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <center>
                <a href="http://www.mazeworkssolutions.com/" target="_blank" class="brand-link bg-white elevation-1" >
                <img src="{{ asset('img/forfill/maze_logo_horizontal.jpg') }}" alt="Brand Logo"  width="200">
                </a>
                <br>
                <br>
                <div ng-controller="slideShowController" class="imageslide" ng-switch='slideshow' ng-animate="'animate'">
                <div class="slider-content" ng-switch-when="1">
                <img src="{{ asset('img/forfill/forfill_1.PNG') }}" alt="Brand Logo" height="400"  width="300">
                </div>
                <div class="slider-content form-group" ng-switch-when="2">
                <img src="{{ asset('img/forfill/forfill_2.PNG') }}" alt="Brand Logo" height="400" width="300">
                </div>
                <div class="slider-content form-group" ng-switch-when="3">
                <img src="{{ asset('img/forfill/forfill_3.PNG') }}" alt="Brand Logo" height="400" width="300">
                </div>
                <div class="slider-content form-group" ng-switch-when="4">
                <img src="{{ asset('img/forfill/forfill_4.PNG') }}" alt="Brand Logo" height="400" width="300">
                </div>
                </div>
            </center>
        </div>
        <div class="col-md-6 login-form-2">
            <h3><b>Vendor</b> Invoice Management System</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                <input id="email" type="text" class="form-control" placeholder="User name Or Email *" name="email" value="{{ old('email') }}" required autofocus />
                </div>
                <div class="form-group">
                <input id="password" type="password" class="form-control" placeholder="Your Password *" name="password" required />
                </div>
                <div class="form-group">
                <input type="submit" class="btnSubmit" value="Login" />
                </div>
                <div class="form-group">
                <a href="#ForgetPwd" id="ForgetPwd" class="ForgetPwd" value="Login">Forget Password?</a>
                </div>
            </form>
        </div>
    </div>
</div> -->
<div class="w3layouts-two-grids">
    <div class="mid-class">
        <div class="txt-left-side">
            <h2> Welcome !</h2>
                        <form action="{{ route('login') }}" method="POST">
                 @csrf
                {{-- <div class="form-left-to-w3l">
                    <span><i class="fas fa-envelope"></i></span>
                    <input id="email" type="text" class="form-control" style="border-radius:24px;color:black;" placeholder="Your Email *" name="email" value="{{ old('email') }}" required >
                    <div class="clear"></div>
                </div> --}}
                <div class="form-left-to-w3l" style="border-radius:24px;background:#E8F0FE;">
                    <span><i class="fas fa-envelope" style="color:#005BEA;margin-left:10px;opacity:0.5;"></i></span>
                    <input id="email" type="text" class="form-control"   style="border-radius:24px;color:black;" placeholder="Your Email *" name="email" value="{{ old('email') }}" required >

                </div>
                <div class="form-left-to-w3l " style="border-radius:24px;background:#E8F0FE;">
                    <span> <i class="fas fa-user-lock"style="color:#005BEA;margin-left:10px;opacity:0.5;"></i></span>
                    <input id="password" type="password" class="form-control"  style="border-radius:24px;color:black;" placeholder="Your Password *" name="password" required>
                    <div class="clear"></div>
                </div>
                {{-- <div class="form-left-to-w3l ">
                    <span> <i class="fas fa-user-lock"></i></span>
                    <input id="password" type="password" class="form-control" placeholder="Your Password *" name="password" required>
                    <div class="clear"></div>
                </div> --}}
               <!--  <div class="main-two-w3ls">
                    <div class="right-side-forget">
                        <a href="#ForgetPwd" id="ForgetPwd" class="for">Forgot password...?</a>
                    </div>
                </div> -->
                <div class="btnn">
                    <a href="#"><button  type="submit"style="color:#005BEA;margin-left:10px;border-radius:24px;" class="submit">Login </button></a>
                </div>
            </form>
        </div>
        <div class="img-right-side" style="padding-left: 10px;padding-right:10px;">
            <h2 style="   font-size: 40px;font-family: 'Antic Slab', serif;">Vendor Invoice Management System</h2>
        <img src="{{asset('/img/Logo.jpg')}}" class="img w-75 m-4" alt="">
            {{-- <h3 style="color: #181E70;">{{config('app.company_name')}}</h3> --}}
        </div>
    </div>
</div>
</body>

    <script>

function slideShowController($scope, $timeout) {
 var slidesInSlideshow = 4;
 var slidesTimeIntervalInMs = 7000;

  $scope.slideshow = 1;
  var slideTimer =
    $timeout(function interval() {
      $scope.slideshow = ($scope.slideshow % slidesInSlideshow) + 1;
      slideTimer = $timeout(interval, slidesTimeIntervalInMs);
    }, slidesTimeIntervalInMs);
}


$('#ForgetPwd').on('click',function()
{
	alert("Please Contact Us \n sale@mazeworkssolutions.com (or) 8778966951");
}
);
    </script>
</html>


















