<div>
<div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="dash_head">
                        <h3 style="float: left;"><span><i class="fa fa-user-plus fa-2x"></i><b style="font-weight:bold;"><font size="+2"> La Liste des Patients Agées </font></b></span></h3>
                        <button class="main_bt read_bt" style="float: right;" data-toggle="modal" data-target="#addPatientModal"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Patient</button>
                        {{-- <button class="btn btn-success btn-sm" style="float: right;" data-toggle="modal" data-target="#"> <i class="fas fa-table"></i> Exporter</button>
                        <button class="btn btn-secondary btn-sm" style="float: right;" data-toggle="modal" data-target="#"> <i class="fas fa-print"></i> Imprimer</button> --}}
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

                <!-- Table des patients agées-->

                     <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><b style="font-weight:bold;">ID</b></b></th>
                                    <th><b style="font-weight:bold;">Nom Prenom</b></th>
                                    <th><b style="font-weight:bold;">Date de Naissance</b></th>                
                                    <th><b style="font-weight:bold;">Ajouté</b></th>                                                                    
                                    <th style="text-align: center;"><b style="font-weight:bold;">Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($patients->count() > 0)
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->patient_id }}</td>
                                            <td>{{ $patient->nom}} {{ $patient->prenom}}</td>
                                            <td>{{ $patient->date }}</td>  
                                            <td class="text-align: center;"><span class="tag tag-success">{{$patient->created_at->diffForHumans()}}</span></td>                                          
                                            {{-- <td>{{ $patient->created_at }}</td> --}}

                                            <td style="text-align:center;">
                                                <button class="btn btn-sm btn-link" wire:click="viewPatientDetails({{ $patient->id }})"> <i class="fa fa-info-circle fa-2x green_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="editPatient({{ $patient->id }})"> <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="deleteConfirmation({{ $patient->id }})"> <i class="fa fa-trash-o fa-2x orange_color"></i> </button>
                                            </td>                                         
                                        </tr>
                                    @endforeach
                               
                                @endif
                            </tbody>
                        </table>
                   </div>
                   <div class="card-footer">
                        <div class="float-right">
                            {{ $patients->links() }} 
                        </div>
                    </div>
                <!-- end table des patients agées-->
   </div>              
</div>
   

    <!-- Modal -->
    <!-- add utilisateur-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg bd-example-modal-lg" id="addPatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-user-plus"></i>  Ajouter Nouveau Patient Agé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <div class="modal-body ">
                <form wire:submit.prevent="storePatientData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="patient_id">Patient ID :</label>                
                                <input type="number" id="patient_id" class="form-control" wire:model="patient_id">
                                @error('patient_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
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
                            <label for="date">Date Naissance :</label>
                                <input type="date" id="date" class="form-control" wire:model="date">
                                @error('date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="adresse">Adresse :</label>
                                <input type="text" id="adresse" class="form-control" wire:model="adresse">
                                @error('adresse')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                  </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="poid">Poid ( kg ) :</label>
                                <input type="number" id="poid" class="form-control" wire:model="poid">
                                @error('poid')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="taille">Taille (cm) :</label>
                            <input type="number" id="taille" class="form-control" wire:model="taille">
                                @error('taille')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="maladie_chronique">Maladie Chronique :</label>
                               <select id="maladie_chronique" class="form-control @error('maladie_chronique') is-invalid @enderror" wire:model="maladie_chronique">
                                <option value="">---------</option>
                                <option value="Maladies cardiovasculaires">Maladies cardiovasculaires</option>
                                <option value="Maladies endocriniennes">Maladies endocriniennes</option>
                                <option value="Maladies digestives">Maladies digestives</option>
                                <option value="Maladies neurologiques et musculaires">Maladies neurologiques et musculaires</option>
                                <option value="Maladies gynécologiques urinaires">Maladies gynécologiques urinaires</option>
                                <option value="Maladies gynécologiques rénales">Maladies gynécologiques rénales </option>
                                <option value="Maladies de la peau">Maladies de la peau</option>
                                <option value="Maladies des yeux">Maladies des yeux</option>
                                <option value="Maladies hématologiques">Maladies hématologiques</option>
                            </select>
                            @error('maladie_chronique')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="telephone">Telephone</label>
                                <input type="number" id="telephone" class="form-control" wire:model="telephone">
                                @error('telephone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="medecin_traitant">Médecin Traitant</label>
                             <select id="medecin_traitant" class="form-control @error('medecin_traitant') is-invalid @enderror" wire:model="medecin_traitant">
                                <option value="">---------</option>
                                <option value="Mme Halfaoui Amel -Généraliste-">Mme Halfaoui Amel -Généraliste-</option>
                                <option value="Mr Korso Mourad -Neurologue-">Mr Korso Mourad -Neurologue-</option>
                                <option value="Mr Ait Abdelrahim -ORL-">Mr Ait Abdelrahim -ORL-</option>
                                <option value="Mme tadlaoui Meryem -Psycologue-">Mme tadlaoui Meryem -Psycologue-</option>
                                <option value="Mr Azzouni Youcef -Ophtalmologue-">Mr Azzouni Youcef -Ophtalmologue-</option>
                                <option value="Mr Aissaoui Kamel -Neufrologue-">Mr Aissaoui Kamel -Neufrologue-</option>
                                <option value="Mr Benmoussa Anes -Traumatologue-">Mr Benmoussa Anes -Traumatologue-</option>
                                <option value="Mr Benachenhou Karim -Dantiste-">Mr Benachenhou Karim -Dantiste-</option>
                               
                            </select>
                            @error('medecin_traitant')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="adressee_par">Adressé Par :</label>
                             <select id="adressee_par" class="form-control @error('adressee_par') is-invalid @enderror" wire:model="adressee_par">
                                <option value="">---------</option>
                                <option value="Mr Allali Youcef -Chef de service-">Mr Allali Youcef -Chef de service-</option>
                                <option value="Mme Allali Yasmine -Medecin Coordinatrice-">Mme Allali Yasmine -Medecin Coordinatrice-</option>
                                <option value="Mr Ait Abdelrahim -responsable Général-">Mr Ait Abdelrahim -responsable Général-</option>
                                <option value="Mme tadlaoui Meryem -responsable-">Mme tadlaoui Meryem -responsable-</option>
                                <option value="Mme Azzouni Youssra -Directrice générale-">Mme Azzouni Youssra -Directrice générale-</option>            
                            </select>
                            @error('adressee_par')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="assurance_maladie">Sécurité Social :</label>
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
                        <div class="form-group flex-grow-1">
                            <label for="assurance_maladie">N° Assurance :</label>
                                <input type="number" id="assurance_maladie" class="form-control" wire:model="assurance_maladie">
                                @error('assurance_maladie')
                                    <span class="assurance_maladie" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                  </div>
                        
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="nom_contact_urgence">Nom de Contatct en cas d'urgence :</label>
                                <input type="text" id="nom_contact_urgence" class="form-control" wire:model="nom_contact_urgence">
                                @error('nom_contact_urgence')
                                    <span class="nom_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="tel_contact_urgence">Telephone de contatct en cas d'urgence :</label>
                                <input type="text" id="tel_contact_urgence" class="form-control" wire:model="tel_contact_urgence">
                                @error('tel_contact_urgence')
                                    <span class="tel_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Patient Agé</b></button>
                            </div>
                        </div>
                    </form>
                </div>
           </div>
       </div>
   </div>
<!-- end add patient-->

<!-- Edit patient-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editPatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier les informations d'un Patient Agé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editPatientData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="patient_id">Patient ID :</label>                
                                <input type="number" id="patient_id" class="form-control" wire:model="patient_id">
                                @error('patient_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                         <div class="form-group flex-grow-1">
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
                            <label for="date">Date Naissance :</label>
                                <input type="date" id="date" class="form-control" wire:model="date">
                                @error('date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="adresse">Adresse :</label>
                                <input type="text" id="adresse" class="form-control" wire:model="adresse">
                                @error('adresse')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                  </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="poid">Poid ( kg ) :</label>
                                <input type="number" id="poid" placeholder="Kilogrammes" class="form-control" wire:model="poid">
                                @error('poid')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="taille">Taille (cm) :</label>
                            <input type="number" id="taille" placeholder="centimètre" class="form-control" wire:model="taille">
                                @error('taille')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="maladie_chronique">Maladie Chronique :</label>
                               <select id="maladie_chronique" class="form-control @error('maladie_chronique') is-invalid @enderror" wire:model="maladie_chronique">
                                <option value="">---------</option>
                                <option value="Maladies cardiovasculaires">Maladies cardiovasculaires</option>
                                <option value="Maladies endocriniennes">Maladies endocriniennes</option>
                                <option value="Maladies digestives">Maladies digestives</option>
                                <option value="Maladies neurologiques et musculaires">Maladies neurologiques et musculaires</option>
                                <option value="Maladies gynécologiques urinaires">Maladies gynécologiques urinaires</option>
                                <option value="Maladies gynécologiques rénales">Maladies gynécologiques rénales </option>
                                <option value="Maladies de la peau">Maladies de la peau</option>
                                <option value="Maladies des yeux">Maladies des yeux</option>
                                <option value="Maladies hématologiques">Maladies hématologiques</option>
                            </select>
                            @error('maladie_chronique')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="telephone">Telephone</label>
                                <input type="number" id="telephone" class="form-control" wire:model="telephone">
                                @error('telephone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="medecin_traitant">Médecin Traitant</label>
                             <select id="medecin_traitant" class="form-control @error('medecin_traitant') is-invalid @enderror" wire:model="medecin_traitant">
                                <option value="">---------</option>
                                <option value="Mme Halfaoui Amel -Généraliste-">Mme Halfaoui Amel -Généraliste-</option>
                                <option value="Mr Korso Mourad -Neurologue-">Mr Korso Mourad -Neurologue-</option>
                                <option value="Mr Ait Abdelrahim -ORL-">Mr Ait Abdelrahim -ORL-</option>
                                <option value="Mme tadlaoui Meryem -Psycologue-">Mme tadlaoui Meryem -Psycologue-</option>
                                <option value="Mr Azzouni Youcef -Ophtalmologue-">Mr Azzouni Youcef -Ophtalmologue-</option>
                                <option value="Mr Aissaoui Kamel -Neufrologue-">Mr Aissaoui Kamel -Neufrologue-</option>
                                <option value="Mr Benmoussa Anes -Traumatologue-">Mr Benmoussa Anes -Traumatologue-</option>
                                <option value="Mr Benachenhou Karim -Dantiste-">Mr Benachenhou Karim -Dantiste-</option>
                               
                            </select>
                            @error('medecin_traitant')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="adressee_par">Adressé Par :</label>
                             <select id="adressee_par" class="form-control @error('adressee_par') is-invalid @enderror" wire:model="adressee_par">
                                <option value="">---------</option>
                                <option value="Mr Allali Youcef -Chef de service-">Mr Allali Youcef -Chef de service-</option>
                                <option value="Mme Allali Yasmine -Medecin Coordinatrice-">Mme Allali Yasmine -Medecin Coordinatrice-</option>
                                <option value="Mr Ait Abdelrahim -responsable Général-">Mr Ait Abdelrahim -responsable Général-</option>
                                <option value="Mme tadlaoui Meryem -responsable-">Mme tadlaoui Meryem -responsable-</option>
                                <option value="Mme Azzouni Youssra -Directrice générale-">Mme Azzouni Youssra -Directrice générale-</option>            
                            </select>
                            @error('adressee_par')
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
                        <div class="form-group flex-grow-1">
                            <label for="assurance_maladie">N° Assurance :</label>
                                <input type="number" id="assurance_maladie" class="form-control" wire:model="assurance_maladie">
                                @error('assurance_maladie')
                                    <span class="assurance_maladie" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                  </div>
                        
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="nom_contact_urgence">Nom de Contatct en cas d'urgence :</label>
                                <input type="text" id="nom_contact_urgence" class="form-control" wire:model="nom_contact_urgence">
                                @error('nom_contact_urgence')
                                    <span class="nom_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="form-group flex-grow-1">
                            <label for="tel_contact_urgence">Telephone de contatct en cas d'urgence :</label>
                                <input type="text" id="tel_contact_urgence" class="form-control" wire:model="tel_contact_urgence">
                                @error('tel_contact_urgence')
                                    <span class="tel_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-check"></i><b style="font-weight:bold;"> Enregister les Modifications</b></button>
                            </div>
                        </div>
        
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--end edit patient-->

<!-- delete patient-->


<div wire:ignore.self class="modal fade bd-example-modal-lg" id="deletePatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmation de la Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Etes-vous sùre de vouloir supprimer cet Patient Agé!!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deletePatientData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

<!--end delete patient-->

<!-- view patient-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="viewPatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient Agé Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewPatientModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID : </th>
                                <td>{{ $view_patient_id }}</td>
                            </tr>

                            <tr>
                                <th>Nom : </th>
                                <td>{{ $view_patient_nom }}</td>
                            </tr>
                            <tr>
                                <th>Prenom : </th>
                                <td>{{ $view_patient_prenom }}</td>
                            </tr>

                            <tr>
                                <th>Date de Naissance : </th>
                                <td>{{ $view_patient_date}}</td>
                            </tr>

                            <tr>
                                <th>Poid : </th>
                                <td>{{ $view_patient_poid }}</td>
                            </tr>
                            <tr>
                                <th>Taille : </th>
                                <td>{{ $view_patient_taille }}</td>
                            </tr>
                            
                            <tr>
                                <th>Maladie Chronique : </th>
                                <td>{{ $view_patient_maladie_chronique }}</td>
                            </tr>

                            <tr>
                                <th>Adresse : </th>
                                <td>{{ $view_patient_adresse }}</td>
                            </tr>
                            
                            <tr>
                                <th>Telephone : </th>
                                <td>{{ $view_patient_telephone}}</td>
                            </tr>
                            <tr>
                                <th>Email : </th>
                                <td>{{ $view_patient_email }}</td>
                            </tr>
                            <tr>
                                <th>Medecin Traitant : </th>
                                <td>{{ $view_patient_medecin_traitant }}</td>
                            </tr>
                            
                            <tr>
                                <th>Adressé Par : </th>
                                <td>{{ $view_patient_adressee_par }}</td>
                            </tr>
                            <tr>
                                <th>Sécurité Social : </th>
                                <td>{{ $view_patient_securite_social }}</td>
                            </tr>
                            <tr>
                                <th>Assurance Maladie : </th>
                                <td>{{ $view_patient_assurance_maladie }}</td>
                            </tr>

                            <tr>
                                <th>Nom de Contact en cas d'urgence: </th>
                                <td>{{ $view_patient_nom_contact_urgence }}</td>
                            </tr>
                            
                            <tr>
                                <th>Telephone de Contact en cas d'urgence: </th>
                                <td>{{ $view_patient_tel_contact_urgence}}</td>
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
            $('#addPatientModal').modal('hide');
            $('#editPatientModal').modal('hide');
            $('#deletePatientModal').modal('hide');
          
        });

        window.addEventListener('show-edit-patient-modal', event =>{
            $('#editPatientModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deletePatientModal').modal('show');
          
        });

        window.addEventListener('show-view-patient-modal', event =>{
            $('#viewPatientModal').modal('show');
          
        });

        
    </script>

@endpush 
