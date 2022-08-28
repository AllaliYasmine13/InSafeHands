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

 <div class="dash_blog">
        <div class="dash_blog_inner">
               {{-- <div class="dash_head">
                     <h3><span><i class="fa fa-comments-o"></i> Updates</span><span class="plus_green_bt"><a href="#">+</a></span></h3>
              </div> --}}

        <livewire:rdvs-component/>
            
        </div>
 </div>

@endsection