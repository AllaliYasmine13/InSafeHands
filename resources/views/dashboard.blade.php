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
                    @can("Admin")
                      <x-admin_dashboard/>  
                    @endcan

                    <!--secretaire  -->
                    @can("Secretaire")
                       <x-secretaire_dashboard/>
                    @endcan

                    <!-- medecin -->
                    @can("Medecin")
                       <x-medecin_dashboard/>  
                    @endcan

                   <!--patient-->
                    @can("Patient")
                       <x-patient_dashboard/>   
                    @endcan

                    {{-- @cannot("Medecin_Coordinateur")
                      <x-admin_dashboard/> 
                      
                    @endcannot --}}
@endsection
