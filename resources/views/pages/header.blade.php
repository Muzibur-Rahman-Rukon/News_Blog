@extends('master')
@section('header')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>পর্ব বাংলা</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Bootstrap News Template - Free HTML Templates" name="keywords">
        <meta content="Bootstrap News Template - Free HTML Templates" name="description">

        <!-- Favicon -->
        <link href="{{URL::to('public/img/favicon.ico')}}" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet"> 

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{URL::to('public/lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{URL::to('public/lib/slick/slick-theme.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{URL::to('public/css/style.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Top Bar Start -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="tb-contact">
                            <p><i class="fas fa-envelope"></i>info@mail.com</p>
                            <p><i class="fas fa-phone-alt"></i>+012 345 6789</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="tb-menu">
                            <a href="{{URL::to('/')}}">About</a>
                            <a href="{{URL::to('/')}}">Privacy</a>
                            <a href="{{URL::to('/')}}">Terms</a>
                            <a href="{{URL::to('/')}}">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar Start -->
        
        <!-- Brand Start -->
        <div class="brand">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="b-logo">
                            <a href="https://www.grameenphone.com/bn">
                                <img style="height: 100%;width: 80%" src="{{URL::to('public/img/images.jpg')}}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <?php 
                        foreach ($allAdvertisement as $ad) {
                            # code...
                        
                         ?>
                        <div class="b-ads">
                            <a href="https://htmlcodex.com">
                                <img src="{{ asset($ad->img) }}" alt="Ads" style="height: 100px;width: 600px">
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="b-search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{URL::to('/')}}" class="nav-item nav-link">হোম</a>
                            <?php 
                             
                             foreach ($all_active_category_for_nav as $nav) {
                                 # code...
                             

                             ?>
                            <a href="{{URL::to('/page_by_category',$nav->id)}}" class="nav-item nav-link"><?php echo $nav->cat_name ?></a>
                            
                               
                        <?php } ?>
                        </div>
                        <div class="social ml-auto">
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-facebook-f"></i></a>
                            <a href=""><i class="fab fa-linkedin-in"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-youtube"></i></a>
                           
                        </div>
                         <div class="navbar-nav">
                            <?php 
                            if (Session::get('user_id')) {
                                # code...
                            
                             ?>
                            <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        
                        <!-- start: Notifications Dropdown -->
                        
                        <!-- end: Notifications Dropdown -->
                        <!-- start: Message Dropdown -->
                        
                        
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> {{Session::get('user_name')}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                               
                                <li><a href="{{URL::to('/logoutUser')}}"><i class="halflings-icon off"></i> 
                                <center>
                                Logout
                            </center></a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                            <?php }else{ ?>
                            <a href="{{URL::to('/userRegister')}}" class="nav-item nav-link">Register</a>
                            <a href="{{URL::to('/userLogin')}}" class="nav-item nav-link">Login</a>
                        <?php } ?>
                            
                               
                       
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        @endsection