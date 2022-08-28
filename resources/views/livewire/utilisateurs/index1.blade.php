{{-- Page Utilisateurs --}}

<div class="row column_title">
      <div class="col-md-12">
          <div class="page_title">
                <h2><b style="font-weight:bold;">{{ userFullName() }}</b>, Bienvenu Sur votre Dashboard !</h2>
          </div>
      </div>
</div>

<div class="dash_blog">
                       
{{-- Table d'utilisateurs --}}

@if($isBtnAddClicked)
  @include("livewire.utilisateurs.create")
@else
  @include("livewire.utilisateurs.liste")
@endif 

</div>







