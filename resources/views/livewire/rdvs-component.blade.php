<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="dash_head">
                        <h3 style="float: left;"><span><i class="fa fa-pencil-square-o fa-2x"></i><b style="font-weight:bold;"><font size="+2"> Liste des Render-Vous</font></b></span></h3>
                        <button class="main_bt read_bt" style="float: right;" data-toggle="modal" data-target="#addRdvModal"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Rendez-vous</b></button>
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

                    <!-- Table des Utilisateurs-->

                     <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><b style="font-weight:bold;">ID</b></th>
                                    <th><b style="font-weight:bold;">Nom</b></th>   
                                    <th><b style="font-weight:bold;">Prenom</b></th>                                 
                                    <th><b style="font-weight:bold;">Télephone</b></th>
                                    <th><b style="font-weight:bold;">Médecin Traitant</b></th>
                                    <th><b style="font-weight:bold;">Date de RDV</b></th>                                                                                                           
                                    <th style="text-align: center;"><b style="font-weight:bold;">Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($rdvs->count() > 0)
                                    @foreach ($rdvs as $rdv)
                                        <tr>
                                            <td>{{ $rdv->rdv_id }}</td>
                                            <td>{{ $rdv->nom }}</td> 
                                            <td>{{ $rdv->prenom }}</td>                                            
                                            <td>{{ $rdv->num_tel}}</td>                                           
                                            <td>{{ $rdv->medecin_traitant}}</td>
                                            <td>{{ $rdv->select_date}}</td>
                                                          
                                            <td style="text-align:center;">
                                                <button class="btn btn-sm btn-link" wire:click="viewRdvDetails({{ $rdv->id }})"> <i class="fa fa-info-circle fa-2x green_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="editRdvs({{ $rdv->id }})"> <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="deleteConfirmation({{ $rdv->id }})"> <i class="fa fa-trash-o fa-2x orange_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click=""> <i class="fa fa-print fa-2x" style="color:black"></i> </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>Non Rendez-vous Trouvé !</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="card-footer">
                             <div class="float-right">
                                 {{ $rdvs->links() }} 
                             </div>
                       </div>                       
                <!-- end table des utilisateurs-->                        
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add utilisateur-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-calendar-check-o"></i> Ajouter Un Nouveau Render-Vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeRdvData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="rdv_id">N° RDV:</label>
                            <input type="number" id="rdv_id" class="form-control" wire:model="rdv_id">
                                @error('rdv_id')
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
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="num_tel">Télephone :</label>
                            <input type="number" id="num_tel" class="form-control" wire:model="num_tel">
                                @error('num_tel')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="email">Email :</label>
                            <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
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
                            <label for="select_date">Date de RDV :</label>
                            <input type="date" id="select_date" class="form-control" wire:model="select_date">
                                @error('select_date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="date_debut">Heurs Début :</label>
                            <input type="time" id="heure_debut" class="form-control" wire:model="heure_debut">
                                @error('heure_debut')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="heure_fin">Heure Fin :</label>
                            <input type="time" id="heure_fin" class="form-control" wire:model="heure_fin">
                                @error('heure_fin')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Add New RDV</b></button>
                            </div>
                        </div>
                    </form>
                </div>
              

           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-pencil-square-o"></i>  Modification d'un Rendez-vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="editRdvData">
                    
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="rdv_id">N° RDV:</label>
                            <input type="number" id="rdv_id" class="form-control" wire:model="rdv_id">
                                @error('rdv_id')
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
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="num_tel">Télephone :</label>
                            <input type="number" id="num_tel" class="form-control" wire:model="num_tel">
                                @error('num_tel')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="email">Email :</label>
                            <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
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
                            <label for="select_date">Date de RDV :</label>
                            <input type="date" id="select_date" class="form-control" wire:model="select_date">
                                @error('select_date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="date_debut">Heurs Début :</label>
                            <input type="time" id="heure_debut" class="form-control" wire:model="heure_debut">
                                @error('heure_debut')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="heure_fin">Heure Fin :</label>
                            <input type="time" id="heure_fin" class="form-control" wire:model="heure_fin">
                                @error('heure_fin')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Enregistrer</b></button>
                            </div>
                        </div>
 
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--end edit utilisateur-->

<!-- delete utilisateur-->


<div wire:ignore.self class="modal fade bd-example-modal-lg" id="deleteRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <button class="btn btn-sm btn-danger" wire:click="deleteRdvData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

<!--end delete utilisateur-->

<!-- view utilisateur-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="viewRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Render-Vous Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewRdvModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> RDV ID: </th>
                                <td>{{ $view_rdv_id }}</td>
                            </tr>


                            <tr>
                                <th>Nom: </th>
                                <td>{{ $view_rdv_nom }}</td>
                            </tr>

                            <tr>
                                <th>Prenom: </th>
                                <td>{{ $view_rdv_prenom }}</td>
                            </tr>

                            <tr>
                                <th>Tél: </th>
                                <td>{{ $view_rdv_num_tel}}</td>
                            </tr>


                            <tr>
                                <th>Email: </th>
                                <td>{{ $view_rdv_email }}</td>
                            </tr>
                            <tr>
                                <th>Service: </th>
                                <td>{{ $view_rdv_service }}</td>
                            </tr>
                            <tr>
                                <th>Médecin Traitant: </th>
                                <td>{{ $view_rdv_medecin_traitant }}</td>
                            </tr>
                            <tr>
                                <th>Date de RDV: </th>
                                <td>{{ $view_rdv_select_date }}</td>
                            </tr>
                            <tr>
                                <th>Heure Début: </th>
                                <td>{{ $view_rdv_heure_debut }}</td>
                            </tr>
                            <tr>
                                <th>Heure Fin: </th>
                                <td>{{ $view_rdv_heure_fin }}</td>
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
            $('#addRdvModal').modal('hide');
            $('#editRdvModal').modal('hide');
            $('#deleteRdvModal').modal('hide');
          
        });

        window.addEventListener('show-edit-rdv-modal', event =>{
            $('#editRdvModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteRdvModal').modal('show');
          
        });

        window.addEventListener('show-view-rdv-modal', event =>{
            $('#viewRdvModal').modal('show');
          
        });



    </script>

@endpush 

