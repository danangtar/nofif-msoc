@extends('layouts.home')

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt-1.10.12/jqc-1.11.3,dt-1.10.12,b-1.2.1,se-1.2.0/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="Editor-1.5.6/css/editor.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/r/dt-1.10.12/jqc-1.11.3,dt-1.10.12,b-1.2.1,se-1.2.0/datatables.min.js"></script>
    <script type="text/javascript" src="Editor-1.5.6/js/dataTables.editor.js"></script>
<script>

var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        "ajax": "../php/staff.php",
        "table": "#example",
        "fields": [ {
                "label": "First name:",
                "name": "first_name"
            }, {
                "label": "Last name:",
                "name": "last_name"
            }, {
                "label": "Position:",
                "name": "position"
            }, {
                "label": "Office:",
                "name": "office"
            }, {
                "label": "Extension:",
                "name": "extn"
            }, {
                "label": "Start date:",
                "name": "start_date",
                "type": "datetime"
            }, {
                "label": "Salary:",
                "name": "salary"
            }
        ]
    } );
 
    // New record
    $('a.editor_create').on('click', function (e) {
        e.preventDefault();
 
        editor.create( {
            title: 'Create new record',
            buttons: 'Add'
        } );
    } );
 
    // Edit record
    $('#example').on('click', 'a.editor_edit', function (e) {
        e.preventDefault();
 
        editor.edit( $(this).closest('tr'), {
            title: 'Edit record',
            buttons: 'Update'
        } );
    } );
 
    // Delete a record
    $('#example').on('click', 'a.editor_remove', function (e) {
        e.preventDefault();
 
        editor.remove( $(this).closest('tr'), {
            title: 'Delete record',
            message: 'Are you sure you wish to remove this record?',
            buttons: 'Delete'
        } );
    } );
 
    $('#example').DataTable( {
        ajax: "../php/staff.php",
        columns: [
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.first_name+' '+data.last_name;
            } },
            { data: "position" },
            { data: "office" },
            { data: "extn" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) },
            {
                data: null,
                className: "center",
                defaultContent: '<a href="" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ]
    } );
} );

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
                
            <!-- Modal Edit -->
            <div id="modal1" class="modal">
               <div class="model-email-content">
                <div class="row">
              <!-- Form with validation -->
                  <div class="col s12 m12 l12">
                    <div class="card-panel">
                      <h4 class="header2" style="text-align:center">PIC Edit Form</h4>
                      <div class="row">
                        <form class="col s12">
                          <div class="row">
                            <div class="input-field col s12">
                              <i class="mdi-action-account-circle prefix"></i>
                              <input id="name4" type="text" class="validate">
                              <label for="first_name">Name</label>
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
                              <input id="name4" type="text" class="validate">
                              <label for="first_name">Region</label>
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
            <div id="modal2" class="modal">
              <div class="modal-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
              <div class="modal-footer">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal2">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountants</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal2">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal2">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal2">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal2">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td> <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Vivian Harrell</td>
                            <td>Financial Controller</td>
                            <td>San Francisco</td>
                            <td>62</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Timothy Mooney</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>37</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jackson Bradshaw</td>
                            <td>Director</td>
                            <td>New York</td>
                            <td>65</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Olivia Liang</td>
                            <td>Support Engineer</td>
                            <td>Singapore</td>
                            <td>64</td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="large mdi-editor-mode-edit"></i>
                                    </a>
                                    <a class="btn-floating2 btn-small medium material-icons modal-trigger" href="#modal1">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>    
          </div>

        </div>
        <!--end container-->

@endsection
