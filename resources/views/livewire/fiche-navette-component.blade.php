<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="dash_head">
                        <h3 style="float: left;"><span><i class="fa fa-pencil-square-o fa-2x"></i><b style="font-weight:bold;"><font size="+2"> Liste des Ordonnances</font></b></span></h3>
                        <button class="main_bt read_bt" style="float: right;" data-toggle="modal" data-target="#addFicheNavetteModal"><i class="fa fa-plus"></i><b style="font-weight:bold;">Ajouter Fiche Navette</b></button>
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
                                    <th><b style="font-weight:bold;">ID Fiche Navette</b></th>
                                    <th><b style="font-weight:bold;">N° d'Admission</b></th>   
                                    <th><b style="font-weight:bold;">Nom Prenom</b></th>                                 
                                    <th><b style="font-weight:bold;">Ajouté</b></th>                                                                                                                                             
                                    <th style="text-align: center;"><b style="font-weight:bold;">Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($fiche_navettes->count() > 0)
                                    @foreach ($fiche_navettes as $fiche_navette)
                                        <tr>
                                            <td>{{ $fiche_navette->fiche_navette_id }}</td>
                                            <td>{{ $fiche_navette->admission_id}}</td> 
                                            <td>{{ $fiche_navette->Nom }} {{ $fiche_navette->prenom }}</td>                                                                                          
                                            <td>{{ $fiche_navette->created_at}}</td>   
                                                          
                                            {{-- <td style="text-align:center;">
                                                <button class="btn btn-sm btn-link" wire:click="viewOrdonnanceDetails({{ $ordonnance->id }})"> <i class="fa fa-info-circle fa-2x green_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="editOrdonnance({{ $ordonnance->id }})"> <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="deleteConfirmation({{ $ordonnance->id }})"> <i class="fa fa-trash-o fa-2x orange_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click=""> <i class="fa fa-print fa-2x" style="color:black"></i> </button>
                                            </td> --}}
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary" wire:click="viewFicheNavetteDetails({{ $fiche_navette->id }})">View</button>
                                                <button class="btn btn-sm btn-primary" wire:click="editFicheNavette({{ $fiche_navette->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $fiche_navette->id }})">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="card-footer">
                             <div class="float-right">
                                 {{ $fiche_navettes->links() }} 
                             </div>
                       </div>                       
                <!-- end table des utilisateurs-->                        
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add ordonnances-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addFicheNavetteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Ajouter Une Nouvelle Fiche Navette</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeFicheNavetteData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="fiche_navette_id">ID Fiche Navette :</label>
                            <input type="number" id="fiche_navette_id" class="form-control" wire:model="fiche_navette_id">
                                @error('fiche_navette_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="admission_id">N° d'Admission :</label>
                            <input type="number" id="admission_id" class="form-control" wire:model="admission_id">
                                @error('admission_id')
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
                            <label for="salle">Salle :</label>
                            <select id="salle" class="form-control @error('salle') is-invalid @enderror" wire:model="salle">
                                <option value="">---------</option>
                                <option value="salle_1">Salle N°1</option>
                                <option value="salle_2">Salle N°2</option>
                                <option value="salle_3">Salle N°3</option>
                                <option value="salle_4">Salle N°4</option>
                                <option value="salle_5">Salle N°5</option>
                                <option value="salle_6">Salle N°6</option>
                                <option value="salle_7">Salle N°7</option>
                                <option value="salle_8">Salle N°8</option>
                                <option value="salle_9">Salle N°9</option>
                                <option value="salle_10">Salle N°10</option>
                            </select>
                            @error('salle')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="form-group flex-grow-1">
                            <label for="num_lit">Lit N° :</label>
                            <select id="num_lit" class="form-control @error('num_lit') is-invalid @enderror" wire:model="num_lit">
                                <option value="">---------</option>
                                <option value="lit N°1">Lit N°1</option>
                                <option value="lit N°2">Lit N°2</option>
                                <option value="lit N°3">Lit N°3</option>
                                <option value="lit N°4">Lit N°4</option>
                                <option value="lit N°5">Lit N°5</option>
                                <option value="lit N°6">Lit N°6</option>
                                <option value="lit N°7">Lit N°7</option>
                                <option value="lit N°8">Lit N°8</option>
                                <option value="lit N°9">Lit N°9</option>
                                <option value="lit N°10">Lit N°10</option>
                            </select>
                            @error('num_lit')
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

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_naissance">Date Naissance :</label>
                            <input type="date" id="date_naissance" class="form-control" wire:model="date_naissance">
                                @error('date_naissance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="lieu_naissance">Lieu Naissance :</label>
                            <input type="text" id="lieu_naissance" class="form-control" wire:model="lieu_naissance">
                                @error('lieu_naissance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="securite_social">Sécurité Social :</label>
                            <select id="securite_social" class="form-control @error('securite_social') is-invalid @enderror" wire:model="securite_social">
                                <option value="">---------</option>
                                <option value="CNAS">CNAS</option>
                                <option value="CASNOS">CASNOS</option>
                                <option value="AUTRE">AUTRE</option>             
                            </select>
                            @error('securite_social')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="num_assurance">N° Assurance :</label>
                            <input type="number" id="num_assurance" class="form-control" wire:model="num_assurance">
                                @error('num_assurance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="num_carte">Démuni N° Carte :</label>
                            <input type="number" id="num_carte" class="form-control" wire:model="num_carte">
                                @error('num_carte')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1">
                            <label for="actes_medicaux_chirurgicaux">Actes Medicaux Chirurgicaux :</label>
                            <select id="actes_medicaux_chirurgicaux" class="form-control @error('actes_medicaux_chirurgicaux') is-invalid @enderror" wire:model="actes_medicaux_chirurgicaux">
                                <option value="">---------</option>
                                <option value="Actes Examens 1">Actes et Examens 1</option>
                                <option value="Actes et Examens 2">Actes et Examens 2</option>
                                <option value="Actes et Examens 3">Actes et Examens 3</option>             
                            </select>
                            @error('actes_medicaux_chirurgicaux')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="bilan_biologiques_radiologique">Bilan Biologiques Radiologique :</label>
                            <select id="bilan_biologiques_radiologique" class="form-control @error('bilan_biologiques_radiologique') is-invalid @enderror" wire:model="bilan_biologiques_radiologique">
                                <option value="">---------</option>
                                <option value="Bilan Biologiques">Bilan Biologiques</option>
                                <option value="Bilan Radiologiques">Bilan Radiologiques</option>
                                           
                            </select>
                            @error('bilan_biologiques_radiologique')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="medicaments">Médicaments :</label>
                            <select id="medicaments" class="form-control @error('medicaments') is-invalid @enderror" wire:model="medicaments">
                                <option value="">---------</option>
                                <option value="Médicament 1">Médicament 1</option>
                                <option value="Médicament 2">Médicament 2</option>
                                <option value="Médicament 3">Médicament 3</option>
                                <option value="Médicament 4">Médicament 4</option>
                                <option value="Médicament 5">Médicament 5</option>
                                <option value="Médicament 6">Médicament 6</option>
                                <option value="Médicament 7">Médicament 7</option>
                                <option value="Médicament 8">Médicament 8</option>                   
                            </select>
                            @error('medicaments')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_entree">Date Entrée :</label>
                            <input type="date" id="date_entree" class="form-control" wire:model="date_entree">
                                @error('date_entree')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="heure_entree">Heure Entrée :</label>
                            <input type="time" id="heure_entree" class="form-control" wire:model="heure_entree">
                                @error('heure_entree')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="age">Mode Entrée :</label>
                             <select id="mode_entree" class="form-control @error('mode_entree') is-invalid @enderror" wire:model="mode_entree">
                                <option value="">---------</option>
                                <option value="normal">Normal</option>
                                <option value="contre_avis_medical">Contre Avis Médical</option>
                                <option value="bonne_sante">Bonne Santé</option>
                                
                            </select>
                            @error('mode_entree')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                                        <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_sortie">Date Sortie :</label>
                            <input type="date" id="date_sortie" class="form-control" wire:model="date_sortie">
                                @error('date_sortie')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="heure_sortie">Heure Sortie :</label>
                            <input type="time" id="heure_sortie" class="form-control" wire:model="heure_sortie">
                                @error('heure_sortie')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                    </div>              
                       <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Fiche Navette</b></button>
                            </div>
                        </div>  
                    </form>
                </div>
              

           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editFicheNavetteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Les Informations d'Une Fiche Navette</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="editFicheNavetteData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="fiche_navette_id">ID Fiche Navette :</label>
                            <input type="number" id="fiche_navette_id" class="form-control" wire:model="fiche_navette_id">
                                @error('fiche_navette_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="admission_id">N° d'Admission :</label>
                            <input type="number" id="admission_id" class="form-control" wire:model="admission_id">
                                @error('admission_id')
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
                            <label for="salle">Salle :</label>
                            <select id="salle" class="form-control @error('salle') is-invalid @enderror" wire:model="salle">
                                <option value="">---------</option>
                                <option value="salle_1">Salle N°1</option>
                                <option value="salle_2">Salle N°2</option>
                                <option value="salle_3">Salle N°3</option>
                                <option value="salle_4">Salle N°4</option>
                                <option value="salle_5">Salle N°5</option>
                                <option value="salle_6">Salle N°6</option>
                                <option value="salle_7">Salle N°7</option>
                                <option value="salle_8">Salle N°8</option>
                                <option value="salle_9">Salle N°9</option>
                                <option value="salle_10">Salle N°10</option>
                            </select>
                            @error('salle')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                          <div class="form-group flex-grow-1">
                            <label for="num_lit">Lit N° :</label>
                            <select id="num_lit" class="form-control @error('num_lit') is-invalid @enderror" wire:model="num_lit">
                                <option value="">---------</option>
                                <option value="lit N°1">Lit N°1</option>
                                <option value="lit N°2">Lit N°2</option>
                                <option value="lit N°3">Lit N°3</option>
                                <option value="lit N°4">Lit N°4</option>
                                <option value="lit N°5">Lit N°5</option>
                                <option value="lit N°6">Lit N°6</option>
                                <option value="lit N°7">Lit N°7</option>
                                <option value="lit N°8">Lit N°8</option>
                                <option value="lit N°9">Lit N°9</option>
                                <option value="lit N°10">Lit N°10</option>
                            </select>
                            @error('num_lit')
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

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_naissance">Date Naissance :</label>
                            <input type="date" id="date_naissance" class="form-control" wire:model="date_naissance">
                                @error('date_naissance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="lieu_naissance">Lieu Naissance :</label>
                            <input type="text" id="lieu_naissance" class="form-control" wire:model="lieu_naissance">
                                @error('lieu_naissance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="securite_social">Sécurité Social :</label>
                            <select id="securite_social" class="form-control @error('securite_social') is-invalid @enderror" wire:model="securite_social">
                                <option value="">---------</option>
                                <option value="CNAS">CNAS</option>
                                <option value="CASNOS">CASNOS</option>
                                <option value="AUTRE">AUTRE</option>             
                            </select>
                            @error('securite_social')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="num_assurance">N° Assurance :</label>
                            <input type="number" id="num_assurance" class="form-control" wire:model="num_assurance">
                                @error('num_assurance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="num_carte">Démuni N° Carte :</label>
                            <input type="number" id="num_carte" class="form-control" wire:model="num_carte">
                                @error('num_carte')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1">
                            <label for="actes_medicaux_chirurgicaux">Actes Medicaux Chirurgicaux :</label>
                            <select id="actes_medicaux_chirurgicaux" class="form-control @error('actes_medicaux_chirurgicaux') is-invalid @enderror" wire:model="actes_medicaux_chirurgicaux">
                                <option value="">---------</option>
                                <option value="Actes Examens 1">Actes et Examens 1</option>
                                <option value="Actes et Examens 2">Actes et Examens 2</option>
                                <option value="Actes et Examens 3">Actes et Examens 3</option>             
                            </select>
                            @error('actes_medicaux_chirurgicaux')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="bilan_biologiques_radiologique">Bilan Biologiques Radiologique :</label>
                            <select id="bilan_biologiques_radiologique" class="form-control @error('bilan_biologiques_radiologique') is-invalid @enderror" wire:model="bilan_biologiques_radiologique">
                                <option value="">---------</option>
                                <option value="Bilan Biologiques">Bilan Biologiques</option>
                                <option value="Bilan Radiologiques">Bilan Radiologiques</option>
                                           
                            </select>
                            @error('bilan_biologiques_radiologique')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="medicaments">Médicaments :</label>
                            <select id="medicaments" class="form-control @error('medicaments') is-invalid @enderror" wire:model="medicaments">
                                <option value="">---------</option>
                                <option value="Médicament 1">Médicament 1</option>
                                <option value="Médicament 2">Médicament 2</option>
                                <option value="Médicament 3">Médicament 3</option>
                                <option value="Médicament 4">Médicament 4</option>
                                <option value="Médicament 5">Médicament 5</option>
                                <option value="Médicament 6">Médicament 6</option>
                                <option value="Médicament 7">Médicament 7</option>
                                <option value="Médicament 8">Médicament 8</option>                   
                            </select>
                            @error('medicaments')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_entree">Date Entrée :</label>
                            <input type="date" id="date_entree" class="form-control" wire:model="date_entree">
                                @error('date_entree')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="heure_entree">Heure Entrée :</label>
                            <input type="time" id="heure_entree" class="form-control" wire:model="heure_entree">
                                @error('heure_entree')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="age">Mode Entrée :</label>
                             <select id="mode_entree" class="form-control @error('mode_entree') is-invalid @enderror" wire:model="mode_entree">
                                <option value="">---------</option>
                                <option value="normal">Normal</option>
                                <option value="contre_avis_medical">Contre Avis Médical</option>
                                <option value="bonne_sante">Bonne Santé</option>
                                
                            </select>
                            @error('mode_entree')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                                        <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_sortie">Date Sortie :</label>
                            <input type="date" id="date_sortie" class="form-control" wire:model="date_sortie">
                                @error('date_sortie')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="heure_sortie">Heure Sortie :</label>
                            <input type="time" id="heure_sortie" class="form-control" wire:model="heure_sortie">
                                @error('heure_sortie')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                    </div>              
                       <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Enregistrer Les Modifications</b></button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--end edit utilisateur-->

<!-- delete ordonnance-->


<div wire:ignore.self class="modal fade bd-example-modal-lg" id="deleteFicheNavetteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <button class="btn btn-sm btn-danger" wire:click="deleteFicheNavetteData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

<!--end delete utilisateur-->

<!-- view ordonnance-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="viewFicheNavetteModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Fiche Navette Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewFicheNavetteModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Fiche Navette ID: </th>
                                <td>{{ $view_fiche_navette_fiche_navette_id }}</td>
                            </tr>

                            <tr>
                                <th> N° Admission: </th>
                                <td>{{ $view_fiche_navette_admission_id }}</td>
                            </tr>

                            <tr>
                                <th>Nom : </th>
                                <td>{{ $view_fiche_navette_nom }}</td>
                            </tr>

                            <tr>
                                <th>Prenom : </th>
                                <td>{{ $view_fiche_navette_prenom }}</td>
                            </tr>

                            <tr>
                                <th>Date Naissance : </th>
                                <td>{{ $view_fiche_navette_date_naissance}}</td>
                            </tr>
                            <tr>
                                <th>Lieu Naissance : </th>
                                <td>{{ $view_fiche_navette_lieu_naissance }}</td>
                            </tr>

                            <tr>
                                <th>Age : </th>
                                <td>{{ $view_fiche_navette_age }}</td>
                            </tr>

                            <tr>
                                <th>Sécurité Social: </th>
                                <td>{{ $view_fiche_navette_securite_social}}</td>
                            </tr>
                            <tr>
                                <th>N° Assurance: </th>
                                <td>{{ $view_fiche_navette_num_assurance}}</td>
                            </tr>
                            <tr>
                                <th>Démuni N° Carte: </th>
                                <td>{{ $view_fiche_navette_num_carte}}</td>
                            </tr>


                            <tr>
                                <th>Service : </th>
                                <td>{{ $view_fiche_navette_service }}</td>
                            </tr>
                            <tr>
                                <th>Salle : </th>
                                <td>{{ $view_fiche_navette_salle }}</td>
                            </tr>
                            <tr>
                                <th>N° Lit : </th>
                                <td>{{ $view_fiche_navette_num_lit }}</td>
                            </tr>
                            <tr>
                                <th>Actes Medicaux Chirurgicaux : </th>
                                <td>{{ $view_fiche_navette_actes_medicaux_chirurgicaux }}</td>
                            </tr>
                            <tr>
                                <th>Bilan Biologiques Radiologique: </th>
                                <td>{{ $view_fiche_navette_bilan_biologiques_radiologique }}</td>
                            </tr>
                            <tr>
                                <th>Medicaments : </th>
                                <td>{{ $view_fiche_navette_medicaments }}</td>
                            </tr>
                            <tr>
                                <th>Mode Entrée : </th>
                                <td>{{ $view_fiche_navette_mode_entree }}</td>
                            </tr>
                            <tr>
                                <th>Date Entrée : </th>
                                <td>{{ $view_fiche_navette_date_entree }}</td>
                            </tr>
                            <tr>
                                <th>Heure Entrée : </th>
                                <td>{{ $view_fiche_navette_heure_entree }}</td>
                            </tr>
                            <tr>
                                <th>Date Sortie : </th>
                                <td>{{ $view_fiche_navette_date_sortie }}</td>
                            </tr>
                            <tr>
                                <th>Heure Sortie : </th>
                                <td>{{ $view_fiche_navette_heure_sortie }}</td>
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
            $('#addFicheNavetteModal').modal('hide');
            $('#editFicheNavetteModal').modal('hide');
            $('#deleteFicheNavetteModal').modal('hide');
          
        });

        window.addEventListener('show-edit-fiche_navette-modal', event =>{
            $('#editFicheNavetteModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteFicheNavetteModal').modal('show');
          
        });

        window.addEventListener('show-view-fiche_navette-modal', event =>{
            $('#viewFicheNavetteModal').modal('show');
          
        });



    </script>

@endpush 


