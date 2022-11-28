<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ __('Five Splash') }}</title>
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
  <link href="{{ asset('material') }}/select2/select2.min.css" rel="stylesheet" />
  <style>
    .sidebar ul.collapse,
    ul.collapsing {
      list-style: none;
      padding-left: 20px;
    }

    .sidebar ul.collapse li:marker,
    ul.collapsing li:marker {
      display: none;
    }
  </style>
  <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
  <script src="{{ asset('material') }}/select2/select2.full.min.js"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      }
    });
  </script>
</head>

<body class="{{ $class ?? '' }}">
  @auth()
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
  @include('layouts.page_templates.auth')
  @endauth
  @guest()
  @include('layouts.page_templates.guest')
  @endguest
  <!-- 
		<div class="fixed-plugin">
          <div class="dropdown show-dropdown">
            <a href="#" data-toggle="dropdown">
              <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
              <li class="header-title"> Sidebar Filters</li>
              <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                  <div class="badge-colors ml-auto mr-auto">
                    <span class="badge filter badge-purple " data-color="purple"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-warning active" data-color="orange"></span>
                    <span class="badge filter badge-danger" data-color="danger"></span>
                    <span class="badge filter badge-rose" data-color="rose"></span>
                  </div>
                  <div class="clearfix"></div>
                </a>
              </li>
              <li class="header-title">Images</li>
              <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-1.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-2.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-3.jpg" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('material') }}/img/sidebar-4.jpg" alt="">
                </a>
              </li>
              <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-laravel" target="_blank" class="btn btn-primary btn-block">Free Download</a>
              </li>
              <li class="header-title">Want more components?</li>
                  <li class="button-container">
                      <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                        Get the pro version
                      </a>
                  </li>
              <li class="button-container">
                <a href="https://material-dashboard-laravel.creative-tim.com/docs/getting-started/laravel-setup.html" target="_blank" class="btn btn-default btn-block">
                  View Documentation
                </a>
              </li>
              <li class="button-container github-star">
                <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard-laravel" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
              </li>
              <li class="header-title">Thank you for 95 shares!</li>
              <li class="button-container text-center">
                <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
                <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
                <br>
                <br>
              </li>
            </ul>
          </div>
    </div>   -->
  <!--  Core JS Files   -->
  <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
  <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
  <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin   
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script> -->
  <!-- Chartist JS -->
  <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('material') }}/demo/demo.js"></script>
  <script src="{{ asset('material') }}/js/settings.js"></script>
  <script>

    $('.Download_Filtered_data').click(function() {

      var filter_position = $('#filter_position').val();
      var Location_Branch = $('#Location_Branch').val();
      var filter_Qualification = $('#filter_Qualification').val();
      var filter_Experience = $('#filter_Experience').val();

      $.ajax({
        type: 'POST',
        url: 'Job-application-download',
        data: {
          'position': filter_position,
          'Location_Branch': Location_Branch,
          'Experience': filter_Experience,
          'Qualification': filter_Qualification
        },
        xhrFields: {
          responseType: 'blob' // to avoid binary data being mangled on charset conversion
        },
        success: function(blob, status, xhr) {
          $ // check for a filename
          var filename = "";
          var disposition = xhr.getResponseHeader('Content-Disposition');
          if (disposition && disposition.indexOf('attachment') !== -1) {
            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
            var matches = filenameRegex.exec(disposition);
            if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
          }

          if (typeof window.navigator.msSaveBlob !== 'undefined') {
            // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
            window.navigator.msSaveBlob(blob, filename);
          } else {
            var URL = window.URL || window.webkitURL;
            var downloadUrl = URL.createObjectURL(blob);

            if (filename) {
              // use HTML5 a[download] attribute to specify filename
              var a = document.createElement("a");
              // safari doesn't support this yet
              if (typeof a.download === 'undefined') {
                window.location.href = downloadUrl;
              } else {
                a.href = downloadUrl;
                a.download = filename;
                document.body.appendChild(a);
                a.click();
              }
            } else {
              window.location.href = downloadUrl;
            }

            setTimeout(function() {
              URL.revokeObjectURL(downloadUrl);
            }, 100); // cleanup
          }
        }
      });
    });
  </script>
  @stack('js')
  <style>
    textarea.cke_dialog_ui_input_textarea {
      min-height: 400px;
    }
  </style>
</body>

</html>