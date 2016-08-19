@extends('layouts.home')

@section('content')
 <!-- jQuery Library -->
 <script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
 <script type="text/javascript" src="{{asset("materialize/js/plugins/data-tables/js/jquery.dataTables.min.js")}}"></script>
 <script type="text/javascript" src="{{asset("materialize/js/plugins/data-tables/data-tables-script.js")}}"></script>
 <script type="text/javascript">
    $(document).ready(function(){
        $('.modal-trigger').leanModal();
        $('#data-table-simple3').DataTable( {
             aLengthMenu: [
                [5, 10, 25, 100, -1],
                [5, 10, 25, 100, "All"]
            ],
            iDisplayLength: -1
        } );
    });
 </script>
 <link href="{{asset("materialize/css/materialize.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
 <link href="{{asset("materialize/css/style.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
          
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Regions</h5>
                <ol class="breadcrumb">
                  <li><a href="">Dashboard</a>
                  </li>
                  <li><a href="">Regions</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->    
        <div class="container">
        <div class="section">
           <div class="divider"></div>    
            <!--DataTables example-->
            <div id="table-datatables">
              <div class="row"><br>
                <!-- Modal Trigger -->
                  <a class="modal-trigger waves-effect waves-light btn" href="#modal3">Add new Region</a>
                  <!-- Modal Add New Region -->
                  <div id="modal3" class="modal">
                    <div class="modal-content">
                        <!-- Form with validation -->
                          <div class="col s12 m12 l12">
                            <div class="card-panel">
                              <h4 class="header2" style="text-align:center">Add Region Form</h4>
                              <div class="row">
                                  <form class="col s12" action="{{url('create_regions')}}" method="post">
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <i class="mdi-action-label prefix"></i>
                                      <input name="id" id="name4" type="number" class="validate">
                                      <label for="id_region">ID Region</label>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s12">
                                      <i class="mdi-action-language prefix"></i>
                                      <input name="name" id="name" type="text" class="validate">
                                      <label for="region_name">Region Name</label>
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
                  
                <div class="col s12 m8 l12">
                   <table id="data-table-simple3" class="responsive-table display" cellspacing="0"  width="100%">
                    <thead>
                        <tr>
                            <th>ID Region</th>
                            <th>Region Name</th>
                            <th>Status</th>
                            <th>Response Again</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>ID Region</th>
                            <th>Region Name</th>
                            <th>Status</th>
                            <th>Response Again</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </tfoot>

                    <tbody>
                         @foreach ($region as $list)
                             <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->name}}</td>
                            <td><?php if($list->status==1)echo "DOWN"; else echo "UP"; ?></td>
                            <td>{{$list->response}} Hours</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small waves-effect waves-light teal accent-3 medium material-icons modal-trigger tooltipped edit" data-position="top" data-delay="10" data-tooltip="edit region"  href="#edit{{$list->id}}">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small waves-effect waves-light medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="delete region"  href="#delete{{$list->id}}">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal Edit -->
                        <div id="edit{{$list->id}}" class="modal">
                            <div class="model-email-content">
                                <div class="row">
                                    <!-- Form with validation -->
                                    <div class="col s12 m12 l12">
                                        <div class="card-panel">
                                            <h4 class="header2" style="text-align:center">Region Edit Form</h4>
                                            <div class="row">
                                                <form class="col s12" action="{{url('update_regions')}}" method="post">
                                                  <div class="row">
                                                    <div class="input-field col s12">
                                                      <i class="mdi-action-label  prefix"></i>
                                                      <input name="id" type="hidden" class="validate" value="{{$list->id}}">
                                                      <input id="name4" type="number" class="validate" value="{{$list->id}}" disabled>
                                                      <label for="id_region">ID Region</label>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                    <div class="input-field col s12">
                                                      <i class="mdi-action-language prefix"></i>
                                                      <input name="name" id="name" type="text" class="validate" value="{{$list->name}}">
                                                      <label for="region_name">Region Name</label>
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

                        <!-- Modal Delete -->
                        <div id="delete{{$list->id}}" class="modal">
                            <div class="modal-content">
                                <p>Are you sure to delete "<span  style="text-transform: uppercase;"><b>{{$list->name}}</b></span>" region ?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                                <a href="{{url("delete_regions/$list->id")}}" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
                            </div>
                        </div>
                             <script type="text/javascript">
                                 $( document ).ready(function() {
                                     $('#select{{$list->id}}').on('change', function() {
                                         console.log( this.value); // or $(this).val()
                                     });
                                 });
                             </script>

                            @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>    
          </div>

        </div>
<!--end container-->
<script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>


@endsection