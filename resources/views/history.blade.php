@extends('layouts.home')

@section('content')
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
                  <li class="active">{{$region}} {{$status}}</li>
                    <div class="switch right tooltipped" data-position="top" data-delay="10" data-tooltip="Status on">
                      <label>
                          Off
                        <input disabled type="checkbox" >
                        <span class="lever"></span>
                          On
                      </label>
                    </div>
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
                                <div class="col s2">
                                    <p class="collections-title"> {{ $list->created_at}}</p>
                                </div>
                                <div class="col s1">
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
                                <div class="col s7">
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
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}")}}"></script>

@endsection
