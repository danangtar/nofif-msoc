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
    <link rel="icon" href="{{asset("images/favicon/favicon-32x32.png")}}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{asset("images/favicon/apple-touch-icon-152x152.png")}}">
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
            <div class="col s12 m6 l5">
                <ul id="task-card" class="collection with-header">
                    <li class="collection-header cyan">
                        <h4 class="task-card-title">34 Kantor PROVINSI</h4>
                        <p class="task-card-date">NO GROUPING APPLIED</p>
                    </li>
                    <li class="collection-item dismissable">
                        <div class="treeview">
                            <ul class="tree hoverable"> 
                                @foreach ($provinsi as $list)
                                    <li><img src="<?php
                                        if($list->status == 1) echo asset('materialize/images/Small-Down.gif');
                                        else echo asset('materialize/images/Small-Up.gif');
                                        ?>" alt="materialize logo">
                                            <span class="folder"> <a href="{{url("history/".$list->id)}}"> {{$list->id}} {{$list->name}}</a></span></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="col s12 m6 l6">
                <ul id="task-card" class="collection with-header">
                    <li class="collection-header cyan">
                        <h4 class="task-card-title">508 Kantor DUKCAPIL</h4>
                        <p class="task-card-date">GROUPED BY PROVINSI</p>
                    </li>
                    <li class="collection-item">
                        <div class="listControl">
                            <a class="expandList">Expand All</a>
                            <a class="collapseList">Collapse All</a>
                        </div>
                        <ul class="expList">
                            @foreach($provinsi as $list)
                            <li> <span class="folder" style="white-space: nowrap;"><img src="<?php
                                    if($kabstat[$list->id] == 1) echo asset('materialize/images/Small-Up.gif');
                                    else if ($kabstat[$list->id] == 2) echo asset('materialize/images/Small-Down.gif');
                                    else echo asset('materialize/images/Small-Warning.gif');
                                    ?>" alt="materialize logo">{{$list->name}}</span>
                                    <?php if(!empty($kabupaten[$list->id])){?>
                                    <ul class="tree hoverable">
                                        @foreach($kabupaten[$list->id] as $rows)
                                            <li><img src="<?php
                                                if($rows->status == 1) echo asset('materialize/images/Small-Down.gif');
                                                else echo asset('materialize/images/Small-Up.gif');
                                                ?>" alt="materialize logo"><span class="folder">  <a onclick="location.href='{{url("history/".$rows->id)}}'">{{$rows->id}} {{$rows->name}}</span>
                                            </li>
                                                         
                                        @endforeach
                                    </ul><?php }?>
                            </li>
                            @endforeach
                        </ul>
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
               Copyright © 2016 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">Materialize</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://notif-msoc.esy.es/">Materialize</a></span>
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