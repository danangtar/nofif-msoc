@extends('layouts.home')

@section('content')
   
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
<!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/material-datetime-picker-master/dist/js/datepicker.js")}}"></script>    -->
<!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/pickadate.js-3.5.6/lib/picker.date.js")}}"></script>    -->


<script type="text/javascript">
    $( document ).ready(function() {
        $('select').material_select();

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
        var PieDoughnutChartSampleData = [
            {
                value: 60,
                color:"#ff3d00 ",
                highlight: "#FF5A5E",
                label: "Node Down"
            },
            {
                value: 50,
                color: "#1de9b6  ",
                highlight: "#1de9b6",
                label: "Node Up"
            },
            {
                value: 800,
                color: "#ffea00  ",
                highlight: "#ffff00 ",
                label: "Alert Report"
            }
        ]
        //Pie Doughnut Chart2
        var PieDoughnutChartSampleData2 = [
            {
                value: 60,
                color:"#ff3d00 ",
                highlight: "#FF5A5E",
                label: "Node Down"
            },
            {
                value: 50,
                color: "#1de9b6  ",
                highlight: "#1de9b6",
                label: "Node Up"
            },
            {
                value: 800,
                color: "#ffea00  ",
                highlight: "#ffff00 ",
                label: "Alert Report"
            }
        ]
/*
Polor Chart Widget
*/
 
var doughnutData = [
	{
		value: 3000,
		color:"#F7464A",
		highlight: "#FF5A5E",
		label: "Mobile"
	},
	{
		value: 500,
		color: "#46BFBD",
		highlight: "#5AD3D1",
		label: "Kitchen"
	},
	{
		value: 1000,
		color: "#FDB45C",
		highlight: "#FFC870",
		label: "Home"
	}

];

window.onload = function(){
    
//            window.PieChartSample = new Chart(document.getElementById("pie-chart-sample").getContext("2d")).Pie(PieDoughnutChartSampleData,{
//               responsive:true
//            });
//	        window.PieChartSample = new Chart(document.getElementById("pie-chart-sample2").getContext("2d")).Pie(PieDoughnutChartSampleData2,{
//               responsive:true
//            });
    
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
                <div class="divider"></div>    
                <!--start container-->
                <div class="container">
                <!--card widgets start-->
                    <div id="card-widgets" class="seaction">
                      <div class="row">
                         <!-- right-->
                         <div class="col s6 m6 l12">
                            <div id="task-card" class="collection with-header">
                                <div class="collection-header cyan">
                                    <h5 class="task-card-title center">Statistic History Last Year</h5>
                                </div>
                                <br>
                                <div class="col s12 m6 l6">                                    
                                    <div class="sample-chart-wrapper">
                                        <div class="col s12 m3 l10">
                                            <div id="doughnut-chart-wrapper">
                                                <canvas id="doughnut-chart" height="200"></canvas>
                                                <div class="doughnut-chart-status">4500
                                                    <p class="ultra-small center-align">Sold</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col s12 m2 l2">
                                            <ul class="doughnut-chart-legend">
                                                <li class="mobile ultra-small"><span class="legend-color"></span>Mobile</li>
                                                <li class="kitchen ultra-small"><span class="legend-color"></span> Kitchen</li>
                                                <li class="home ultra-small"><span class="legend-color"></span> Home</li>
                                            </ul>
                                        </div>        
<!--                                        <canvas id="pie-chart-sample" ></canvas>-->
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
                                                        <select name="month1">
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
                                                            <label>Month</label>
                                                            </div>
                                                        <div class="input-field col s6 m6 l6">
                                                            <select name="year1">
                                                            <option>2010</option>
                                                            <option>2011</option>
                                                            <option>2012</option>
                                                            <option>2013</option>
                                                            <option>2014</option>
                                                            <option>2015</option>
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                            <option>2019</option>
                                                        </select>
                                                        <label>Year</label>
                                                        </div>
                                                    </div>

                                                    </div>
                                                    <div id="year">
                                                        <div class="input-field col s12 m12 l12">
                                                            <select name="year2">
                                                                <option>2010</option>
                                                                <option>2011</option>
                                                                <option>2012</option>
                                                                <option>2013</option>
                                                                <option>2014</option>
                                                                <option>2015</option>
                                                                <option>2016</option>
                                                                <option>2017</option>
                                                                <option>2018</option>
                                                                <option>2019</option>
                                                            </select>
                                                            <label>Year</label>
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
                                </div>
                                <div class="col s12 m6 l6"> 
                                   <!--work collections start-->
                                    <div id="work-collections">
                                        <div class="col s12 m12 l12">
                                            <ul id="issues-collection" class="collection">
                                                <li class="collection-item avatar">
<!--                                                    <i class="small mdi-action-history circle red darken-2"></i>-->
                                                    <span class="collection-header">Event Summary</span>
                                                    <p>Detail Events</p>
                                                    <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                                </li>
                                                <li class="collection-item">
                                                    <div class="row">
                                                        <div class="col s2">
                                                            <span> <img src="{{asset("materialize/images/Small-Up.gif")}}"></span>
                                                        </div>
                                                        <div class="col s2">
                                                            <p class="collections-title"> 500</p>
                                                        </div>
                                                        <div class="col s8">
                                                            <p class="collections-content">Node Up </p>
                                                       </div>
                                                    </div>
                                                </li>
                                                <li class="collection-item">
                                                    <div class="row">
                                                        <div class="col s2">
                                                            <span> <img src="{{asset("materialize/images/Small-Down.gif")}}"></span>
                                                        </div>
                                                        <div class="col s2">
                                                            <p class="collections-title"> 1000</p>
                                                        </div>
                                                        <div class="col s8">
                                                            <p class="collections-content">Node Down </p>
                                                       </div>
                                                    </div>
                                                </li>
                                                <li class="collection-item">
                                                    <div class="row">
                                                        <div class="col s2">
                                                            <span> <img src="{{asset("materialize/images/Event-5000.gif")}}"></span>
                                                        </div>
                                                        <div class="col s2">
                                                            <p class="collections-title"> 200</p>
                                                        </div>
                                                        <div class="col s8">
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
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chart-script.js")}}"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/sparkline/jquery.sparkline.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("materialize/js/plugins/sparkline/sparkline-script.js")}}"></script>

    <!-- chartist -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartist-js/chartist.min.js")}}"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>

@endsection
