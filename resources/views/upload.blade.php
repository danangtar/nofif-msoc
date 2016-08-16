@extends('layouts.home')

@section('content')

<script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>
<link href="{{asset("materialize/css/materialize.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
<link href="{{asset("materialize/css/style.css")}}" type="text/css" rel="stylesheet" media="screen,projection">

              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <ul class="collection">
<!--                     <div id="email-list" class="col s10 m4 l4 card-panel z-depth-1">-->
                        <li class="collection-item avatar email-unread">
                            <i class="mdi-file-cloud-upload icon blue-text"></i>
                            <span class="email-title">Form Upload</span>
                            <p class="truncate grey-text ultra-small"><i>Last update 15 Agustus 2015...</i></p>
                        
                      <div class="row"> 
                        <form class="col s12">
                          <div class="row">
                            <div class="file-field input-field col s12">
                            <input placeholder="file extension.csv" class="file-path validate" type="text"/>
                            <div class="btn small waves-effect waves-light " style="width:100px">
                              <span style="font-size: smaller;">Browse file</span>
                              <input type="file" />
                            </div>
                          </div>
                          </div>
                        </form>
                       </li>
                  
                    
                  </div>
<!--                    </div>-->
                </ul>
                  
                </div>
              </div>
<!--end container-->
<script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>


@endsection