 <!-- dashboard inner --> 
   <div class="row column4 graph">
            <div class="col-md-6">                 
               <!---->
                <div class="container-fluid">
                     <div class="row column1">
                        <div class="col-md-6">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div> 
                                    <i class="fa fa-users blue2_color"></i>                                
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div class="total_no">
                                    <p class="total_no">Totals Users</p>
                                    <h1>{{ UserCounter() }}</h1>
                                 </div>
                              </div>
                             <div class="card-footer d-flex align-items-center justify-content-between"> 
                                   <a class="big text-blue stretched-link" href="{{route('Admin.gestions.utilisateur')}}"> 
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
                </div>
         </div>
</div>

<div class="col-md-6">
     <div class="center">                            
             <img width="300" src="{{ asset('images/layout_img/11.png')}}"/>                                                      
       </div> 
     </div>
</div>

</div>
      
<!-- end dashboard inner -->