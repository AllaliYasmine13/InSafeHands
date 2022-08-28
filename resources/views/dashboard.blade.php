@extends("layouts.master")

@section("contenu")

<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2><b style="font-weight:bold;">{{ userFullName() }}</b>, Bienvenu Sur votre Dashboard !</h2> 
        </div>
    </div>
</div>
                    <!-- Admin -->
                    @can("admin")
                      <x-admin_dashboard/>  
                    @endcan

                    <!--secretaire  -->
                    @can("secretaire")
                       <x-secretaire_dashboard/>
                    @endcan

                    <!-- medecin -->
                    @can("medecin")
                       <x-medecin_dashboard/>  
                    @endcan

                   <!--patient-->
                   @can("patient")
                       <x-patient_dashboard/>   
                  @endcan
@endsection
