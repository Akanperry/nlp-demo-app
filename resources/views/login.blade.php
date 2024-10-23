<!DOCTYPE html>
<html lang="en">
  
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Admin Login - Nigeria Law Publishers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="{{asset('images/favicons/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset(config('company.app_favicon'))}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset(config('company.app_favicon'))}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset(config('company.app_favicon'))}}">
    <link rel="icon" type="image/x-icon" href="{{asset(config('company.app_favicon'))}}" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Content Management System for Nigeria Law Publishers Website" name="description" />
    <meta content="Ace" name="author" />
    <link href="{{asset('plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="{{asset('corporate.css')}}" rel="stylesheet" type="text/css" />
    
    <link class="main-stylesheet" href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
    window.onload = function()
    {
      // fix for windows 8
      if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
        document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{asset("pages/css/windows.chrome.fix.css")}}" />'
    }
    </script>
  </head>
  <body class="fixed-header menu-pin menu-behind">
    <div class="login-wrapper ">
      <!-- START Login Background Pic Wrapper-->
      <div class="bg-pic">
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
          <h1 class="semi-bold text-white">
					{{config('company.company_name')}}</h1>
          <p class="small">
          {{config('company.company_tagline')}}
          </p>
        </div>
        <!-- END Background Caption-->
      </div>
      <!-- END Login Background Pic Wrapper-->
      <!-- START Login Right Container-->
      <div class="login-container bg-white">
        <div class="p-l-50 p-r-50 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
          <!-- <img src="{{asset(config('company.app_logo_1'))}}" alt="logo" data-src="{{asset(config('company.app_logo_1'))}}" data-src-retina="{{asset(config('company.app_logo_1'))}}" width="150" > -->
          <h2 class="p-t-25">Welcome Back</h2>
          <p class="mw-80 m-t-5">Sign in to your account</p>
          
          @include('includes.alert-message')
          
          <!-- START Login Form -->
          <form id="form-login" class="p-t-15" role="form" action="{{route('login')}}" method="post">
            @csrf
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Login</label>
              <div class="controls">
                <input type="email" name="email" placeholder="email" value="{{ old('email') }}" class="form-control" required>
              </div>
              @error('email')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <!-- END Form Control-->
            <!-- START Form Control-->
            <div class="form-group form-group-default">
              <label>Password</label>
              <div class="controls">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Credentials" required>
              </div>
              @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <!-- START Form Control-->
            <div class="row">
              <div class="col-md-6 no-padding sm-p-l-10">
                <div class="form-check">
                  <input type="checkbox" value="1" id="checkbox1" name="remember_me">
                  <label for="checkbox1">Remember me</label>
                </div>
              </div>
              <div class="col-md-6 d-flex align-items-center justify-content-end">
                <button aria-label="" class="btn btn-primary btn-lg m-t-10" type="submit">Sign in</button>
              </div>
            </div>
            <div class="m-b-5 m-t-30">
              <a href="#" class="normal">Lost your password?</a>
            </div>
            <!-- END Form Control-->
          </form>
          <!--END Login Form-->
          <div class="pull-bottom sm-pull-bottom">
            <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
              <div class="col-sm-9 no-padding m-t-10">
                <p class="small-text normal hint-text">
                  ©{{date('Y', strtotime('today'))}} All Rights Reserved. Pages® is a registered trademark of Nigeria Law Publishers.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END Login Right Container-->
    </div>
   
    <!-- BEGIN VENDOR JS -->
    <script src="{{asset('plugins/pace/pace.min.js')}}" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{asset('plugins/liga.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/modernizr.custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/popper/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-actual/jquery.actual.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/classie/classie.js')}}"></script>
    <script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <!-- END VENDOR JS -->
    <script src="{{asset('pages/js/pages.min.js')}}"></script>
    <script>
    $(function()
    {
      $('#form-login').validate()
    })
    </script>
  </body>


</html>