@extends('layouts.home')

@section('content')

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
                  <li class="active">Kota Padang</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
       <!--work collections start-->
        <div id="work-collections">
            <div class="row">
                <div class="col s12 m12 l12">
                    <ul id="issues-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-action-history circle red darken-2"></i>
                            <span class="collection-header">Last 25 Events</span>
                            <p>Kota Padang</p>
                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s2">
                                    <p class="collections-title"> 7/24/2016 4:46 AM</p>
                                </div>
                                <div class="col s1">
                                    <span> <img src="materialize/images/Small-Up.gif"></span>
                                </div>
                                <div class="col s7">
                                    <p class="collections-content"> 1371 Kota Padang is responding again. Response time is 23 milliseconds. </p>
                               </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s2">
                                    <p class="collections-title"> 7/24/2016 4:46 AM</p>
                                </div>
                                <div class="col s1">
                                    <span> <img src="materialize/images/Small-Down.gif"></span>
                                </div>
                                <div class="col s7">
                                    <p class="collections-content">  1371 Kota Padang has stopped responding (Request Timed Out) </p>
                               </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s2">
                                    <p class="collections-title"> 7/22/2016 6:40 AM</p>
                                </div>
                                <div class="col s1">
                                    <span> <img src="materialize/images/Event-5001.gif"></span>
                                </div>
                                <div class="col s9  ">
                                    <p class="collections-content"> Node 1371 Kota Padang's packet loss has dropped from above 40% to below 5% and is currently 0 %. </p>
                               </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s2">
                                    <p class="collections-title"> 7/24/2016 4:46 AM</p>
                                </div>
                                <div class="col s1">
                                    <span> <img src="materialize/images/Event-5000.gif"></span>
                                </div>
                                <div class="col s7">
                                    <p class="collections-content"> Node 1371 Kota Padang has rebooted at Wednesday, July 20, 2016 2:49 PM. </p>
                               </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--work collections end-->
       <!--work collections start-->
        <div id="work-collections">
            <div class="row">
                <div class="col s12 m12 l7">
                    <ul id="issues-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-action-history circle red darken-2"></i>
                            <span class="collection-header">Event Summary</span>
                            <p>Kota Padang Last 12 MONTHS</p>
                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s1">
                                    <span> <img src="materialize/images/Small-Up.gif"></span>
                                </div>
                                <div class="col s1">
                                    <p class="collections-title"> 72</p>
                                </div>
                                <div class="col s5">
                                    <p class="collections-content">Node Up </p>
                               </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s1">
                                    <span> <img src="materialize/images/Small-Down.gif"></span>
                                </div>
                                <div class="col s1">
                                    <p class="collections-title"> 72</p>
                                </div>
                                <div class="col s5">
                                    <p class="collections-content">Alert Triggered </p>
                               </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s1">
                                    <span> <img src="materialize/images/Event-5000.gif"></span>
                                </div>
                                <div class="col s1">
                                    <p class="collections-title"> 72</p>
                                </div>
                                <div class="col s5">
                                    <p class="collections-content">Node Up </p>
                               </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s1">
                                    <span> <img src="materialize/images/Event-5001.gif"></span>
                                </div>
                                <div class="col s1">
                                    <p class="collections-title"> 72</p>
                                </div>
                                <div class="col s5">
                                    <p class="collections-content">Alert Reset </p>
                               </div>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!--work collections end-->


        <!--start container-->
        <div class="container">
          <div class="section">
            <p class="caption">Chart.js provides simple, responsive, clean and engaging charts for designers and developers.</p>
            <p><a href="http://www.chartjs.org/docs/#getting-started" class="btn waves-effect pink accent-2 white-text" target="_blank"></a>
            </p>

            <div class="divider"></div>
            <!--chartjs-->
            <div id="chartjs" class="section">
              <h4 class="header">Line Chart</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>A line chart is a way of plotting data points on a line. Often, it is used to show trend data, and the comparison of two data sets.</p>
                </div>
                <div class="col s12 m8 l9">
                  <div class="sample-chart-wrapper">
                    <canvas id="line-chart-sample" height="120"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="divider"></div>
            <!--Bar Chart-->
            <div id="chartjs-bar-chart" class="section">
              <h4 class="header">Bar Chart</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>A bar chart is a way of showing data as bars. It is sometimes used to show trend data, and the comparison of multiple data sets side by side.</p>
                </div>
                <div class="col s12 m8 l9">
                  <div class="sample-chart-wrapper">
                    <canvas id="bar-chart-sample" height="120"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="divider"></div>
            <!--Radar Chart-->
            <div id="chartjs-radar-chart" class="section">
              <h4 class="header">Radar Chart</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>A radar chart is a way of showing multiple data points and the variation between them.They are often useful for comparing the points of two or more different data sets.</p>
                </div>
                <div class="col s12 m8 l9">
                  <div class="sample-chart-wrapper">
                    <canvas id="radar-chart-sample" height="120"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="divider"></div>
            <!--Polar Area Chart-->
            <div id="chartjs-polor-chart" class="section">
              <h4 class="header">Polar Area Chart</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>Polar area charts are similar to pie charts, but each segment has the same angle - the radius of the segment differs depending on the value.</p>
                </div>
                <div class="col s12 m8 l9">
                  <div class="sample-chart-wrapper">
                    <canvas id="polar-chart-sample" height="120"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="divider"></div>
            <!--Pie & Doughnut Charts-->
            <div id="chartjs-pie-chart" class="section">
              <h4 class="header">Pie & Doughnut Charts</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>Pie and doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data.</p>
                </div>
                <div class="col s12 m8 l9">
                  <div class="row">
                    <div class="col s12 m6 l6">
                      
                      <div class="sample-chart-wrapper">
                        <canvas id="pie-chart-sample" ></canvas>
                      </div>
                      <p class="header center">Pie Charts</p>
                    </div>
                    <div class="col s12 m6 l6">
                      <div class="sample-chart-wrapper">
                        <canvas id="doughnut-chart-sample" ></canvas>
                      </div>
                      <p class="header center">Doughnut Charts</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->



    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    <!-- chartist -->
    <script type="text/javascript" src="materialize/js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!-- chartjs -->
    <script type="text/javascript" src="materialize/js/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="materialize/js/plugins/chartjs/chartjs-sample-chart.js"></script>


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="materialize/js/plugins.js"></script>

@endsection
