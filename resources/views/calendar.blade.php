<!-- dashboard inner -->
@extends("layouts.master")

@section("contenu")

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2><b style="font-weight:bold;">{{ userFullName() }}</b>, Bienvenu Sur votre Dashboard !</h2> 
        </div>
    </div>
</div>

                     <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">                     
                     <!-- row -->
                     <div class="row">
                        <!-- invoice section -->
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><i class="fa fa-calendar" aria-hidden="true"></i> Calendrier</h2>
                                 </div>
                              </div>
                              <div class="full padding_infor_info">
                                 <div class="invoice_inner">
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="white_shd full margin_bottom_30">
                                             {{-- <div class="full graph_head">
                                                <div class="heading1 margin_0">
                                                   <h2>Calendar</h2>
                                                </div>
                                             </div> --}}
                                             <div class="full progress_bar_inner">
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <div class="full">
                                                         <div class="ui calendar" id="example14"></div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                  </div>
               </div>
               <!-- end dashboard inner -->
@endsection
         