<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from pages.revox.io/dashboard/latest/html/corporate/blank_template.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Apr 2024 10:27:32 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>@yield('title') - Admin Dashboard || {{config('company.company_name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" href="{{asset(config('company.app_favicon'))}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset(config('company.app_favicon'))}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset(config('company.app_favicon'))}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset(config('company.app_favicon'))}}">
    <link rel="icon" type="image/x-icon" href="{{asset(config('company.app_favicon'))}}" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="Content Management System for {{config('company.company_name')}}" name="description" />
    <meta content="Ace" name="author" />
    <link href="{{asset('plugins/pace/pace-theme-flash.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('plugins/jquery-scrollbar/jquery.scrollbar.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link class="main-stylesheet" href="{{asset('corporate.css')}}" rel="stylesheet" type="text/css" />
    <!-- Please remove the file below for production: Contains demo classes -->
    <link class="main-stylesheet" href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />

    @yield('custom-css')
  </head>
  <body class="fixed-header menu-pin menu-behind">
    <!-- BEGIN SIDEBPANEL-->
    <nav class="page-sidebar" data-pages="sidebar">
      <!-- BEGIN SIDEBAR MENU HEADER-->
      <div class="sidebar-header">
        <img src="{{asset(env('APP_LOGO_2'))}}" alt="logo" class="brand" data-src="{{asset(config('company.app_logo_2'))}}" data-src-retina="{{asset(config('company.app_logo_2'))}}" width="100">
        <div class="sidebar-header-controls">
        </div>
      </div>
      <!-- END SIDEBAR MENU HEADER-->

      <!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-20 ">
            <a href="{{ route('admin.index') }}" class="detailed">
              <span class="title">Dashboard</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-icon">home</i></span>
          </li>

          <li class="">
            <a href="{{ route('admin.upload') }}" class="">
              <span class="title">Upload Book (s)</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-icon">note</i></span>
          </li>

          <li>
            <a href="javascript:;"><span class="title">Settings</span>
            <span class=" arrow"></span></a>
            <span class="icon-thumbnail"><i class="pg-icon">cog</i></span>
            <ul class="sub-menu">
              <li class="">
                <a href="{{ route('admin.settings.company.info') }}">Company Information</a>
                <span class="icon-thumbnail"><i class="pg-icon">ci</i></span>
              </li>
              <li class="">
                <a href="{{ route('admin.settings.company.logo') }}">Company Logos</a>
                <span class="icon-thumbnail"><i class="pg-icon">co</i></span>
              </li>
              <li class="">
                <a href="{{ route('admin.settings.company.socials') }}">Social Media Handles</a>
                <span class="icon-thumbnail"><i class="pg-icon">sm</i></span>
              </li>
              <li class="">
                <a href="{{ route('admin.settings.company.smtp') }}">SMTP Configuration</a>
                <span class="icon-thumbnail"><i class="pg-icon">sc</i></span>
              </li>
            </ul>
          </li>
          
          <li class="">
            <a href="{{ route('admin.users') }}" class="detailed">
              <span class="title">Users</span>
            </a>
            <span class="icon-thumbnail"><i class="pg-icon">user</i></span>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->
    </nav>
    <!-- END SIDEBAR -->
    <!-- END SIDEBPANEL-->
    <!-- START PAGE-CONTAINER -->
    <div class="page-container ">
      <!-- START HEADER -->
      <div class="header ">
        <!-- START MOBILE SIDEBAR TOGGLE -->
        <a href="#" class="btn-link toggle-sidebar d-lg-none pg-icon btn-icon-link" data-toggle="sidebar">
      		menu</a>
        <!-- END MOBILE SIDEBAR TOGGLE -->
        <div class="">
          <div class="brand inline  m-l-10 ">
            <img src="{{asset(config('company.app_logo_1'))}}" alt="logo" data-src="{{asset(config('company.app_logo_1'))}}" data-src-retina="{{asset(config('company.app_logo_1'))}}" width="100">
          </div>
          <a href="#" class="search-link d-lg-inline-block d-none" data-toggle="search"><i
      				class="pg-icon">search</i>Type anywhere to <span class="bold">search</span></a>
        </div>
        <div class="d-flex align-items-center">
          <!-- START User Info-->
          <div class="dropdown pull-right d-lg-block d-none">
            <button class="profile-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="profile dropdown">
              <span class="thumbnail-wrapper d32 circular inline">
      					<img src="{{asset(Auth::user()->img==null ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : Auth::user()->img)}}" alt="" data-src="{{asset(Auth::user()->img==null ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : Auth::user()->img)}}"
      						data-src-retina="{{asset(Auth::user()->img==null ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : Auth::user()->img)}}" width="32" height="32">
      				</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
              <a href="#" class="dropdown-item"><span>Signed in as <br /><b>{{ Auth::user()->name }}</b></span></a>
              <div class="dropdown-divider"></div>
              <a href="{{route('admin.profile-edit')}}" class="dropdown-item">Your Profile</a>
              <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" class="dropdown-item" onclick="event.preventDefault();
                                      this.closest('form').submit();">Logout</a>
              </form>
              <div class="dropdown-divider"></div>
              <span class="dropdown-item fs-12 hint-text">Logged In: <br />{{Auth::user()->logged_in}}</span>
            </div>
          </div>
          <!-- END User Info-->
        </div>
      </div>
      <!-- END HEADER -->
      <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper ">
        <!-- START PAGE CONTENT -->
        <div class="content ">
          <!-- START CONTAINER FLUID -->
          <div class=" container-fluid   container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->

            @if (! request()->routeIs('admin.index'))
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url()->previous()}}">Back</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
            <!-- END BREADCRUMB -->
            @endif

            <div class="row">
              <div class="col-xl-8 col-lg-8"></div>
              <div class="col-xl-4 col-lg-4 ">@include('includes.alert-message')</div>
            </div>