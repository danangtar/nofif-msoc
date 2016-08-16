@extends('layouts.home')

@section('content')

<script type="text/javascript" src="materialize/js/jquery-1.11.2.min.js"></script>
<link href="{{asset("materialize/css/materialize.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
<link href="{{asset("materialize/css/style.css")}}" type="text/css" rel="stylesheet" media="screen,projection">
    <div class="row">
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">Upload</h5>
                <ol class="breadcrumb">
                  <li><a href="">Dashboard</a>
                  </li>
                  <li><a href="">Upload</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->    
    
              <!-- Form with validation -->
              <div class="col s12 m12 l6">
                <div class="card-panel">
                  <ul class="collection">
                    <li class="collection-item avatar email-unread">
                        <i class="mdi-file-cloud-upload icon blue-text"></i>
                        <span class="email-title"> Upload Form</span>
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
                      </div>
                    </li>
                   </ul>
                </div>
              </div>
<!--end container-->
    </div>
<script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>


@endsection