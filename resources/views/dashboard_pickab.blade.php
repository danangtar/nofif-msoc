<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Materialize - Material Design Admin Template</title>

    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->

    
   <!-- CORE CSS-->
    <link href="{{asset("materialize/css/materialize.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("materialize/css/style.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
 

</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">


            <!-- //////////////////////////////////////////////////////////////////////////// -->
 
            <!-- START CONTENT -->
             <!-- START CONTENT -->
    <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Dashboard</h5>
                    <!-- Modal Alert -->
                    <div id="modal3" class="modal">
                        <div class="modal-content">
                            <p>Are you sure to alert all region?</p>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                            <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
                        </div>
                    </div><br>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->     
            
        <!--card widgets start-->
        <div id="card-widgets">
        <div class="row">            
            <div class="col s12 m6 l6">
                <ul id="task-card" class="collection with-header">
                    <li class="collection-header cyan">
                        <h4 class="task-card-title">Provinsi {{$provinsi->name}}</h4>
                        <p class="task-card-date">Kabupaten {{$kabupaten->name}}</p>
                    </li>
                     <li class="collection-item dismissable">
                        <div class="treeview">
                            <ul class="tree hoverable">
                        
                                    <li><img src="<?php
                                        if($kabupaten->status == 1) echo asset('materialize/images/Small-Down.gif');
                                        else echo asset('materialize/images/Small-up-unknown-noblink.gif');
                                        ?>" alt="materialize logo">
                                        <span class="folder"> <a href="{{url("history/".$kabupaten->id)}}"> {{$kabupaten->id}} {{$kabupaten->name}}</a><span <?php if($kabupaten->status == 0) {?>
                                                        class="btn btn-small waves-effect waves-light green new badge green"> ON
                                                <?php }else {?>
                                                        class="btn btn-small waves-effect waves-light red new badge red"> OFF
                                                <?php }?>
                                    </span></span></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

      
    </section>

 <!-- END CONTENT -->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

    <!-- ================================================
    Scripts
    ================================================ -->
    
   
    <!-- jQuery Library -->
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("materialize/js/scripts.js")}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{asset("materialize/js/materialize.min.js")}}"></script>
    
   
   
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>
    </body>

</html>