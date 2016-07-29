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
              <h4 class="header">PIC Regions</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function.</p>

                  <p>Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example.</p>
                </div>
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
                        <form class="col s12">
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-account-circle prefix"></i>
                              <input id="name4" type="text" class="validate">
                              <label for="username">Username</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-accessibility prefix"></i>
                              <input id="name" type="text" class="validate">
                              <label for="full_name">Full Name</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-lock-outline prefix"></i>
                              <input id="password5" type="password" class="validate">
                              <label for="password">Password</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-communication-phone  prefix"></i>
                              <input id="name4" type="text" class="validate">
                              <label for="first_name">Phone</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-communication-email prefix"></i>
                              <input id="email4" type="email" class="validate">
                              <label for="email">Email</label>
                            </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-maps-place  prefix"></i>
                                <input disabled id="disabled" type="text" class="validate">
                                <label for="disabled">PIC tingkat</label>
                                <br><input class="with-gap" name="group3" type="radio" id="test1" />
                                <label for="test1">Pusat</label>
                                <input class="with-gap" name="group3" type="radio" id="test2" />
                                <label for="test2">Provinsi</label>
                                <input class="with-gap" name="group3" type="radio" id="test3" />
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
                

                  
                <div class="col s12 m8 l9">
                   <table id="data-table-simple" class="responsive-table display" cellspacing="0"  width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Region</th>
                            <th>Edit / Delete</th>
                        </tr>
                    </thead>
                 
                    <tfoot>
                        <tr>
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
                            <td>{{$list->fullname}}</td>
                            <td>{{$list->number}}</td>
                            <td>{{$list->email}}</td>
                            <td>{{$list->name}}</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger edit" href="#edit{{$list->id}}">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#delete{{$list->id}}">
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
                                                            <select name="region">
                                                                @foreach ($region as $row)
                                                                    <option value="{{$row->id}}" <?php if($list->id_region==$row->id) echo "selected";?>>{{$row->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label>Region</label>
                                                        </div>
                                                        {{--<div class="input-field col s12">--}}
                                                            {{--<i class="mdi-maps-place  prefix"></i>--}}
                                                            {{--<input id="name4" type="text" class="validate" value="{{$list->name}}">--}}
                                                            {{--<label for="first_name">Region</label>--}}
                                                        {{--</div>--}}
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
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
                            </div>
                        </div>

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

