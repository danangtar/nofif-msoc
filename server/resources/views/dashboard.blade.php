@extends('layouts.home')

@section('content')

    <!-- jQuery Library -->
    <script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>   
    <script type="text/javascript" src="materialize/js/scripts.js"></script>
<div>
                    <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">

                            <div class="col s12 m12 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header cyan">
                                        <h4 class="task-card-title">My Task</h4>
                                        <p class="task-card-date">March 26, 2015</p>
                                    </li>
                                    <li class="collection-item dismissable">
                                        <div class="treeview">
                                            <ul>
                                                <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"><span class="folder"> Clientes</span></li>
                                                <li><img src="materialize/images/Small-Down.gif"alt="materialize logo"><span class="folder"> Clientes</span></li>
                                                <li><img src="materialize/images/Small-Warning.gif"alt="materialize logo"><span class="folder"> Clientes</span></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s12 m12 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header cyan">
                                        <h4 class="task-card-title">My Task</h4>
                                        <p class="task-card-date">March 26, 2015</p>
                                    </li>
                                    <li class="collection-item">
                                        <div class="listControl">
                                            <a class="expandList">Expand All</a>
                                            <a class="collapseList">Collapse All</a>
                                        </div>
                                        <ul class="expList">
                                            <li><span class="folder" style="
                                                white-space: nowrap;"><img src="materialize/images/Small-Up.gif" alt="materialize logo">Clientes</span>
                                                <ul>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Sistemas</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Verde</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Azul
                                                        <ul>
                                                            <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Sistemas</li>
                                                            <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Verde</li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><span class="folder" style="
                                                white-space: nowrap;"><img src="materialize/images/Small-Up.gif" alt="materialize logo">Clientes</span>
                                                <ul>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Sistemas</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Verde</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Azul</li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="col s12 m12 l4">
                                <ul id="task-card" class="collection with-header">
                                    <li class="collection-header cyan">
                                        <h4 class="task-card-title">My Task</h4>
                                        <p class="task-card-date">March 26, 2015</p>
                                    </li>
                                    <li class="collection-item">
                                        <div class="listControl">
                                            <a class="expandList">Expand All</a>
                                            <a class="collapseList">Collapse All</a>
                                        </div>
                                        <ul class="expList">
                                            <li>
                                                Item A
                                                <ul>
                                                    <li>
                                                        Item A.1
                                                        <ul>
                                                            <li>
                                                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sagittis ultricies arcu, quis porttitor risus placerat et. Proin quis metus diam, quis bibendum dolor. Nulla nec dapibus nunc. Quisque ac erat sit amet nisl venenatis consequat nec in nibh. Aliquam viverra vestibulum elit faucibus sollicitudin.</span>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><span class="folder" style="
                                                                            white-space: nowrap;"><img src="materialize/images/Small-Up.gif" alt="materialize logo">Item A</span>
                                                <ul>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Item A.1</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Item A.1</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Item A.1
                                                        <ul>
                                                            <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Sistemas</li>
                                                            <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Verde</li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li><span class="folder" style="
                                                white-space: nowrap;"><img src="materialize/images/Small-Up.gif" alt="materialize logo">Clientes</span>
                                                <ul>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Sistemas</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Verde</li>
                                                    <li><img src="materialize/images/Small-up-unknown-noblink.gif"alt="materialize logo"> Azul</li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
        <div>
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
