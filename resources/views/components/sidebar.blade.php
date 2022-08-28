{{-- Sidebar --}}
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
                        <div class="user_img"><img class="img-responsive" src="{{ asset ('images/layout_img/user.png') }}" alt="#" /></div>
                        <div class="user_info">
                           <h6> {{ userFullName() }} </h6>
                           <p class="text-muted text-center"> Role : {{ getRolesName()}} </p>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4></h4>
                  <ul class="list-unstyled components">
                   {{-- Espace Admin --}}
                     @can("admin")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home"> </i> <span> Accueil </span></a>
                       
                     </li>
                     
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" class="dropdown-toggle"><i class="fa fa-cogs"></i> <span> Gestion Des Utilisateurs</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li class="nav-item ">
                              <a class="nav-link" href="{{route('admin.gestions.users.index')}}">> <span> Utilisateurs</span></a>
                           </li>
                           <li>
                              <a href="">> <span> Roles et Permission</span></a>
                           </li>
                        </ul>
                     </li>
                     
                     <li>
                        <a href="" data-toggle="collapse" ><i class="fa fa-user-plus"></i> <span> Gestion Des Patients Agées </span></a>
 
                     </li>
                     <li>
                        <a href="" data-toggle="collapse" ><i class="fa fa-exchange"></i> <span> Gestion Des Locations </span></a>
 
                     </li>
                     <li>
                        <a href="" data-toggle="collapse" ><i class="fa fa-credit-card"></i> <span> Gestion Des Paiements </span></a>
 
                     </li>
                     <li><a href="{{ route('admin.dashboard.certificat_medical') }}"><i class="fa fa-folder-open"></i> <span> Certificat Médical</span></a></li>
                      <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar"></i> <span>Calendrier</span></a>
                       
                     </li>
                     <li>
                        <a href="{{ route ('admin.dashboard.contact')}}">
                        <i class="fa fa-paper-plane"></i> <span>Contact</span></a>
                     </li> 
                     <li><a href="{{ route ('admin.dashboard.statistiques')}}"><i class="fa fa-bar-chart-o"></i> <span>Statistiques</span></a></li> 
                     @endcan

                  {{-- Espace Secretaire --}}
                  @can("secretaire")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home yellow_color"> </i> <span> Accueil </span></a>
                       
                     </li>
                     
                     <li><a href="{{route('gestion_des_rdvs')}}"><i class="fa fa-calendar-check-o green_color"></i> <span>Gestion Des RDV </span></a></li>
                     {{-- <li>
                        <a href="#element" ><i class="fa fa-folder-open green_color"></i> <span> Gestion Des RDV </span></a>
                     </li> --}}
    
                     <li><a href="tables.html"><i class="fa fa-print orange_color"></i> <span> Impression </span></a></li>
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar blue2_color"></i> <span>Calendrier</span></a>
                       
                     </li>
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                    
                  @endcan  
                  {{-- Espace Medecin --}}
                  @can("medecin")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home yellow_color"> </i> <span> Accueil </span></a>
                       
                     </li>
                     <li>
                        <a href="{{ route('medecin.patients_agees.index')}}"><i class="fa fa-user-plus green_color"></i> <span> Gestion Des Patients Agées </span></a>
 
                     </li>
                     <li><a href=""><i class="fa fa-calendar-check-o orange_color"></i> <span> Consultation Des RDV </span></a></li>
                     <li>
                        <a href="#element" ><i class="fa fa-folder-open green_color"></i> <span> Certificats Médicals </span></a>
                     </li>
    
                     <li><a href="tables.html"><i class="fa fa-print orange_color"></i> <span>Impression</span></a></li>
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar blue2_color"></i> <span>Calendrier</span></a>
                       
                     </li>
 
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                   @endcan

                  {{-- Espace Patient --}}
                  @can("patient")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home yellow_color"> </i> <span> Accueil </span></a>
                       
                     </li>
                     
                     <li><a href="{{route('patient.dashboard.consultation_des_rdv')}}"><i class="fa fa-calendar-check-o orange_color"></i> <span> Consultation des RDV </span></a></li>
                     <li>
                        <a href="{{route ('patient.dashboard.consultation_certificat')}}" ><i class="fa fa-folder-open green_color"></i> <span> Certificat Médical </span></a>
                     </li>
    
                     <li><a href="tables.html"><i class="fa fa-print orange_color"></i> <span>Impression</span></a></li>
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar blue2_color"></i> <span>Calendrier</span></a>
                       
                     </li>
                     <li>
                        <a href="contact.html">
                        <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                     </li>
                  @endcan
                  </ul>
 
               </div>
            </nav>
 