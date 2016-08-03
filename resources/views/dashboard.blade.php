@extends('layouts.home')

@section('content')
<!-- jQuery Library -->
<script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>   
<script type="text/javascript" src="materialize/js/scripts.js"></script>
<div>
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
                                
                                <li><img src="materialize/images/<?php 
                                        if($list->status == 1) echo "Small-Down.gif";
                                        else echo "Small-up-unknown-noblink.gif";
                                    ?>"alt="materialize logo"><span class="folder"> {{$list->id}} <a href="{{url("history/".$list->id)}}">{{$list->name}}</a><a href="{{url('alert/'.$list->id)}}"><span <?php if($list->response==1) {?>
                                                        class="btn btn-small waves-effect waves-light green new badge green"> confirmed
                                                <?php }else {?>
                                                        class="btn btn-small waves-effect waves-light red new badge red"> alert
                                                <?php }?>
                                    </span></a></span></li>
                                @endforeach
<!--
                                <li><img src="materialize/images/Small-Down.gif"alt="materialize logo"><span class="folder"> Clientes</span></li>
                                <li><img src="materialize/images/Small-Warning.gif"alt="materialize logo"><span class="folder"> Clientes</span></li>
-->
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
                            <li> <span class="folder" style="white-space: nowrap;"><img src="materialize/images/<?php 
                                        if($kabstat[$list->id] == 1) echo "Small-Up.gif";
                                        else if ($kabstat[$list->id] == 2) echo "Small-Down.gif";
                                        else echo "Small-Warning.gif";
                                ?>" alt="materialize logo">{{$list->name}}</span>
                                    <?php if(!empty($kabupaten[$list->id])){?>
                                    <ul class="tree hoverable">
                                        @foreach($kabupaten[$list->id] as $rows)
                                            <li><img src="materialize/images/<?php 
                                                if($rows->status == 1) echo "Small-Down.gif";
                                                else echo "Small-Up.gif";
                                            ?>"alt="materialize logo"><span class="folder"> {{$rows->id}} <a href="{{url("history/".$rows->id)}}">{{$rows->name}}</a> <span<?php if($rows->response==1) {?>
                                                        class="btn btn-small waves-effect waves-light green new badge green"> confirmed
                                                <?php }else {?>
                                                        class="btn btn-small waves-effect waves-light red new badge red"> alert
                                                <?php }?>
                                            </span></span>
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
    <?php
//            $username = 'helpdesk';
//            $password = 'adminduk';
//
//            $context = stream_context_create(array(
//                'http' => array(
//                    'header'  => "Authorization: Basic " . base64_encode("$username:$password")
//                )
//            ));
//            $url = 'http://118.97.77.78/Orion/Login.aspx?';
//            $data = file_get_contents($url, true, $context);
//            echo $data
    ?>

</div>


@endsection
