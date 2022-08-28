{{-- Topbar --}}
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
                                 {{-- <li><a href="#" data-widget="fullscreen" role="button"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li> --}}
                             </ul>
                      
                              <ul class="user_profile_dd"> 
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><img class="img-responsive rounded-circle" src="{{ asset ('images/layout_img/user.png') }}" alt="#"/><span class="name_user">{{ userFullName() }}</span></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route ('edit_profile') }}"> <i class="fa fa-user"></i> Edit Profile</a>
                                       <a class="dropdown-item" href="{{ route ('edit_password') }}"> <i class="fa fa-gear"></i> Setting</a>
                                       {{-- <a class="dropdown-item" href="{{ route ('admin.logout') }}"><i class="fa fa-sign-out"></i> <span> Log Out</span></a> --}}

                                       <a class="dropdown-item" href="{{ url('logout') }}" 
                                          onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                       <i class="fa fa-sign-out"></i> Logout 
                                       </a>
                                        <form id="logout-form" action="{{ url('/logout') }}"     method="POST" class="d-none">
                                         {{ csrf_field() }}
                                        </form>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>