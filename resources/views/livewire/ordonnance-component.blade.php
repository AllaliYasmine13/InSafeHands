<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="dash_head">
                        <h3 style="float: left;"><span><i class="fa fa-pencil-square-o fa-2x"></i><b style="font-weight:bold;"><font size="+2"> Liste des Ordonnances</font></b></span></h3>
                        <button class="main_bt read_bt" style="float: right;" data-toggle="modal" data-target="#addOrdonnanceModal"><i class="fa fa-plus"></i><b style="font-weight:bold;">Ajouter Ordonnance</b></button>
                    </div>

                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <div class = "row mb-3">
                            <div class="col-md-12">
                                <label style="float:right;"><i class="fa fa-search orange_color"></i></label>
                                <input type="search" class="form-control w-25" placeholder="search" wire:model="searchTerm"
                                style="float:right;"/>                               
                           </div>
                        </div>

                    <!-- Table des Ordonnances-->

                     <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><b style="font-weight:bold;">ID Ordonnance</b></th>
                                    <th><b style="font-weight:bold;">Date Ordonnance</b></th>   
                                    <th><b style="font-weight:bold;">Nom Prenom</b></th>                                 
                                    <th><b style="font-weight:bold;">Ajouté</b></th>                                                                                                                                             
                                    <th style="text-align: center;"><b style="font-weight:bold;">Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($ordonnances->count() > 0)
                                    @foreach ($ordonnances as $ordonnance)
                                        <tr>
                                            <td>{{ $ordonnance->ordonnance_id }}</td>
                                            <td>{{ $ordonnance->date_ordonnance}}</td> 
                                            <td>{{ $ordonnance->Nom }} {{ $ordonnance->prenom }}</td>                                                                                          
                                            <td>{{ $ordonnance->created_at}}</td>   
                                                          
                                            {{-- <td style="text-align:center;">
                                                <button class="btn btn-sm btn-link" wire:click="viewOrdonnanceDetails({{ $ordonnance->id }})"> <i class="fa fa-info-circle fa-2x green_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="editOrdonnance({{ $ordonnance->id }})"> <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="deleteConfirmation({{ $ordonnance->id }})"> <i class="fa fa-trash-o fa-2x orange_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click=""> <i class="fa fa-print fa-2x" style="color:black"></i> </button>
                                            </td> --}}
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary" wire:click="viewOrdonnanceDetails({{ $ordonnance->id }})">View</button>
                                                <button class="btn btn-sm btn-primary" wire:click="editOrdonnance({{ $ordonnance->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $ordonnance->id }})">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="card-footer">
                             <div class="float-right">
                                 {{ $ordonnances->links() }} 
                             </div>
                       </div>                       
                <!-- end table des utilisateurs-->                        
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add ordonnances-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addOrdonnanceModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Add New Render-Vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeOrdonnanceData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="ordonnance_id">ID Ordonnance :</label>
                            <input type="number" id="ordonnance_idnom" class="form-control" wire:model="ordonnance_id">
                                @error('ordonnance_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="date_ordonnance">Date Ordonnance :</label>
                            <input type="date" id="date_ordonnance" class="form-control" wire:model="date_ordonnance">
                                @error('date_ordonnance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="service">Service :</label>
                            <select id="service" class="form-control @error('service') is-invalid @enderror" wire:model="service">
                                <option value="">---------</option>
                                <option value="consultation_generale">Consultation générale</option>
                                <option value="radiologie">Radiologie</option>
                                <option value="reeducation_readaptation">rééducation et de réadaptation fonctionnel</option>
                                <option value="gériatrie">Gériatrie</option>
                                <option value="consultation_orl">consultation ORL</option>
                                <option value="kinesitherapie">Kinésithérapie</option>
                                <option value="vaccination">vaccination</option>
                                <option value="salle_observation">salles d'Observation</option>
                                <option value="chirurgie_dentaire">Chirurgie Dentaire</option>
                                <option value="garde">Garde</option>
                            </select>
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="medecin_traitant">Medecin Traitant :</label>
                            <select id="medecin_traitant" class="form-control @error('medecin_traitant') is-invalid @enderror" wire:model="medecin_traitant">
                                <option value="">---------</option>
                                <option value="halfaoui_amel">Mr Halfaoui Amel -Généraliste-</option>
                                <option value="korso_morade">Mr Korso Mourad -Neurologue-</option>
                                <option value="ait_abdelrahim">Mr Ait Abdelrahim -ORL-</option>
                                <option value="Tadlaoui_meryem">Mme tadlaoui Meryem -Psycologue-</option>
                                <option value="azzouni_youcef">Mr Azzouni Youcef -Ophtalmologue-</option>
                                <option value="aissaoui_kamel">Mr Aissaoui Kamel -Neufrologue-</option>
                                <option value="benmoussa_anes">Mr Benmoussa Anes -Traumatologue-</option>
                                <option value="benachenhou_karim">Mr Benachenhou Karim -Dantiste-</option>
                               
                            </select>
                            @error('medecin_traitant')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" class="form-control" wire:model="nom">
                                @error('nom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="prenom">Prenom :</label>
                            <input type="text" id="prenom" class="form-control" wire:model="prenom">
                                @error('prenom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="age">Age :</label>
                            <input type="text" id="age" class="form-control" wire:model="age">
                                @error('age')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Ordonnance</b></button>
                            </div>
                        </div>
                    </form>
                </div>
              

           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editOrdonnanceModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Ordonnance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="editOrdonnanceData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="ordonnance_id">ID Ordonnance :</label>
                            <input type="number" id="ordonnance_idnom" class="form-control" wire:model="ordonnance_id">
                                @error('ordonnance_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="date_ordonnance">Date Ordonnance :</label>
                            <input type="date" id="date_ordonnance" class="form-control" wire:model="date_ordonnance">
                                @error('date_ordonnance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="service">Service :</label>
                            <select id="service" class="form-control @error('service') is-invalid @enderror" wire:model="service">
                                <option value="">---------</option>
                                <option value="consultation_generale">Consultation générale</option>
                                <option value="radiologie">Radiologie</option>
                                <option value="reeducation_readaptation">rééducation et de réadaptation fonctionnel</option>
                                <option value="gériatrie">Gériatrie</option>
                                <option value="consultation_orl">consultation ORL</option>
                                <option value="kinesitherapie">Kinésithérapie</option>
                                <option value="vaccination">vaccination</option>
                                <option value="salle_observation">salles d'Observation</option>
                                <option value="chirurgie_dentaire">Chirurgie Dentaire</option>
                                <option value="garde">Garde</option>
                            </select>
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="medecin_traitant">Medecin Traitant :</label>
                            <select id="medecin_traitant" class="form-control @error('medecin_traitant') is-invalid @enderror" wire:model="medecin_traitant">
                                <option value="">---------</option>
                                <option value="halfaoui_amel">Mr Halfaoui Amel -Généraliste-</option>
                                <option value="korso_morade">Mr Korso Mourad -Neurologue-</option>
                                <option value="ait_abdelrahim">Mr Ait Abdelrahim -ORL-</option>
                                <option value="Tadlaoui_meryem">Mme tadlaoui Meryem -Psycologue-</option>
                                <option value="azzouni_youcef">Mr Azzouni Youcef -Ophtalmologue-</option>
                                <option value="aissaoui_kamel">Mr Aissaoui Kamel -Neufrologue-</option>
                                <option value="benmoussa_anes">Mr Benmoussa Anes -Traumatologue-</option>
                                <option value="benachenhou_karim">Mr Benachenhou Karim -Dantiste-</option>
                               
                            </select>
                            @error('medecin_traitant')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" class="form-control" wire:model="nom">
                                @error('nom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="prenom">Prenom :</label>
                            <input type="text" id="prenom" class="form-control" wire:model="prenom">
                                @error('prenom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="age">Age :</label>
                            <input type="text" id="age" class="form-control" wire:model="age">
                                @error('age')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Ordonnance</b></button>
                            </div>
                        </div>
   
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--end edit utilisateur-->

<!-- delete ordonnance-->


<div wire:ignore.self class="modal fade bd-example-modal-lg" id="deleteOrdonnanceModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Render-Vous data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteOrdonnanceData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

<!--end delete utilisateur-->

<!-- view ordonnance-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="viewOrdonnanceModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ordonnance Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewOrdonnanceModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Ordonnance ID: </th>
                                <td>{{ $view_ordonnance_id }}</td>
                            </tr>


                            <tr>
                                <th>Date Ordonnance : </th>
                                <td>{{ $view_ordonnance_date_ordonnance }}</td>
                            </tr>

                            <tr>
                                <th>Servide: </th>
                                <td>{{ $view_ordonnance_service }}</td>
                            </tr>

                            <tr>
                                <th>Medecin Traitant: </th>
                                <td>{{ $view_ordonnance_medecin_traitant}}</td>
                            </tr>


                            <tr>
                                <th>Nom: </th>
                                <td>{{ $view_ordonnance_nom }}</td>
                            </tr>
                            <tr>
                                <th>Prénom: </th>
                                <td>{{ $view_ordonnance_prenom }}</td>
                            </tr>
                            <tr>
                                <th>Age: </th>
                                <td>{{ $view_ordonnance_age }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
 
        </div>

    </div>
                                    
    
</div>
 

<!-- end view utilisateur-->
</div>



@push('scripts')

<script>
        window.addEventListener('close-modal', event =>{
            $('#addOrdonnanceModal').modal('hide');
            $('#editOrdonnanceModal').modal('hide');
            $('#deleteOrdonnanceModal').modal('hide');
          
        });

        window.addEventListener('show-edit-ordonnance-modal', event =>{
            $('#editOrdonnanceModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteOrdonnanceModal').modal('show');
          
        });

        window.addEventListener('show-view-ordonnance-modal', event =>{
            $('#viewOrdonnanceModal').modal('show');
          
        });



    </script>

@endpush 

