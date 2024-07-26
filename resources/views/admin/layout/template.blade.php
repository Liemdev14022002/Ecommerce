{{-- 
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    @yield('title')
    

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('dashboard/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <script src="{{asset('dashboard/assets/vendor/js/helpers.js')}}"></script>

    <script src="{{asset('dashboard/assets/js/config.js')}}"></script>
    <style>
      @media print {
          .no-print {
              display: none;
          }
          .print-container {
              padding: 20px;
              margin: auto;
              width: 100%;
          }
      }
  </style>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <div class="no-print">
          @include('admin.includes.menubar')
        </div>
        <div class="layout-page">
          <div class="no-print">
            @include('admin.includes.sidebar')
          </div>

          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
            </div>

            <footer class="content-footer footer bg-footer-theme no-print">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle no-print"></div>
    </div>

    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
  
    <script src="{{asset('dashboard/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/js/menu.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/main.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/dashboards-analytics.js')}}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html> --}}
<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    @yield('title')
    

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('dashboard/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('dashboard/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('dashboard/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <script src="{{asset('dashboard/assets/vendor/js/helpers.js')}}"></script>

    <script src="{{asset('dashboard/assets/js/config.js')}}"></script>

    <style>
      @media print {
          .no-print {
              display: none;
          }
          .print-container {
              padding: 20px;
              margin: auto;
              width: 100%;
          }
      }
  </style>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <div class="no-print">
          @include('admin.includes.menubar')
        </div>
        <div class="layout-page">
          <div class="no-print">
            @include('admin.includes.sidebar')
          </div>

          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              @yield('content')
            </div>

            <footer class="content-footer footer bg-footer-theme no-print">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , made with ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>

            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle no-print"></div>
    </div>

    <!-- Thêm đoạn mã này vào đây -->
    <script>
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    </script>
    
    <script src="{{asset('dashboard/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/js/menu.js')}}"></script>
    <script src="{{asset('dashboard/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/main.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/dashboards-analytics.js')}}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>