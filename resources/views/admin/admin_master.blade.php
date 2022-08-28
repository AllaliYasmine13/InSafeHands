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
      <title>Page Administrateur</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- table --> 

      <link href="{{ asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
      <script src="{{ asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Bootstrap Table with Add and Delete Row Feature</title>
      <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans') }}">
      <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/icon?family=Material+Icons') }}">
      <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>
      <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>

      <!-- end table-->

      <!-- site icon -->
      <link rel="icon" href="{{ asset ('images/logo/logo_o.png') }}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset ('css/bootstrap.min.css') }}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset ('style.css') }}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset ('css/responsive.css') }}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset ('css/colors.css') }}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset ('css/bootstrap-select.css') }}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset ('css/perfect-scrollbar.css') }}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset ('css/custom.css') }}" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar"> 
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{ asset ('images/logo/logo_o.png') }}" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{ asset ('images/layout_img/doctor_02.jpg') }}" alt="#" /></div>
                        <div class="user_info">
                           <h6> Administrateur </h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>Droit D'accés Respecté</h4>
                  <ul class="list-unstyled components">
                   

                     <li>
                        <a href="{{ route ('admin.dashboard') }}"><i class="fa fa-home yellow_color"> </i> <span> Accueil </span></a>
                       
                     </li>
                     <li>
                        <a href="{{ route ('admin.dashboard.utilisateurs') }}"><i class="fa fa-group blue2_color"> </i> <span> Utilisateurs </span></a>
                       
                     </li>
                   
                     <li>
                        <a href="" data-toggle="collapse" ><i class="fa fa-user-plus green_color"></i> <span> Patients Agées </span></a>
 
                     </li>
                     

                     <li><a href="{{ route('admin.dashboard.certificat_medical') }}"><i class="fa fa-folder-open red_color"></i> <span>Certificat Médical</span></a></li>

                     
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Documents</span></a>
                        
                     </li>
                   
                     <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Planning</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                           <li>
                              <a href="profile.html">> <span>Profile</span></a>
                           </li>
                           <li>
                              <a href="project.html">> <span>Projects</span></a>
                           </li>
                     
                        </ul>
                     </li>

                     <li>
                        <a href="{{ route ('admin.dashboard.contact')}}">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                     
                     <li><a href="{{ route ('admin.dashboard.statistiques')}}"><i class="fa fa-bar-chart-o green_color"></i> <span>Statistiques</span></a></li>
                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><img class="img-responsive" src="{{ asset ('images/logo/logo_o.png') }}" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">1</span></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">1</span></a></li>
                              </ul>
                              <ul class="user_profile_dd"> 
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ asset ('images/layout_img/doctor_02.jpg') }}" alt="#"/><span class="name_user">Administrateur</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item" href="{{ route ('admin.logout') }}"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     

                     @yield('admin')

                      <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">
                       
                     </div>
                  </div>
               </div> 
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->  
      <script src="{{ asset ('js/jquery.min.js') }}"></script>
      <script src="{{ asset ('js/popper.min.js') }}"></script>
      <script src="{{ asset ('js/bootstrap.min.js') }}"></script>
      <!-- wow animation -->
      <script src="{{ asset ('js/animate.js') }}"></script>
      <!-- select country -->
      <script src="{{ asset ('js/bootstrap-select.js') }}"></script>
      <!-- owl carousel -->
      <script src="{{ asset ('js/owl.carousel.js') }}"></script> 
      <!-- chart js -->
      <script src="{{ asset ('js/Chart.min.js') }}"></script>
      <script src="{{ asset ('js/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset ('js/utils.js') }}"></script>
      <script src="{{ asset ('js/analyser.js') }}"></script>
      <!-- nice scrollbar -->
      <script src="{{ asset ('js/perfect-scrollbar.min.js') }}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset ('js/custom.js') }}"></script>
      <script src="{{ asset ('js/chart_custom_style1.js') }}"></script>
   </body>
</html>