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

            <p class="caption">Report</p>
            <div class="divider"></div>
            
            <!--DataTables example-->
            <div id="table-datatables">
              <h4 class="header">Report</h4>
              <div class="row">
                <div class="col s12 m4 l3">
                  <p>DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function.</p>

                  <p>Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example.</p>
                </div>
            
            <!-- Modal View -->
            <div id="modal1" class="modal">
              <div class="modal-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
              <div class="modal-footer">
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Disagree</a>
                <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Agree</a>
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
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>Bengkulu</td>
                            <td style="white-space: nowrap;">Mati lampu
                                <a class="btn-floating2 btn-small waves-effect waves-light blue lighten-2 medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="view detail" href="#modal1">
                                    <i class="mdi-action-visibility"></i>
                                </a>  
                            </td>
                            <td>6 hour</td>
                            <td style="white-space: nowrap;">Lorem ipsum dolor...
                                <a class="btn-floating2 btn-small waves-effect waves-light teal accent-3 medium material-icons modal-trigger tooltipped valign" data-position="top" data-delay="10" data-tooltip="edit detail" href="#modal3">
                                    <i class="mdi-editor-mode-edit"></i>
                                </a>                            
                            </td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small  waves-effect waves-light medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="delete report" href="#modal2">
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
                                 <a class="btn-floating2 btn-small  waves-effect waves-light green accent-4 medium material-icons tooltipped" data-position="top" data-delay="10" data-tooltip="confirmed" >
                                     <i class=" mdi-toggle-check-box"></i>
                                </a>
<!--
                                 <a class="btn-floating2 btn-small  waves-effect waves-light waves-light  deep-orange accent-3 medium material-icons tooltipped modal-trigger" data-position="top" data-delay="10" data-tooltip="send alert" href="#modal1">
                                   <i class=" mdi-alert-warning "></i>          
                                </a> 
-->
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>Bengkulu</td>
                            <td style="white-space: nowrap;">Mati lampu
                                <a class="btn-floating2 btn-small waves-effect waves-light blue lighten-2 medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="view detail" href="#modal1">
                                    <i class="mdi-action-visibility"></i>
                                </a>  
                            </td>
                            <td>6 hour</td>
                            <td style="white-space: nowrap;">Lorem ipsum dolor...
                                <a class="btn-floating2 btn-small waves-effect waves-light teal accent-3 medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="edit detail" href="#modal1">
                                      <i class="mdi-editor-mode-edit"></i>
                                </a>                            
                            </td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small  waves-effect waves-light medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="delete report" href="#modal2">
                                        <i class="mdi-action-delete"></i>
                                    </a>
                                </div>
                            </td>
                            <td>
                                 <a class="btn-floating2 btn-small waves-effect waves-light yellow accent-3 medium material-icons tooltipped" data-position="top" data-delay="10" data-tooltip="waiting for response">
                                    <i class="mdi-av-timer"></i>
                                </a>
<!--
                                 <a class="btn-floating2 btn-small  waves-effect waves-light green accent-4 medium material-icons tooltipped" data-position="top" data-delay="10" data-tooltip="confirmed" >
                                     <i class=" mdi-toggle-check-box"></i>
                                </a>
-->
<!--
                                 <a class="btn-floating2 btn-small  waves-effect waves-light waves-light  deep-orange accent-3 medium material-icons tooltipped modal-trigger" data-position="top" data-delay="10" data-tooltip="send alert" href="#modal1">
                                   <i class=" mdi-alert-warning "></i>          
                                </a> 
-->
                            </td>
                        </tr>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>Bengkulu</td>
                            <td style="white-space: nowrap;">Mati lampu
                                <a class="btn-floating2 btn-small  waves-light blue lighten-2 medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="view detail" href="#modal1">
                                    <i class="mdi-action-visibility"></i>
                                </a>  
                            </td>
                            <td>6 hour</td>
                            <td style="white-space: nowrap;">Lorem ipsum dolor...
                                <a class="btn-floating2 btn-small  waves-light teal accent-3 medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="edit detail" href="#modal1">
                                      <i class="mdi-editor-mode-edit"></i>
                                </a>                            
                            </td>
                             <td>
                                <div>
                                    <a class="btn-floating2 btn-small  waves-effect waves-light medium material-icons modal-trigger tooltipped" data-position="top" data-delay="10" data-tooltip="delete report" href="#modal2">
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
<!--
                                 <a class="btn-floating2 btn-small  waves-effect waves-light green accent-4 medium material-icons tooltipped" data-position="top" data-delay="10" data-tooltip="confirmed" >
                                     <i class=" mdi-toggle-check-box"></i>
                                </a>
-->
                                 <a class="btn-floating2 btn-small  waves-effect waves-light waves-light  deep-orange accent-3 medium material-icons tooltipped modal-trigger" data-position="top" data-delay="10" data-tooltip="send alert" href="#modal1">
                                   <i class=" mdi-alert-warning "></i>          
                                </a> 
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
