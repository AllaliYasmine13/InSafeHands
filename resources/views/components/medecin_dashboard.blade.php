{{-- Secretaire Dashboard --}}

 <!-- dashboard inner -->

 <div class="row column4 graph">
       <div class="col-md-6 margin_bottom_30">
               <div class="dash_blog">
                     <div class="dash_blog_inner">
                           <div class="dash_head">
                               <h3><span><i class="fa fa-group"></i> Liste Des Patients</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                           </div>                                 
                           <div class="msg_list_main">
                                   <ul class="msg_list">
                                       <li>
                                          <span><img src="images/user.png" class="img-responsive" alt="#" /></span>
                                          <span>
                                          <span class="name_user">Allali youcef</span>
                                          <span class="msg_user">----------------</span>
                                          <span class="time_ago">2 weeks ago</span>
                                          </span>
                                       </li>
                                       <li>
                                          <span><img src="images/user.png" class="img-responsive" alt="#" /></span>
                                          <span>
                                          <span class="name_user">Dib Fatima</span>
                                          <span class="msg_user">-----------------</span>
                                          <span class="time_ago">1 week ago</span>
                                          </span>
                                       </li>
                                       <li>
                                          <span><img src="images/user.png" class="img-responsive" alt="#" /></span>
                                          <span>
                                          <span class="name_user">Koubci Tasnime</span>
                                          <span class="msg_user">-----------------</span>
                                          <span class="time_ago">1 week ago</span>
                                          </span>
                                       </li>
                                       
                                    </ul>
                           </div>
                        
                     </div>
               </div>
         </div>
                        
            <div class="col-md-6">                              
               <div class="container-fluid">
                    <div class="row column1">                       
                        <div class="col-md-6">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-clock-o blue1_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">Salle d'attente</p>
                                    <h1>15</h1>
                                 </div>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between"> 
                                   <a class="big text-blue stretched-link" href="#"> 
                                   View Details</a>
                                 <div class="big text-blue">
                                    <i style="blue2_color" class="fa fa-chevron-right"></i>
                                 </div>     
                             </div>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-user yellow_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">Total Patients</p>
                                    <h1>{{PatientsCounter()}}</h1>
                                 </div>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between"> 
                                   <a class="big text-blue stretched-link" href="{{route('Medecin.patients_agees')}}"> 
                                   View Details</a>
                                 <div class="big text-blue">
                                    <i style="blue2_color" class="fa fa-chevron-right"></i>
                                 </div>     
                             </div>
                           </div>
                        </div>                       
                     </div> 

                     <div class="center">                            
                        <img width="300" src="{{ asset('images/layout_img/doc.png')}}"/>                            
                           {{-- <img src="images/layout_img/pc.png"/> --}}
                     </div> 

                  </div> 
                                   
               </div>
               
</div>
               <!-- end dashboard inner -->