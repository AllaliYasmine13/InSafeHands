<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title> Dashboard -In Safe Hands Center-</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content=""> 
      <!--charts favico-->
      <!-- Meta -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="" />
      <meta name="keywords" content="">
      <meta name="author" content="Phoenixcoded" />
      <!-- vendor css -->
      <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
      <!--end charts favico-->
      <!-- site icon -->
      <link rel="icon" href="{{ asset ('images/logo/logo_o.png') }}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{asset('style.css')}}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{asset('css/colors.css')}}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{asset('css/bootstrap-select.css')}}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{asset('css/custom.css')}}" />   

      {{-- Bootstrap Styles --}} 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
      {{-- <link rel ="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> --}}
      <!---->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
      @livewireStyles
      
</head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <x-sidebar/>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <x-topbar/>
               <!-- end topbar -->

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                 
                     @yield("contenu")
                   
                  </div>
               </div>
             </div>
        </div>
      </div>
      <!--charts script-->
      <!-- Required Js --> 
      <script src="{{ asset('js/vendor-all.min.js')}}"></script> 
      {{-- <script src="{{ asset('js/plugins/bootstrap.min.js')}}"></script>
      <script src="{{ asset('js/pcoded.min.js')}}"></script> --}}
      <script src="{{ asset('js/plugins/apexcharts.min.js')}}"></script>
      <script src="{{ asset('js/pages/chart-apex.js')}}"></script>
      <!--end charts script--> 
      <!-- jQuery -->
      <script src="../../plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
      <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

     <!-- jQuery -->
      <script src="{{ asset('js/jquery.min.js')}}"></script>
      <script src="{{ asset('js/popper.min.js')}}"></script>
      <script src="{{ asset('js/bootstrap.min.js')}}"></script>
      <!-- wow animation -->
      <script src="{{ asset('js/animate.js')}}"></script>
      <!-- select country -->
      <script src="{{ asset('js/bootstrap-select.js')}}"></script>
      <!-- owl carousel -->
      <script src="{{ asset('js/owl.carousel.js')}}"></script> 
      <!-- nice scrollbar -->
      <script src="{{ asset('js/perfect-scrollbar.min.js')}}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js')}}"></script>
      <script src="{{ asset('js/chart_custom_style1.js')}}"></script>

      <!-- REQUIRED SCRIPTS -->
      <script src="{{ mix('js/app.js') }}"></script>  

      <!--livewire-->
      {{-- Bootstrap Scripts --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
      <!---->
      <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
      {{-- <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> --}}

      @stack('scripts')
      @livewireScripts

   </body>
</html>

@push('scripts')
<script>
        window.addEventListener('close-modal', event =>{
            $('#addUserModal').modal('hide');
            $('#editUserModal').modal('hide');
            $('#deleteUserModal').modal('hide');
          
        });

        window.addEventListener('show-edit-user-modal', event =>{
            $('#editUserModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteUserModal').modal('show');
          
        });

        window.addEventListener('show-view-user-modal', event =>{
            $('#viewUserModal').modal('show');
          
        });
</script>

@endpush 