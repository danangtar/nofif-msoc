@extends('layouts.home')

@section('content')
    <script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('select').material_select();
        });
    </script>

    <!--start container-->
    <div class="container">
        <div class="section">

            <p class="caption">Report</p>
            <div class="divider"></div>

            <!--DataTables example-->
            <div id="table-datatables">

                    <!-- Modal Edit -->
                    <div id="modal3" class="modal">
                        <div class="model-email-content">
                            <div class="row">
                                <!-- Form with validation -->
                                <div class="col s12 m12 l12">
                                    <div class="card-panel">
                                        <h4 class="header2" style="text-align:center">Detail Edit Form</h4>
                                        <div class="row">
                                            <form class="col s12">
                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <i class="mdi-action-question-answer prefix"></i>
                                                        <textarea id="message4" class="materialize-textarea validate" length="120"></textarea>
                                                        <label for="message">Message</label>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="input-field col s12">
                                                        <div class="modal-footer">
                                                            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat right">Cancel</a>
                                                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">OK
                                                                <i class="mdi-content-send right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12 m8 l9">
                        <table id="data-table-simple" class="responsive-table display" cellspacing="0"  width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Region</th>
                                <th>Response</th>
                                <th>Alert Time</th>
                                <th>Detail</th>
                                <th>Delete</th>
                                <th>Status Response</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Region</th>
                                <th>Response</th>
                                <th>Alert Time</th>
                                <th>Detail</th>
                                <th>Delete</th>
                                <th>Status Response</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            @foreach ($result as $list)
                                <tr>
                                <td>{{$list->fullname}}</td>
                                <td>{{$list->name}}</td>
                                <td style="white-space: nowrap;">{{$list->description}}</td>
                                <td>{{$list->response}} hour</td>
                                <td style="white-space: nowrap;">{{substr($list->detail, 0, 10).'...'}}
                                    <a class="btn-floating2 btn-small  waves-light blue lighten-2 medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="view detail" href="#view{{$list->id}}">
                                        <i class="mdi-action-visibility"></i>
                                    </a>
                                </td>
                                <td>
                                    <div>
                                        <a class="btn-floating2 btn-small  waves-effect waves-light medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="delete report" href="#delete{{$list->id}}">
                                            <i class="mdi-action-delete"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <!--
                                                                     <a class="btn-floating2 btn-small waves-effect waves-light yellow accent-3 medium material-icons tooltipped" data-position="top" data-delay="10" data-tooltip="waiting for response">
                                                                        <i class="mdi-av-timer"></i>
                                                                    </a>
                                    -->
                                    <?php if($list->verifikasi == 1) { ?>
                                    <a class="btn-floating2 btn-small  waves-effect waves-light green accent-4 medium material-icons tooltipped" data-position="top" data-delay="10" data-tooltip="confirmed" >
                                        <i class=" mdi-toggle-check-box"></i>
                                    </a>
                                    <?php }else{ ?>
                                    <a class="btn-floating2 btn-small  waves-effect waves-light waves-light  yellow accent-3 medium material-icons tooltipped modal-trigger" data-position="top" data-delay="10" data-tooltip="confirm report?" href="#confirm{{$list->id}}">
                                        <i class=" mdi-av-timer"></i>
                                    </a>
                                    <?php } ?>
                                </td>

                                <!-- Modal Edit -->
                                <div id="view{{$list->id}}" class="modal">
                                    <div class="model-email-content">
                                        <div class="row">
                                            <!-- Form with validation -->
                                            <div class="col s12 m12 l12">
                                                <div class="card-panel">
                                                    <h4 class="header2" style="text-align:center">Detail Edit Form</h4>
                                                    <div class="row">
                                                        <form class="col s12" action="{{url('update_report')}}" method="post">
                                                            <input name="id" type="hidden" value="{{$list->id}} ">

                                                            <div class="row">
                                                                <div class="input-field col s12">
                                                                    <i class="mdi-action-question-answer prefix"></i>
                                                                    <textarea name="detail" id="message4" class="materialize-textarea validate" length="120">{{$list->detail}}</textarea>
                                                                    <label for="message">Message</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="input-field col s12">
                                                                    <div class="modal-footer">
                                                                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat right">Cancel</a>
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">OK
                                                                            <i class="mdi-content-send right"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                    <!-- Modal Confirm -->
                                    <div id="confirm{{$list->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure to confirm this report?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                                            <a href="{{url("confirm_report/$list->id")}}" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
                                        </div>
                                    </div>

                                    <!-- Modal Delete -->
                                    <div id="delete{{$list->id}}" class="modal">
                                        <div class="modal-content">
                                            <p>Are you sure to delete this report?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                                            <a href="{{url("delete_report/$list->id")}}" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
                                        </div>
                                    </div>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 <!--end container-->

@endsection