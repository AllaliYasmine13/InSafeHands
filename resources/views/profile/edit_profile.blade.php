<!-- dashboard edit profile -->
@extends("layouts.master")

@section("contenu")

<!-- dashboard inner -->
 <div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2><b style="font-weight:bold;">{{ userFullName() }}</b>, Bienvenu Sur votre Profile!</h2> 
        </div>
    </div>
</div>

<!-- row -->
{{-- <div class="row column1">
      <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="white_shd full margin_bottom_30">
                    <div class="full graph_head">
                        <div class="heading1 margin_0">
                            <h2>My profile</h2>
                        </div>
                    </div>
            
<div class="full price_table padding_infor_info">
      <div class="row"> --}}
          <!-- user profile section --> 
             <!-- profile image -->
                {{-- <div class="col-lg-12">
                    <div class="full dis_flex center_text">
                        <div class="profile_img"><img width="150" class="rounded-circle" src="{{ asset('images/layout_img/t2.jpg')}}"  /></div>
                            <div class="profile_contant">
                                <div class="contact_inner">
                                     <h3><strong><b style="font-weight:bold;"> User Profile : </b></strong> {{ userFullName() }}</h3>
                                     <p><strong><b style="font-weight:bold;"> User Role : </b></strong> {{ getRolesName() }}</p>
                                     <ul class="list-unstyled">
                                     <li></i><strong><b style="font-weight:bold;"> User Email : </b></strong> {{ usergetEmail() }}</li>                                               
                                     </ul>
                                </div>
                            </div>
                       </div>
                   </div>
                </div>
       </div> --}}

        <!-- Modal content-->
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
            </div> --}}
            <form method="POST" id="editProfileForm" enctype="multipart/form-data">
                {{-- <div class="alert alert-info">
                    Note : Your Profile Has been Updating Succefully!
                </div> --}}
                <div class="modal-body">
                    <div class="alert alert-danger d-none" id="editProfileValidationErrorsBox"></div>
                    <input type="hidden" name="user_id" id="pfUserId">
                    <input type="hidden" name="is_active" value="1">
                    {{csrf_field()}}
                    <div class="row">
                    <div class="form-group col-sm-6 d-flex">
                            <div class="col-sm-4 col-md-6 pl-0 form-group">
                                <label>Profile Image:</label>
                                <br>
                                <label
                                        class="image__file-upload btn btn-primary text-white"
                                        tabindex="2"> Choose
                                    <input type="file" name="photo" id="pfImage" class="d-none">
                                </label>
                            </div>
                            <div class="col-sm-3 preview-image-video-container float-right mt-1">
                                <img id='edit_preview_photo'
                                     class="img-thumbnail user-img user-profile-img profilePicture"
                                     src="{{asset('images/layout_img/user.png')}}"/>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Name:</label><span class="required">*</span>
                            <input type="text" name="name" id="pfName" class="form-control" required autofocus
                                   tabindex="1">
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Email:</label><span class="required">*</span>
                            <input type="text" name="email" id="pfEmail" class="form-control" required tabindex="3">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnPrEditSave"
                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                tabindex="5">Save
                        </button>
                        <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>

</div>
      </div>
</div>
      </div>

@endsection