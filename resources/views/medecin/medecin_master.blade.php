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
      <title>Page Médecin</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- site icon -->
      <link rel="icon" href="{{ asset ('images/logo/logo.png') }}" type="image/png" />
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
                        <a href="index.html"><img class="logo_icon img-responsive" src="{{ asset ('images/logo/logo_icon.png') }}" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" src="{{ asset ('images/layout_img/doctor_01.jpg') }}" alt="#" /></div>
                        <div class="user_info">
                           <h6> Médecin </h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     
                     <li><a href=""><i class="fa fa-calendar-check-o orange_color"></i> <span> Consultation </span></a></li>
                     <li>
                        <a href="#element" ><i class="fa fa-folder-open green_color"></i> <span> Certificat Médical </span></a>
                     </li>
    
                     <li><a href="tables.html"><i class="fa fa-print orange_color"></i> <span>Impression</span></a></li>
                     <li>
                        <a href="#apps" ><i class="fa fa-object-group blue2_color"></i> <span>Calendrier</span></a>
                       
                     </li>
                     <li>
                        <a href="#apps" ><i class="fa fa-user-md blue2_color"></i> <span>Médecin Info</span></a>
                       
                     </li>
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                     
                     
                     <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Statistiques </span></a></li>
                   
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
                           <a href="index.html"><img class="img-responsive" src="{{ asset ('images/logo/logo.png') }}" alt="#" /></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd"> 
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ asset ('images/layout_img/doctor_01.jpg') }}" alt="#" /><span class="name_user">Médecin</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html">My Profile</a>
                                       <a class="dropdown-item" href="settings.html">Settings</a>
                                       <a class="dropdown-item"href="{{ route('medecin.logout') }}" ><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
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
                     

                     @yield('medecin')

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