@extends('patient.patient_master')
@section('patient')

                    <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Consultation des Certificats Médicals </h2> 


                              <input type="button" value="Envoyer" class="fa fa-print" onclick="self.location.href='cv.pdf'">
                              <input type="button" value="Imprimer" class="fa fa-print" onclick="self.location.href='cv.pdf'">
                              <input type="button" value="Telecharger" class="fa fa-print" onclick="self.location.href='cv.pdf'">

						<!-- Hidden li included to remove active class from about link when scrolled up past about section -->


					</ul>
				</div>

      <!--Success message-->
                  
      @if(Session::has('success'))

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  
</svg>
<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
           
       <div> &nbsp
          {{ Session::get('success') }} 
       </div>
</div>

@endif


     <!-- end Success message -->


                              
                           </div>
                        </div>
                     </div>



                           <div class="dash_blog">
                              <div class="dash_blog_inner">
                                 <div class="dash_head">
                                    <h3><span><i class="fa fa-comments-o"></i> Consultation</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
                                 </div>

                                 <livewire:rdvs-component/>
              
                                 <script type="text/javascript" src="https://form.jotform.com/jsform/221696875299578"></script>
                              </div>
                           </div>
                       
@endsection    