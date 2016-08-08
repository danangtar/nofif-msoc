@extends('layouts.home')

@section('content')
    <?php
    $color_ = array('#8c9eff',  '#00e676', '#ffcdd2', '#ff1744', '#ffeb3b', '#d81b60 ', '#880e4f ', '#e1bee7',   '#6a1b9a', '#aa00ff', '#651fff', '#9575cd', '#ede7f6'   ,'#1565c0', '#29b6f6' , '#80d8ff ', '#00acc1',   '#84ffff', '#b2dfdb', '#009688', '#64ffda', '#c8e6c9', '#76ff03', '#dce775 ', '#f4ff81 ',   '#f57f17', '#ffecb3', '#ffa000', '#e65100', '#fbe9e7', '#ff6e40', '#d7ccc8', '#8d6e63 ', '#4e342e ', '#f5f5f5',   '#bdbdbd', '#616161', '#212121', '#004d40', '#4527a0');
    $highlight_= array('#c5cae9 ','#69f0ae ','#ffebee', '#ff5252', '#fff59d','#e91e63','#ad1457 ', '#f3e5f5',   '#8e24aa', '#d500f9', '#7c4dff', '#b39ddb ', '#f3e5f5'  ,'#1565c0', '#29b6f6' , '#80d8ff ', '#00acc1',   '#84ffff', '#b2dfdb', '#009688', '#64ffda', '#c8e6c9', '#76ff03', '#dce775 ', '#f4ff81 ',   '#f57f17', '#ffecb3', '#ffa000', '#e65100', '#fbe9e7', '#ff6e40', '#d7ccc8', '#8d6e63 ', '#4e342e ', '#f5f5f5',   '#bdbdbd', '#616161', '#212121', '#004d40', '#4527a0');

    echo "<style>";
    for ($x = 0; $x < 40; $x++) {
        echo "li.color$x:before {
                background: $color_[$x];
            }";
        }
    echo "</style>";

    ?>
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/material-datetime-picker-master/dist/js/datepicker.js")}}"></script>    -->
    <!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/pickadate.js-3.5.6/lib/picker.date.js")}}"></script>    -->


    <script type="text/javascript">

        $( document ).ready(function() {
            $('select').material_select();

            <?php if ($result==NULL || $result->first()==NULL) echo "$('#diagram').hide(); $('#nodata').show();"; else echo "$('#diagram').show(); $('#nodata').hide();"; ?>
            $('#day').hide();
            $('#month').hide();
            $('#year').hide();

            $('input[type=radio][name=dayselect]').change(function() {
                if (this.value == '0') {
                    $('#day').show();
                    $('#month').hide();
                    $('#year').hide();
                }
                else if (this.value == '1') {
                    $('#day').hide();
                    $('#month').show();
                    $('#year').hide();
                }else if (this.value == '2') {
                    $('#day').hide();
                    $('#month').hide();
                    $('#year').show();
                }

            });

            $('.datepicker').pickadate({

                labelMonthNext: 'Go to the next month',
                labelMonthPrev: 'Go to the previous month',
                labelMonthSelect: 'Pick a month from the dropdown',
                labelYearSelect: 'Pick a year from the dropdown',
                selectYears: true,
                selectMonths: true,
                format: 'dd/mm/yyyy'
                //DISABLE MONTH
                //DISABLE DAY
//            disable: [
//                0,1,2,3,4,5,6
//            ]
            })
            $('#datepicker').find('.ui-picker__nav--prev').remove();
        });
    </script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('select').material_select();
            //Pie Doughnut Chart
            /*
             Polor Chart Widget
             */

            var doughnutData = [
                    <?php if($result!=NULL){ $i=0; ?>
                    @foreach($result as $list)
                {
                    value: "{{$list->total}}",
                    color:"{{$color_[$i]}}",
                    highlight: "{{$highlight_[$i]}}",
                    label: "{{$list->description}}"
                },
                <?php $i++ ?>
                @endforeach
                <?php } ?>
            ];

            window.onload = function(){

                var doughnutChart = document.getElementById("doughnut-chart").getContext("2d");
                window.myDoughnut = new Chart(doughnutChart).Doughnut(doughnutData, {
                    segmentStrokeColor : "#fff",
                    tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label
                    percentageInnerCutout : 50,
                    animationSteps : 100,
                    segmentStrokeWidth : 4,
                    animateScale: true,
                    percentageInnerCutout : 60,
                    responsive : true
                });


            };

        });
    </script>

    <!-- START CONTENT -->
    <section id="content">
    <div class="container">
            
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Statistics</h5>
                <ol class="breadcrumb">
                  <li><a href="">Dashboard</a>
                  </li>
                  <li><a href="">Statistics</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->  
        
        <div class="divider"></div>
        <!--start container-->
            <!--card widgets start-->
            <div id="card-widgets" class="seaction">
                <div class="row">
                    <!-- right-->
                    <div class="col s12 m12 l12">
                        <div id="task-card" class="collection with-header">
                            <div class="collection-header cyan">
                                <h5 class="task-card-title center">Statistic History {{$title}}</h5>
                            </div>
                            <br>
                            <div class="col s12 m12 l12" id="diagram">
                                <div class="sample-chart-wrapper">
                                    <div class="col s12 m12 l7">
                                        <div id="doughnut-chart-wrapper">
                                            <canvas id="doughnut-chart" height="200"></canvas>
<!--
                                            <div class="doughnut-chart-status">4500
                                                <p class="ultra-small center-align">Sold</p>
                                            </div>
-->
                                        </div>
                                    </div>
                                    <div class="col s12 m12 l5">
                                        <ul class="doughnut-chart-legend">
                                            <?php if($result!=NULL){ $x=0 ?>
                                            @foreach($result as $list)
                                                <li class="color{{$x}}  small"><span class="legend-color"></span>{{$list->description}}</li>
                                            <?php $x++?>
                                            @endforeach
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <!--                                        <canvas id="pie-chart-sample" ></canvas>-->
                                </div>
                            </div>
                            <div class="col s12 m12 l12" id="nodata">
                                <h3 class="center">Sorry no data displayed...</h3>
                            </div>
                            <!-- Form with validation -->
                            <div class="col s12 m12 l12">
                                <div class="card-panel">
                                    <div class="row">
                                        <form class="col s12" action="{{url('search_statistic')}}" method="post">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="mdi-image-timer  prefix"></i>
                                                    <input disabled id="disabled" type="text" class="validate">
                                                    <label for="disabled">Select time statistic preview</label>
                                                    <br>
                                                    <div>
                                                        <input class="with-gap" name="dayselect" value="0" type="radio" id="test1" />
                                                        <label  style=" display: inline-block;"for="test1">Day</label>
                                                        <input class="with-gap" name="dayselect" value="1" type="radio" id="test2" />
                                                        <label  style=" display: inline-block;" for="test2">Month</label>
                                                        <input class="with-gap" name="dayselect" value="2" type="radio" id="test3" />
                                                        <label  style=" display: inline-block;" for="test3">Year</label>
                                                    </div><br>
                                                    <div id="day">
                                                      <input name="date0" type="date" class="datepicker">
                                                    </div>
                                                    <div id="month">
                                                        <div class="input-field col s6 m6 l6">
<!--                                                            <label>Month</label>-->
                                                            <select name="month1" class="browser-default">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                                <option>6</option>
                                                                <option>7</option>
                                                                <option>8</option>
                                                                <option>9</option>
                                                                <option>10</option>
                                                                <option>11</option>
                                                                <option>12</option>
                                                            </select>
                                                        </div>
                                                        <div class="input-field col s6 m6 l6">
<!--                                                            <label>Year</label>-->
                                                            <select name="year1" class="browser-default">
                                                                <option>2012</option>
                                                                <option>2013</option>
                                                                <option>2014</option>
                                                                <option>2015</option>
                                                                <option>2016</option>
                                                                <option>2017</option>
                                                                <option>2018</option>
                                                                <option>2019</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div id="year">
                                                    <div class="input-field col s12 m12 l12">
<!--                                                        <label>Year</label>-->
                                                        <select name="year2" class="browser-default">
                                                                <option>2012</option>
                                                                <option>2013</option>
                                                                <option>2014</option>
                                                                <option>2015</option>
                                                                <option>2016</option>
                                                                <option>2017</option>
                                                                <option>2018</option>
                                                                <option>2019</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn cyan waves-effect waves-light center" type="submit" name="action">Search
                                                <i class="mdi-content-send right"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- form end here-->

                            <!--work collections end-->
                        </div>
                    </div>
                </div>
            </div>
            <!--card widgets end-->
        </div>
        <!-- end container-->
    </section>
    <!-- END CONTENT -->

    <!-- jQuery Library -->
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <!--materialize js-->
    <script type="text/javascript" src="{{asset("materialize/js/materialize.js")}}"></script>
    <!--prism-->
    <script type="text/javascript" src="{{asset("materialize/js/prism.js")}}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chart.min.js")}}"></script>
<!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chart-script.js")}}"></script>-->

    <!-- sparkline -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("materialize/js/plugins/sparkline/sparkline-script.js")}}"></script>

    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>

@endsection
