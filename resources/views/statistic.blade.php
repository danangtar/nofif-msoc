@extends('layouts.home')

@section('content')
   
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
<!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/material-datetime-picker-master/dist/js/datepicker.js")}}"></script>    -->
<!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/pickadate.js-3.5.6/lib/picker.date.js")}}"></script>    -->

<script type="text/javascript">
    $( document ).ready(function() {
        $('select').material_select();
 
        $('.datepicker').pickadate({
 
            labelMonthNext: 'Go to the next month',
            labelMonthPrev: 'Go to the previous month',
            labelMonthSelect: 'Pick a month from the dropdown',
            labelYearSelect: 'Pick a year from the dropdown',
            selectYears: true,
            selectMonths: false,
            //DISABLE MONTH
    
            //DISABLE DAY            
            disable: [
                1,2,3,4,5,6
            ]        
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
* Trending line chart
*/
//var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
var data = {
	labels : ["JAN","FEB","MAR","APR","MAY","JUNE","JULY"],
	datasets : [
		{
			label: "First dataset",
			fillColor : "rgba(128, 222, 234, 0.6)",
			strokeColor : "#ffffff",
			pointColor : "#00bcd4",
			pointStrokeColor : "#ffffff",
			pointHighlightFill : "#ffffff",
			pointHighlightStroke : "#ffffff",
			data: [1, 5, 2, 4, 8, 5, 8]
		},
		{
			label: "Second dataset",
			fillColor : "rgba(128, 222, 234, 0.3)",
			strokeColor : "#80deea",
			pointColor : "#00bcd4",
			pointStrokeColor : "#80deea",
			pointHighlightFill : "#80deea",
			pointHighlightStroke : "#80deea",
			data: [6, 2, 9, 2, 5, 10, 4]
		}
	]
};

var nReloads = 0;
var min = 1;
var max = 10;
var l =0;
var trendingLineChart;
function update() {
	nReloads++;

	var x = Math.floor(Math.random() * (max - min + 1)) + min;
	var y = Math.floor(Math.random() * (max - min + 1)) + min;
	trendingLineChart.addData([x, y], data.labels[l]);
	trendingLineChart.removeData();
	l++;
	if( l == data.labels.length)
		{ l = 0;}
}
setInterval(update, 3000);


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

/*
Trending Bar Chart
*/

var dataBarChart = {
    labels : ["JAN","FEB","MAR","APR","MAY"],
    datasets: [
        {
            label: "Bar dataset",
            fillColor: "#46BFBD",
            strokeColor: "#46BFBD",
            highlightFill: "rgba(70, 191, 189, 0.4)",
            highlightStroke: "rgba(70, 191, 189, 0.9)",
            data: [6, 9, 8, 4, 6]
        }
    ]
};


var nReloads1 = 0;
var min1 = 1;
var max1 = 10;
var l1 =0;
var trendingBarChart;
function updateBarChart() {	
  	nReloads1++; 	
	var x = Math.floor(Math.random() * (max1 - min1 + 1)) + min1;
	trendingBarChart.addData([x], dataBarChart.labels[l1]);
	trendingBarChart.removeData();
	l1++;
	if( l1 == dataBarChart.labels.length){ l1 = 0;} 
}
setInterval(updateBarChart, 3000);

/*
Trending Bar Chart
*/
var radarChartData = {
	labels: ["Chrome", "Mozilla", "Safari", "IE10", "iPhone"],
	datasets: [
		{
			label: "First dataset",
			fillColor: "rgba(255,255,255,0.2)",
			strokeColor: "#fff",
			pointColor: "#00796b",
			pointStrokeColor: "#fff",
			pointHighlightFill: "#fff",
			pointHighlightStroke: "#fff",
			data: [5,6,7,8,6]
		}
	],
};
	
	
var nReloads2 = 0;
var min2 = 1;
var max2 = 10;
var l2 =0;
var trendingRadarChart;
function trendingRadarChartupdate() {	
  	nReloads2++; 	

	var x = Math.floor(Math.random() * (max2 - min2 + 1)) + min2;	
	
	trendingRadarChart.addData([x], radarChartData.labels[l2]);
	var y = trendingRadarChart.removeData();
	l2++;
	if( l2 == radarChartData.labels.length){ l2 = 0;}
 
}

setInterval(trendingRadarChartupdate, 3000);	
		
/*
Pie chart 
*/
var pieData = [
				{
					value: 300,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "America"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Canada"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "UK"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Europe"
				},
				{
					value: 120,
					color: "#4D5360",
					highlight: "#616774",
					label: "Australia"
				}

			];
/*
Line Chart
*/
var lineChartData = {
	labels : ["USA","UK","UAE","AUS","IN","SA"],
	datasets : [
		{
			label: "My dataset",
			fillColor : "rgba(255,255,255,0)",
			strokeColor : "#fff",
			pointColor : "#00796b ",
			pointStrokeColor : "#fff",
			pointHighlightFill : "#fff",
			pointHighlightStroke : "rgba(220,220,220,1)",
			data: [65, 45, 50, 30, 63, 45]
		}
	]

}

var polarData = [
		{
			value: 4800,
			color:"#f44336",
			highlight: "#FF5A5E",
			label: "USA"
		},
		{
			value: 6000,
			color: "#9c27b0",
			highlight: "#ce93d8",
			label: "UK"
		},
		{
			value: 1800,
			color: "#3f51b5",
			highlight: "#7986cb",
			label: "Canada"
		},
		{
			value: 4000,
			color: "#2196f3 ",
			highlight: "#90caf9",
			label: "Austrelia"
		},
		{
			value: 5500,
			color: "#ff9800",
			highlight: "#ffb74d",
			label: "India"
		},
		{
			value: 2100,
			color: "#009688",
			highlight: "#80cbc4",
			label: "Brazil"
		},
		{
			value: 5000,
			color: "#00acc1",
			highlight: "#4dd0e1",
			label: "China"
		},
		{
			value: 3500,
			color: "#4caf50",
			highlight: "#81c784",
			label: "Germany"
		}



	];	
		



window.onload = function(){
    
            window.PieChartSample = new Chart(document.getElementById("pie-chart-sample").getContext("2d")).Pie(PieDoughnutChartSampleData,{
               responsive:true
            });
	        window.PieChartSample = new Chart(document.getElementById("pie-chart-sample2").getContext("2d")).Pie(PieDoughnutChartSampleData2,{
               responsive:true
            });
	var trendingLineChart = document.getElementById("trending-line-chart").getContext("2d");
	window.trendingLineChart = new Chart(trendingLineChart).Line(data, {		
		scaleShowGridLines : true,///Boolean - Whether grid lines are shown across the chart		
		scaleGridLineColor : "rgba(255,255,255,0.4)",//String - Colour of the grid lines		
		scaleGridLineWidth : 1,//Number - Width of the grid lines		
		scaleShowHorizontalLines: true,//Boolean - Whether to show horizontal lines (except X axis)		
		scaleShowVerticalLines: false,//Boolean - Whether to show vertical lines (except Y axis)		
		bezierCurve : true,//Boolean - Whether the line is curved between points		
		bezierCurveTension : 0.4,//Number - Tension of the bezier curve between points		
		pointDot : true,//Boolean - Whether to show a dot for each point		
		pointDotRadius : 5,//Number - Radius of each point dot in pixels		
		pointDotStrokeWidth : 2,//Number - Pixel width of point dot stroke		
		pointHitDetectionRadius : 20,//Number - amount extra to add to the radius to cater for hit detection outside the drawn point		
		datasetStroke : true,//Boolean - Whether to show a stroke for datasets		
		datasetStrokeWidth : 3,//Number - Pixel width of dataset stroke		
		datasetFill : true,//Boolean - Whether to fill the dataset with a colour				
		animationSteps: 60,// Number - Number of animation steps		
		animationEasing: "easeOutQuart",// String - Animation easing effect			
		tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
		scaleFontSize: 12,// Number - Scale label font size in pixels		
		scaleFontStyle: "normal",// String - Scale label font weight style		
		scaleFontColor: "#fff",// String - Scale label font colour
		tooltipEvents: ["mousemove", "touchstart", "touchmove"],// Array - Array of string names to attach tooltip events		
		tooltipFillColor: "rgba(255,255,255,0.8)",// String - Tooltip background colour		
		tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
		tooltipFontSize: 12,// Number - Tooltip label font size in pixels
		tooltipFontColor: "#000",// String - Tooltip label font colour		
		tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
		tooltipTitleFontSize: 14,// Number - Tooltip title font size in pixels		
		tooltipTitleFontStyle: "bold",// String - Tooltip title font weight style		
		tooltipTitleFontColor: "#000",// String - Tooltip title font colour		
		tooltipYPadding: 8,// Number - pixel width of padding around tooltip text		
		tooltipXPadding: 16,// Number - pixel width of padding around tooltip text		
		tooltipCaretSize: 10,// Number - Size of the caret on the tooltip		
		tooltipCornerRadius: 6,// Number - Pixel radius of the tooltip border		
		tooltipXOffset: 10,// Number - Pixel offset from point x to tooltip edge
		responsive: true
		});

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

		var trendingBarChart = document.getElementById("trending-bar-chart").getContext("2d");
		window.trendingBarChart = new Chart(trendingBarChart).Bar(dataBarChart,{
			scaleShowGridLines : false,///Boolean - Whether grid lines are shown across the chart
			showScale: true,
			tooltipTitleFontFamily: "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label		
			responsive : true
		});

		window.trendingRadarChart = new Chart(document.getElementById("trending-radar-chart").getContext("2d")).Radar(radarChartData, {
		    
		    angleLineColor : "rgba(255,255,255,0.5)",//String - Colour of the angle line		    
		    pointLabelFontFamily : "'Roboto','Helvetica Neue', 'Helvetica', 'Arial', sans-serif",// String - Tooltip title font declaration for the scale label	
		    pointLabelFontColor : "#fff",//String - Point label font colour
		    pointDotRadius : 4,
		    pointDotStrokeWidth : 2,
		    pointLabelFontSize : 12,
			responsive: true
		});

		// var pieChartArea = document.getElementById("pie-chart-area").getContext("2d");
		// window.pieChartArea = new Chart(pieChartArea).Pie(pieData,{
		// 	responsive: true		
		// });

		var lineChart = document.getElementById("line-chart").getContext("2d");
		window.lineChart = new Chart(lineChart).Line(lineChartData, {
			scaleShowGridLines : false,
			bezierCurve : false,
			scaleFontSize: 12,
			scaleFontStyle: "normal",
			scaleFontColor: "#fff",
			responsive: true,			
		});

		var polarChartCountry = document.getElementById("polar-chart-country").getContext("2d");
		window.polarChartCountry = new Chart(polarChartCountry).PolarArea(polarData, {
			segmentStrokeWidth : 1,			
			responsive:true
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

                        <!-- left-->  
                        <div class="col s12 m4 l3">
                          <ul id="task-card" class="collection with-header">
                            <li class="collection-header cyan">
                                <h5 class="task-card-title">Select Statistics View</h5>
                            </li>

                             <!-- Form with validation -->
                          <div class="col s12 m12 l12">
                            <div class="card-panel">
                              <div class="row">
                                <form class="col s12" action="{{url('create_user')}}" method="post">
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <i class="mdi-image-timer  prefix"></i>
                                           <input disabled id="disabled" type="text" class="validate">
                                            <label for="disabled">Select time statistic preview</label>
                                            <br>
                                        <div> 
                                            <input class="with-gap" name="previledge" value="Day" type="radio" id="test1" />
                                            <label  style=" display: inline-block;"for="test1">Day</label>
                                            <input class="with-gap" name="previledge" value="Month" type="radio" id="test2" />
                                            <label  style=" display: inline-block;" for="test2">Month</label>
                                            <input class="with-gap" name="previledge" value="Year" type="radio" id="test3" />
                                            <label  style=" display: inline-block;" for="test3">Year</label>
                                        </div><br>                                

                                        <input type="date" class="datepicker">

                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                            <!--   //sdasdsad   -->
                          </ul>
                        </div>

                        <!-- middle-->
                        <div class="col s12 m6 l4">
                            <ul id="task-card" class="collection with-header">
                                <li class="collection-header cyan">
                                    <h5 class="task-card-title">Statistics report DUKCAPIL </h5>
                                </li>
                                <!--            <div class="divider"></div>-->
                                <!--Pie & Doughnut Charts-->
                                  <div class="row">
                                    <div class="col s12 m8 l12">
                                      <div class="row">
                                        <div class="col s12 m6 l12"> 
                                           <!--work collections start-->
                                            <div id="work-collections">
                                                <div class="row">
                                                    <div class="col s12 m12 l12">
                                                        <ul id="issues-collection" class="collection">
                                                            <li class="collection-item avatar">
                                                                <i class="small mdi-action-history circle red darken-2"></i>
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
                            </ul>
                        </div>

                         <!-- right-->
<!--                        <div id="chartjs-pie-chart" class="section">            -->
                         <div class="col s12 m6 l5">
                            <ul id="task-card" class="collection with-header">
                                <li class="collection-header cyan">
                                    <h5 class="task-card-title center">Statistic History Last Year</h5>
                                </li>
                                <div class="sample-chart-wrapper">
                                    <canvas id="pie-chart-sample" ></canvas>
                                </div>
                             </ul>
                         </div>
<!--                        </div>-->

                      </div>

                    <!--end container-->
                    </div>
                </div>
                    
                    <!--start container-->
       
        <div class="container">
          <div class="section">
            <div class="divider"></div>
            <!--Pie & Doughnut Charts-->
            <div id="chartjs-pie-chart" class="section">
              <h4 class="header">Pie & Doughnut Charts</h4>
              <div class="row">
                <div class="col s12 m8 l9">
                  <div class="row">
                    <div class="col s12 m6 l6">
                      <div class="sample-chart-wrapper">
                        <canvas id="pie-chart-sample" ></canvas>
                      </div>
                      <p class="header center">Statistics Event</p>
                    </div>
                    <div class="col s12 m6 l6">
                      <div class="sample-chart-wrapper">
                        <canvas id="pie-chart-sample2" ></canvas>
                      </div>
                      <p class="header center">Statistics Server Up and Down</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!--end container-->
                                <!--chart dashboard start-->
                    <div id="chart-dashboard">
                        <div class="row">
                            <div class="col s12 m8 l8">
                                <div class="card">
                                    <div class="card-move-up waves-effect waves-block waves-light">
                                        <div class="move-up cyan darken-1">
                                            <div>
                                                <span class="chart-title white-text">Revenue</span>
                                                <div class="chart-revenue cyan darken-2 white-text">
                                                    <p class="chart-revenue-total">$4,500.85</p>
                                                    <p class="chart-revenue-per"><i class="mdi-navigation-arrow-drop-up"></i> 21.80 %</p>
                                                </div>
                                                <div class="switch chart-revenue-switch right">
                                                    <label class="cyan-text text-lighten-5">
                                                      Month
                                                      <input type="checkbox">
                                                      <span class="lever"></span> Year
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="trending-line-chart-wrapper">
                                                <canvas id="trending-line-chart" height="70"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                                        <div class="col s12 m3 l3">
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
                                        <div class="col s12 m5 l6">
                                            <div class="trending-bar-chart-wrapper">
                                                <canvas id="trending-bar-chart" height="90"></canvas>                                                
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Revenue by Month <i class="mdi-navigation-close right"></i></span>
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th data-field="id">ID</th>
                                                    <th data-field="month">Month</th>
                                                    <th data-field="item-sold">Item Sold</th>
                                                    <th data-field="item-price">Item Price</th>
                                                    <th data-field="total-profit">Total Profit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>January</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>February</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>March</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>April</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td>May</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>6</td>
                                                    <td>June</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>7</td>
                                                    <td>July</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>8</td>
                                                    <td>August</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>9</td>
                                                    <td>Septmber</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>10</td>
                                                    <td>Octomber</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>11</td>
                                                    <td>November</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                                <tr>
                                                    <td>12</td>
                                                    <td>December</td>
                                                    <td>122</td>
                                                    <td>100</td>
                                                    <td>$122,00.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                            </div>

                            <div class="col s12 m4 l4">
                                <div class="card">
                                    <div class="card-move-up teal waves-effect waves-block waves-light">
                                        <div class="move-up">
                                            <p class="margin white-text">Browser Stats</p>
                                            <canvas id="trending-radar-chart" height="114"></canvas>
                                        </div>
                                    </div>
                                    <div class="card-content  teal darken-2">
                                        <a class="btn-floating btn-move-up waves-effect waves-light darken-2 right"><i class="mdi-content-add activator"></i></a>
                                        <div class="line-chart-wrapper">
                                            <p class="margin white-text">Revenue by country</p>
                                            <canvas id="line-chart" height="114"></canvas>
                                        </div>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4">Revenue by country <i class="mdi-navigation-close right"></i></span>
                                        <table class="responsive-table">
                                            <thead>
                                                <tr>
                                                    <th data-field="country-name">Country Name</th>
                                                    <th data-field="item-sold">Item Sold</th>
                                                    <th data-field="total-profit">Total Profit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>USA</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>UK</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Canada</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Brazil</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>

                                                    <td>India</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>France</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Austrelia</td>
                                                    <td>65</td>
                                                    <td>$452.55</td>
                                                </tr>
                                                <tr>
                                                    <td>Russia</td>
                                                    <td>76</td>
                                                    <td>$452.55</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--chart dashboard end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--work collections start-->
                    <div id="work-collections">
                        <div class="row">
                            <div class="col s12 m12 l6">
                                <ul id="projects-collection" class="collection">
                                    <li class="collection-item avatar">
                                        <i class="mdi-file-folder circle light-blue darken-2"></i>
                                        <span class="collection-header">Projects</span>
                                        <p>Your Favorites</p>
                                        <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">Web App</p>
                                                <p class="collections-content">AEC Company</p>
                                            </div>
                                            <div class="col s3">
                                                <span class="task-cat cyan">Development</span>
                                            </div>
                                            <div class="col s3">
                                                <div id="project-line-1"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">Mobile App for Social</p>
                                                <p class="collections-content">iSocial App</p>
                                            </div>
                                            <div class="col s3">
                                                <span class="task-cat grey darken-3">UI/UX</span>
                                            </div>
                                            <div class="col s3">
                                                <div id="project-line-2"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">Website</p>
                                                <p class="collections-content">MediTab</p>
                                            </div>
                                            <div class="col s3">
                                                <span class="task-cat teal">Marketing</span>
                                            </div>
                                            <div class="col s3">
                                                <div id="project-line-3"></div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item">
                                        <div class="row">
                                            <div class="col s6">
                                                <p class="collections-title">AdWord campaign</p>
                                                <p class="collections-content">True Line</p>
                                            </div>
                                            <div class="col s3">
                                                <span class="task-cat green">SEO</span>
                                            </div>
                                            <div class="col s3">
                                                <div id="project-line-4"></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--work collections end-->

                </div>
                <!--end container-->
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
