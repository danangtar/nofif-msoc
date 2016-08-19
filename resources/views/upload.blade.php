@extends('layouts.home')

@section('content')
<script type="text/javascript" src="{{asset("materialize/js/jquery-1.11.2.min.js")}}"></script>
<script src="{{asset("materialize/js/plugins/sweetalert/sweetalert.min.js")}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset("materialize/js/plugins/sweetalert/sweetalert.css")}}">

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
        <!--breadcrumbs end-->    <br>
              <!-- Form with validation -->
              <div class="col s12 m12 l3">
                <div class="valign-wrapper">
                  <h5 class="valign"></h5>
                </div>
              </div>
              <div class="col s12 m12 l6">
                <div class="card-panel valign">
                  <ul class="collection">
                    <li class="collection-item avatar email-unread">
                        <i class="mdi-file-cloud-upload icon blue-text"></i>
                        <span class="email-title"> Upload Form</span>
                        <p class="truncate grey-text ultra-small"><i>Last update <?php $date = date_create($last_date); echo date_format($date,"d F Y H:i:s");?>...</i></p>

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
                              <button class="btn cyan waves-effect waves-light right" type="submit" name="action" >Upload
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
<!-- COBA DISINI BUR    -->

 <style>
     .sweet-alert {
         /*merah*/
         /*  background-color: #ffebee;*/
         /*hijau*/
         /*  background-color: #b9f6ca;*/
     }
 </style>
 
 <script>
     function alert_green(message) {
         swal({
             type: "success",
             title: "SUCCESS!!!",
             text: message,
             timer: 2000,
             showConfirmButton: false
         });
     }
     function alert_red(message) {
         swal({
             type: "error",
             title: "ERROR!!!",
             text: message,
             timer: 2000,
             showConfirmButton: false
         });
     }

     $( document ).ready(function() {
        <?php if($status=='success') echo "alert_green('Upload Success');";
     elseif ($status=='failed') echo "alert_red('Upload Error');";
     elseif ($status=='not_valid') echo "alert_red('Please Upload File CSV');";
         ?>
     } );

  </script>
    

    
<script type="text/javascript" src="{{asset("materialize/js/plugins.js")}}"></script>


@endsection