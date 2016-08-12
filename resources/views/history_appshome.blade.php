
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
 <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

            
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
        $('select').material_select();
        
    });
    </script>

      <!-- START CONTENT -->
      <section id="content">
  
          
        <!--start container-->
        <!--end container-->

          
       <!--work collections start-->
        <div id="work-collections">
            <div class="row"><br>
              <div class="divider"></div>
                <div class="col s12 m12 l7">
                    <ul id="issues-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-action-history circle red darken-2"></i>
                            <span class="collection-header">Last 25 Events</span>
                            <p>All</p>
                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        @foreach ($result  as $list)
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

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer red lighten-1">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2015 <a class="grey-text text-lighten-4" href="http://themeforest.net/user/geekslabs/portfolio?ref=geekslabs" target="_blank">GeeksLabs</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://geekslabs.com/">GeeksLabs</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->

       </body>   <!-- Start Page Loading -->
  

</html>
