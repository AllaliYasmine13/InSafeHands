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
                     @can("Admin")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home"> </i> <span> Accueil </span></a>
                       
                     </li>               
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cogs"></i> <span> Gestion Des Utilisateurs</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="{{route('Admin.gestions.users.index')}}">> <span> Utilisateurs</span></a>
                           </li>
                           <li>
                              <a href="">> <span> Roles et Permission</span></a>
                           </li>
                        </ul>
                     </li>
                     {{-- <li>
                        <a href="" data-toggle="collapse" ><i class="fa fa-credit-card"></i> <span> Gestion Des Paiements </span></a>
 
                     </li> --}}                     
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar"></i> <span>Planner</span></a>
                       
                     </li>
                     <li><a href="{{ route ('admin.dashboard.statistiques')}}"><i class="fa fa-bar-chart-o"></i> <span>Statistiques de Utilisateurs</span></a></li> 
                     @endcan

                  {{-- Espace Secretaire --}}
                  @can("Secretaire")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home"> </i> <span> Accueil </span></a>                      
                     </li>                    
                     <li><a href="{{route('Secretaire.gestion_des_rdvs')}}"><i class="fa fa-calendar-check-o"></i> <span>Gestion Des RDVs </span></a></li>   
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar"></i> <span>Planner</span></a>                      
                     </li>
                     <li><a href="{{ route ('admin.dashboard.statistiques')}}"><i class="fa fa-bar-chart-o"></i> <span>Statistiques des RDVs</span></a></li>                    
                  @endcan  
                  {{-- Espace Medecin --}}
                  @can("Medecin")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home"> </i> <span> Accueil </span></a>
                       
                     </li>
                     <li>
                        <a href="{{ route('Medecin.patients_agees')}}"><i class="fa fa-user-plus"></i> <span> Gestion Des Patients Agées </span></a>
                     </li>
                                         <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-folder-open"></i> <span> Documents Médicaux</span></a>
                     <ul class="collapse list-unstyled" id="element">
                           <li>
                              <a href="">> <span> Dossier Médical</span></a>
                           </li>
                           <li>
                              <a href="">> <span> Certificat Médical</span></a>
                           </li>
                           <li>
                              <a href="">> <span> Fiche Navette</span></a>
                           </li>
                           <li>
                              <a href="">> <span> Ordonnance</span></a>
                           </li>
                        </ul> 
                     </li>                    
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar"></i> <span>Calendrier</span></a>
                       
                     </li>
                     <li><a href="{{ route ('admin.dashboard.statistiques')}}"><i class="fa fa-bar-chart-o"></i> <span>Statistiques des Patients Agées</span></a></li> 
                   @endcan
                  {{-- Espace Patient --}}
                  @can("Patient")
                     <li>
                        <a href="{{ route ('dashboard') }}"><i class="fa fa-home"> </i> <span> Accueil </span></a>                      
                     </li>                   
                     <li><a href="{{route('patient.dashboard.consultation_des_rdv')}}"><i class="fa fa-calendar-check-o"></i> <span> Consultation des RDV </span></a></li>
                     <li>
                        <a href="{{route ('patient.dashboard.consultation_certificat')}}" ><i class="fa fa-folder-open"></i> <span> Certificat Médical </span></a>
                     </li>   
                     <li>
                        <a href="{{ route('calendar') }}" ><i class="fa fa-calendar"></i> <span>Calendrier</span></a>                      
                     </li>
                  @endcan
                  </ul>
 
               </div>
            </nav>
 