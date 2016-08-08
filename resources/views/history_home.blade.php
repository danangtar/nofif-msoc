@extends('layouts.home')

@section('content')
    <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("materialize/js/scripts.js")}}"></script><script type="text/javascript">
        $( document ).ready(function() {
        $('select').material_select();

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
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->     
     
          <!--work collections start-->
        <div id="work-collections">
            <div class="row">
                
                <div class="col s12 m6 l5">
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
                                <li> <span class="folder" style="white-space: nowrap;"><a  onclick="location.href='{{url("history/".$list->id)}}'" >{{$list->id}} {{$list->name}}</a></span>
                                        <?php if(!empty($kabupaten[$list->id])){?>
                                        <ul class="tree hoverable">
                                            @foreach($kabupaten[$list->id] as $rows)
                                                <li><span class="folder"> <a onclick="location.href='{{url("history/".$rows->id)}}'"> {{$rows->id}} {{$rows->name}}</a> </span>
                                                </li>

                                            @endforeach
                                        </ul><?php }?>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                
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
    <!--scrollbar-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>

    <!-- chartist -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartist-js/chartist.min.js")}}"></script>

    <!-- chartjs -->
    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chart.min.js")}}"></script>
<!--    <script type="text/javascript" src="{{asset("materialize/js/plugins/chartjs/chartjs-sample-chart.js")}}"></script>-->


    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>

@endsection
