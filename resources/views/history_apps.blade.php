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


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
    <link href="{{asset("materialize/css/prism.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("materialize/js/plugins/chartist-js/chartist.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("materialize/js/plugins/data-tables/css/jquery.dataTables.min.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{asset("materialize/js/plugins/jvectormap/jquery-jvectormap.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
  

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
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("materialize/js/scripts.js")}}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
        $('select').material_select();

    });
    </script>
            
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
        $('select').material_select();
        //Pie Doughnut Chart
        var PieDoughnutChartSampleData = [
            {
                value: {{$count[0]}},
                color:"#ff3d00 ",
                highlight: "#FF5A5E",
                label: "Node Down"
            },
            {
                value: {{$count[1]}},
                color: "#1de9b6  ",
                highlight: "#1de9b6",
                label: "Node Up"
            }
        ]

         window.onload = function() {
            window.PieChartSample = new Chart(document.getElementById("pie-chart-sample").getContext("2d")).Pie(PieDoughnutChartSampleData,{
               responsive:true
            });
         };
    });
    </script>

      <!-- START CONTENT -->
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                
                  <h5 class="breadcrumbs-title">History</h5>
                
                  <ol class="breadcrumb">
                  <li><a href="">Dashboard</a>
                  </li>
                  <li><a href="">History</a>
                  </li>
                  <li class="active">{{$region}}</li>
                  
                  </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->     
          
        <!--start container-->
        <div class="container">
          <div class="section">
            <div class="divider"></div>
            <!--Pie & Doughnut Charts-->
            <div id="chartjs-pie-chart" class="section">
              <h4 class="header">Statistics at region {{$region}}</h4>
              <div class="row">
                <div class="col s12 m8 l12">
                  <div class="row">
                    <div class="col s12 m6 l6"> 
                       <!--work collections start-->
                        <div id="work-collections">
                            <div class="row">
                                <div class="col s12 m12 l12">
                                    <ul id="issues-collection" class="collection">
                                        <li class="collection-item avatar">
                                            <i class="mdi-action-history circle red darken-2"></i>
                                            <span class="collection-header">Event Summary</span>
                                            <p>{{$region}} Last 12 MONTHS</p>
                                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                        </li>
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col s1">
                                                    <span> <img src="{{asset("materialize/images/Small-Up.gif")}}"></span>
                                                </div>
                                                <div class="col s1">
                                                    <p class="collections-title"> {{$count[1]}}</p>
                                                </div>
                                                <div class="col s4">
                                                    <p class="collections-content">Node Up </p>
                                               </div>
                                            </div>
                                        </li>
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col s1">
                                                    <span> <img src="{{asset("materialize/images/Small-Down.gif")}}"></span>
                                                </div>
                                                <div class="col s1">
                                                    <p class="collections-title"> {{$count[0]}}</p>
                                                </div>
                                                <div class="col s4">
                                                    <p class="collections-content">Node Down </p>
                                               </div>
                                            </div>
                                        </li>
                                        <li class="collection-item">
                                            <div class="row">
                                                <div class="col s1">
                                                    <span> <img src="{{asset("materialize/images/Event-5000.gif")}}"></span>
                                                </div>
                                                <div class="col s1">
                                                    <p class="collections-title"> {{$count[2]}}</p>
                                                </div>
                                                <div class="col s4">
                                                    <p class="collections-content">Alert Report</p>
                                               </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--work collections end-->
                    </div>
                      <div class="col s12 m6 l6">

                      <div class="sample-chart-wrapper">
                        <canvas id="pie-chart-sample" ></canvas>
                      </div>
                      <p class="header center">Statistic History Last Year</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!--end container-->

          
       <!--work collections start-->
        <div id="work-collections">
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul id="issues-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-action-history circle red darken-2"></i>
                            <span class="collection-header">Last 25 Events</span>
                            <p>{{$region}}</p>
                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        @foreach ($result->slice(0, 25)  as $list)
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s4 m2 l2">
                                    <p class="collections-title"> {{ $list->created_at}}</p>
                                </div>
                                <div class="col s2 m2 l1">
                                    <span> <img
                                                <?php if($list->id_reports!=NULL){ ?>
                                                src="{{asset("materialize/images/Event-5000.gif")}}"
                                                <?php }elseif($list["on/off"]==1){?>
                                                src="{{asset("materialize/images/Small-Up.gif")}}"
                                                <?php }else {?>
                                                src="{{asset("materialize/images/Small-Down.gif")}}"
                                                <?php } ?>
                                        ></span>
                                </div>
                                <div class="col s6 m8 l7">
                                    <p class="collections-content">
                                        <?php if($list->id_reports!=NULL){?>
                                            {{$list->id_region}} {{$list->name}} report is "{{$reports[$list->id_reports]}}"
                                        <?php }elseif($list["on/off"]==1){?>
                                            {{$list->id_region}} {{$list->name}} is responding again.
                                        <?php }else {?>
                                            {{$list->id_region}} {{$list->name}} has stopped responding.
                                        <?php } ?>
                                    </p>
                               </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <!--work collections end-->

      </section>
      <!-- END CONTENT -->



 



    <!-- ================================================
    Scripts
    ================================================ -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{asset("materialize/js/materialize.min.js")}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>

    <!-- chartist -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartist-js/chartist.min.js")}}"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chart.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chartjs-sample-chart.js")}}"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>

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

        </body>

</html>