
 <!-- add dossier Medical-->
    <div wire:ignore.self class="container" id="addDossierMedicalModal">
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"> Ajouter Un Dossier Médical</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="card-body ">
                <form wire:submit.prevent="storeDossierMedicalData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="dossier_id">N° Dossier :</label>
                            <input type="number" id="dossier_id" class="form-control" wire:model="dossier_id">
                                @error('dossier_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        {{-- <div class="form-group flex-grow-1">
                            <label for="photo">Photo :</label>
                            <input type="file" id="photo" class="form-control" wire:model="photo">
                                @error('photo')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div> --}}
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
                            <label for="date_naissance">Date De Naissance :</label>
                            <input type="date" id="date_naissance" class="form-control" wire:model="date_naissance">
                                @error('date_naissance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="lieu_naissance">Lieu De Naissance :</label>
                            <input type="text" id="lieu_naissance" class="form-control" wire:model="lieu_naissance">
                                @error('lieu_naissance')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                       <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="service">Service de:</label>
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
                            @error('service')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
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
                                <option value="num_lit1">Lit N°1</option>
                                <option value="num_lit2">Lit N°2</option>
                                <option value="num_lit3">Lit N°3</option>
                                <option value="num_lit4">Lit N°4</option>
                                <option value="num_lit5">Lit N°5</option>
                                <option value="num_lit6">Lit N°6</option>
                                <option value="num_lit7">Lit N°7</option>
                                <option value="num_lit8">Lit N°8</option>
                                <option value="num_lit9">Lit N°9</option>
                                <option value="num_lit10">Lit N°10</option>
                            </select>
                            @error('num_lit')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="date_entree">Date d'Entrée :</label>
                            <input type="date" id="date_entree" class="form-control" wire:model="date_entree">
                                @error('date_entree')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="mode_entree">Mode d'Entrée :</label>
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
                            <label for="date_sortie">Date de Sortie :</label>
                            <input type="date" id="date_sortie" class="form-control" wire:model="date_sortie">
                                @error('date_sortie')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="mode_sortie">Mode de Sortie :</label>
                            <select id="mode_sortie" class="form-control @error('mode_sortie') is-invalid @enderror" wire:model="mode_sortie">
                                <option value="">---------</option>
                                <option value="normal">Normal</option>
                                <option value="contre_avis_medical">Contre Avis Médical</option>
                                <option value="bonne_sante">Bonne Santé</option>
                               
                            </select>
                            @error('mode_sortie')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="medecin_traitant">Médecin Traitant :</label>
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
                        <div class="form-group flex-grow-1">
                            <label for="diagnostic">Diagnostic :</label>
                            <select id="salle" class="form-control @error('salle') is-invalid @enderror" wire:model="salle">
                                <option value="">---------</option>
                                <option value="salle_1">Douleurs et fièvres</option>
                                <option value="salle_2">Douleurs</option>
                                <option value="salle_3">Traitement général</option>
                                <option value="salle_4">Autre</option>
                            </select>
                            @error('salle')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                   <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="traitement">Traitement :</label>
                            <select id="traitement" class="form-control @error('traitement') is-invalid @enderror" wire:model="traitement">
                                <option value="">---------</option>
                                <option value="bilan_biologique">Bilan Biologique</option>
                                <option value="bilan_radiologique">Bilan Radiologique</option>
                                <option value="medicaments">Médicaments</option>
                                
                            </select>
                            @error('traitement')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="observations">Observations :</label>
                            <input type="text" id="observations" class="form-control" wire:model="observations">
                                @error('observations')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="explorations">Explorations :</label>
                            <input type="text" id="explorations" class="form-control" wire:model="explorations">
                                @error('explorations')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="etat_sortie">Etat de Sortie :</label>
                            <select id="etat_sortie" class="form-control @error('etat_sortie') is-invalid @enderror" wire:model="etat_sortie">
                                <option value="">---------</option>
                                <option value="normal">Normal</option>
                                <option value="contre_avis_medical">Contre Avis Médical</option>
                                <option value="bonne_sante">Bonne Santé</option>
                               
                            </select>
                            @error('etat_sortie')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="indications">Indications :</label>
                            <input type="text" id="indications" class="form-control" wire:model="indications">
                                @error('indications')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="signature_chef_service">Signature du Chef de Service :</label>
                            <input type="text" id="signature_chef_service" class="form-control" wire:model="signature_chef_service">
                                @error('signature_chef_service')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Dossier</b></button>
                            </div>
                        </div>
                    </form>
                </div>
              
           </div>
       </div>
   </div>
<!-- end add dossier medical-->