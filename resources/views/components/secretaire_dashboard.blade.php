{{-- Secretaire Dashboard --}}

 <!-- dashboard inner -->

 <div class="row column4 graph">
       <div class="col-md-6 margin_bottom_30">
               <div class="dash_blog">
                     <div class="dash_blog_inner">
                           <div class="dash_head">
                               <h3><span><i class="fa fa-calendar"></i> Liste Des RDVs</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                           </div>                                 
                           <div class="task_list_main">
                              <ul class="task_list">
                                 <li><a href="#">Rendez-vous N°1 de monsieur Allali Mohamed</a><br><strong>10:00 AM</strong></li>
                                 <li><a href="#">Rendez-vous N°2 de madame Allali Tasnime</a><br><strong>11:00 AM</strong></li>
                                 <li><a href="#">Rendez-vous N°3 de Monsieur Korso Youcef</a><br><strong>14:00 AM</strong></li>
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
                                    <i class="fa fa-comments-o red_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">Messages</p>
                                    <h1>10</h1>
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
                                    <i class="fa fa-calendar green_color"></i>
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">Total RDVs</p>
                                    <h1>{{ RdvsCounter() }}</h1>
                                 </div>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between"> 
                                   <a class="big text-blue stretched-link" href="{{route('Secretaire.gestion_des_rdvs')}}"> 
                                   View Details</a>
                                 <div class="big text-blue">
                                    <i style="blue2_color" class="fa fa-chevron-right"></i>
                                 </div>     
                             </div>
                           </div>
                        </div>                       
                     </div> 

                     <div class="center">                            
                        <img width="300" src="{{ asset('images/layout_img/pc.png')}}"/>                            
                           {{-- <img src="images/layout_img/pc.png"/> --}}
                     </div> 

                  </div> 
                                   
               </div>
               
</div>
               <!-- end dashboard inner -->