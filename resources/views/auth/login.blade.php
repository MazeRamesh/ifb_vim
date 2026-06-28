<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.company_name')}} | VIM</title>
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}?v={{ time() }}" rel="stylesheet">
    <link href="{{asset('assets/css/fontawesome.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Antic+Slab&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">
    <!-- Login Form Side -->
    <div class="login-form-side">
        <h2>Welcome Back</h2>
        <p class="subtitle">Please sign in to access your VIM account</p>
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group-custom">
                <div class="input-container {{ $errors->has('email') ? 'has-error' : '' }}">
                    <span class="input-icon"><i class="fas fa-envelope"></i></span>
                    <input id="email" type="text" class="form-input" placeholder="Your Email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback-custom" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group-custom">
                <div class="input-container {{ $errors->has('password') ? 'has-error' : '' }}">
                    <span class="input-icon"><i class="fas fa-user-lock"></i></span>
                    <input id="password" type="password" class="form-input" placeholder="Your Password" name="password" required>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback-custom" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <button type="submit" class="submit-btn">Login</button>
            
            <div style="text-align: center; margin-top: 1.5rem;">
                <a href="#ForgetPwd" id="ForgetPwd" style="color: var(--text-muted); text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: color 0.2s;" onmouseover="this.style.color='var(--primary-color)'" onmouseout="this.style.color='var(--text-muted)'">Forgot password?</a>
            </div>
        </form>
    </div>
    
    <!-- Branding Side -->
    <div class="login-brand-side">
        <h3>Vendor Invoice Management System</h3>
        <div class="brand-logo-container">
            <img src="{{ asset('assets/img/IFB.jpg') }}" alt="IFB Logo">
        </div>
    </div>
</div>

<script>
$('#ForgetPwd').on('click', function(e) {
    e.preventDefault();
    alert("Please Contact Us \n sale@mazeworkssolutions.com");
});
</script>
</body>
</html>
