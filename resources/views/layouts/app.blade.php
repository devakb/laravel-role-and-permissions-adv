<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@config('app.name')</title>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

      <link rel="stylesheet" href="{{ asset('Auth/Admin/App.css') }}">
      <link rel="stylesheet" href="{{ asset('Auth/Admin/Custom.css') }}">
      <link rel="stylesheet" href="{{ asset('Auth/Admin/plugins/Toastr/Toastr.css') }}">

      @livewireStyles
      @yield('styles')

   </head>
   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
         <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- ... no content ... --}}
            </ul>
         </nav>

         @include('partials.sidebar')

         <div class="content-wrapper">
            <div class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                     </div>
                     <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div>
                  </div>
               </div>
            </div>

            <section class="content">
               <div class="container-fluid px-md-5">
                  @yield('content')
               </div>
            </section>
         </div>

         <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
         </footer>
      </div>


      <script src="{{ asset('Auth/Admin/plugins/JQuery/jquery.min.js') }}"></script>
      <script src="{{ asset('Auth/Admin/App.js') }}"></script>
      <script src="{{ asset('Auth/Admin/plugins/Toastr/Toastr.js') }}"></script>
      <script src="{{ asset('Auth/Admin/plugins/Toastr/init.js') }}"></script>

      <script>
          @if(Session::has('showSuccessMessage'))
            toastr.success("{{ Session::get('showSuccessMessage') }}");
          @endif
          @if(Session::has('showInfoMessage'))
            toastr.info("{{ Session::get('showInfoMessage') }}");
          @endif
          @if(Session::has('showWarningMessage'))
            toastr.warning("{{ Session::get('showWarningMessage') }}");
          @endif
          @if(Session::has('showErrorMessage'))
            toastr.error("{{ Session::get('showErrorMessage') }}");
          @endif
      </script>

      @livewireScripts
      @yield('scripts')
   </body>
</html>
