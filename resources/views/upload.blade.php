@extends('layouts.home')

@section('content')

<script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>
<link href="{{asset("materialize/css/materialize.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
<link href="{{asset("materialize/css/style.css")}}" type="text/css" rel="stylesheet" media="screen,projection">

              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <ul class="collection">
                    <li class="collection-item avatar email-unread">
                        <i class="mdi-file-cloud-upload icon blue-text"></i>
                        <span class="email-title">Form Upload</span>
                        <p class="truncate grey-text ultra-small"><i>Last update 15 Agustus 2015...</i></p>

                      <div class="row"> 
                        <form class="col s12" action="{{url('importfile')}}" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="file-field input-field col s12">
                            <input placeholder="file extension.csv" class="file-path validate" type="text"/>
                            <div class="btn small waves-effect waves-light " style="width:100px">
                              <span style="font-size: smaller;">Browse file</span>
                              <input name="csv" type="file" />
                            </div>
                          </div>
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Upload
                                  <i class="mdi-content-send right"></i>
                              </button>

                          </div>
                        </form>
                      </div>
                    </li>
                   </ul>
                </div>
              </div>
<!--end container-->
<script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>


@endsection