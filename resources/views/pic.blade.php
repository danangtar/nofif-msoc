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

            <p class="caption">PIC Regions</p>
            <div class="divider"></div>
            
            <!--DataTables example-->
            <div id="table-datatables">
              <div class="row"><br>
                <!-- Modal Trigger -->
                  <a class="modal-trigger waves-effect waves-light btn" href="#modal3">Add new pic</a>

          <!-- Modal Structure -->
          <div id="modal3" class="modal">
            <div class="modal-content">
                     <!-- Form with validation -->
                  <div class="col s12 m12 l12">
                    <div class="card-panel">
                      <h4 class="header2" style="text-align:center">Add PIC Form</h4>
                      <div class="row">
                          <form class="col s12" action="{{url('create_user')}}" method="post">
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-account-circle prefix"></i>
                              <input name="username" id="name4" type="text" class="validate">
                              <label for="username">Username</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-accessibility prefix"></i>
                              <input name="fullname" id="name" type="text" class="validate">
                              <label for="full_name">Full Name</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-lock-outline prefix"></i>
                              <input name="password" id="password5" type="password" class="validate">
                              <label for="password">Password</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-communication-phone  prefix"></i>
                              <input name="number" id="name4" type="text" class="validate">
                              <label for="first_name">Phone</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-communication-email prefix"></i>
                              <input name="email" id="email4" type="email" class="validate">
                              <label for="email">Email</label>
                            </div>
                          </div>
                              <div class="row">
                                  <div class="input-field col s12">
                                      <select name="id_region">
                                          @foreach ($region as $row)
                                              <option value="{{$row->id}}"?>{{$row->name}}</option>
                                          @endforeach
                                      </select>
                                      <label>Region</label>
                                  </div>
                                </div>
                                  <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-maps-place  prefix"></i>
                                <input disabled id="disabled" type="text" class="validate">
                                <label for="disabled">PIC tingkat</label>
                                <br><input class="with-gap" name="previledge" value="0" type="radio" id="test1" />
                                <label for="test1">Pusat</label>
                                <input class="with-gap" name="previledge" value="1" type="radio" id="test2" />
                                <label for="test2">Provinsi</label>
                                <input class="with-gap" name="previledge" value="2" type="radio" id="test3" />
                                <label for="test3">Kabupaten</label>
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
                   <table id="data-table-simple" class="responsive-table display" cellspacing="0"  width="100%">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </tfoot>

                    <tbody>
                         @foreach ($result as $list)
                             <tr>
                            <td>{{$list->username}}</td>
                            <td>{{$list->fullname}}</td>
                            <td>{{$list->number}}</td>
                            <td>{{$list->email}}</td>
                            <td>
                                <form action="{{url('update_region')}}" method="POST">
                                    <input name="id" type="hidden" value="{{$list->id}} ">

                                    <select name="id_region" id="select{{$list->id}}" onchange="this.form.submit()">
                                         @foreach ($region as $row)
                                             <option value="{{$row->id}}" <?php if($list->id_region==$row->id) echo "selected";?>>{{$row->name}}</option>
                                         @endforeach
                                     </select>
                                </form>
                            </td>
                            {{--<td>{{$list->name}}</td>--}}
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small waves-effect waves-light teal accent-3 medium material-icons modal-trigger tooltipped edit" data-position="top" data-delay="10" data-tooltip="edit PIC"  href="#edit{{$list->id}}">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small waves-effect waves-light medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="delete PIC"  href="#delete{{$list->id}}">
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
                                            <h4 class="header2" style="text-align:center">PIC Edit Form</h4>
                                            <div class="row">
                                                <form class="col s12" action="{{url('update_user')}}" method="post">

                                                    <input name="id" type="hidden" value="{{$list->id}} ">
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <i class="mdi-action-account-circle prefix"></i>
                                                            <input name="fullname" id="name4" type="text" class="validate" value="{{$list->fullname}}">
                                                            <label for="first_name">Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <i class="mdi-action-lock-outline prefix"></i>
                                                            <input name="password" id="password5" type="password" class="validate">
                                                            <label for="password">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <i class="mdi-communication-phone  prefix"></i>
                                                            <input name="number" id="name4" type="text" class="validate" value="{{$list->number}}">
                                                            <label for="first_name">Phone</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <i class="mdi-communication-email  prefix"></i>
                                                            <input name="email" id="name4" type="email" class="validate" value="{{$list->email}}">
                                                            <label for="first_name">Email</label>
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
                                <p>Are you sure to delete <b>{{$list->fullname}}</b> account?</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                                <a href="{{url("delete_user/$list->id")}}" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
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

@endsection

