<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="dash_head">
                        <h3 style="float: left;"><span><i class="fa fa-pencil-square-o fa-2x"></i><b style="font-weight:bold;"><font size="+2"> Liste des Certificats Médicals</font></b></span></h3>
                        <button class="main_bt read_bt" style="float: right;" data-toggle="modal" data-target="#addCertificatMedicalModal"><i class="fa fa-plus"></i><b style="font-weight:bold;">  Ajouter Certificat Médical</b></button>
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

                    <!-- Table des Certificat Medical-->

                     <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><b style="font-weight:bold;">ID Certificat</b></th>
                                    <th><b style="font-weight:bold;">Date Certificat</b></th>   
                                    <th><b style="font-weight:bold;">Nom Prenom</b></th>   
                                     <th><b style="font-weight:bold;">Date Naissance</b></th>                               
                                    <th><b style="font-weight:bold;">Ajouté</b></th>                                                                                                                                             
                                    <th style="text-align: center;"><b style="font-weight:bold;">Action</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($certificat_medicals->count() > 0)
                                    @foreach ($certificat_medicals as $certificat_medical)
                                        <tr>
                                            <td>{{ $certificat_medical->certificat_id }}</td>
                                            <td>{{ $certificat_medical->date_certificat}}</td> 
                                            <td>{{ $certificat_medical->nom }} {{ $certificat_medical->prenom }}</td>
                                            <td>{{ $certificat_medical->date_naissance }}</td>                                                                                          
                                            <td class="text-align: center;"><span class="tag tag-success">{{$certificat_medical->created_at->diffForHumans()}}</span></td>   
                                                          
                                            <td style="text-align:center;">
                                                <button class="btn btn-sm btn-link" wire:click="viewCertificatMedicalDetails({{ $certificat_medical->id }})"> <i class="fa fa-info-circle fa-2x green_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="editCertificatMedical({{ $certificat_medical->id }})"> <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="deleteConfirmation({{ $certificat_medical->id }})"> <i class="fa fa-trash-o fa-2x orange_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click=""> <i class="fa fa-print fa-2x" style="color:black"></i> </button>
                                            </td>
                                            {{-- <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary" wire:click="viewCertificatMedicalDetails({{ $certificat_medical->id }})">View</button>
                                                <button class="btn btn-sm btn-primary" wire:click="editCertificatMedical({{ $certificat_medical->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $certificat_medical->id }})">Delete</button>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="card-footer">
                             <div class="float-right">
                                 {{ $certificat_medicals->links() }} 
                             </div>
                       </div>                       
                <!-- end table des utilisateurs-->                        
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add ordonnances-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addCertificatMedicalModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Aouter Nouvel Certificat Médical</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeCertificatMedicalData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="certificat_id">ID Certificat :</label>
                            <input type="number" id="certificat_id" class="form-control" wire:model="certificat_id">
                                @error('certificat_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="date_certificat">Date Certificat :</label>
                            <input type="date" id="date_certificat" class="form-control" wire:model="date_certificat">
                                @error('date_certificat')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="soussigne">Soussigné Par Dr :</label>
                            <select id="soussigne" class="form-control @error('soussigne') is-invalid @enderror" wire:model="soussigne">
                                <option value="">---------</option>
                                <option value="halfaoui_amel">Mme Halfaoui Amel -Généraliste-</option>
                                <option value="korso_morade">Mr Korso Mourad -Neurologue-</option>
                                <option value="ait_abdelrahim">Mr Ait Abdelrahim -ORL-</option>
                                <option value="Tadlaoui_meryem">Mme tadlaoui Meryem -Psycologue-</option>
                                <option value="azzouni_youcef">Mr Azzouni Youcef -Ophtalmologue-</option>
                                <option value="aissaoui_kamel">Mr Aissaoui Kamel -Neufrologue-</option>
                                <option value="benmoussa_anes">Mr Benmoussa Anes -Traumatologue-</option>
                                <option value="benachenhou_karim">Mr Benachenhou Karim -Dantiste-</option>                              
                            </select>
                            @error('soussigne')
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
                            <label for="Age">Age :</label>
                            <input type="text" id="Age" class="form-control" wire:model="Age">
                                @error('Age')
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
                        <div class="form-group flex-grow-1">
                            <label for="Adresse">Adresse :</label>
                            <input type="text" id="Adresse" class="form-control" wire:model="Adresse">
                                @error('Adresse')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="Presente">Presente :</label>
                            <input type="text" id="Presente" class="form-control" wire:model="Presente">
                                @error('Presente')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="commentaire">Commentaire :</label>
                            <input type="text" id="commentaire" class="form-control" wire:model="commentaire">
                                @error('commentaire')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="signe_par">Signé Par :</label>
                            <select id="signe_par" class="form-control @error('signe_par') is-invalid @enderror" wire:model="signe_par">
                                <option value="">---------</option>
                                <option value="chef de service Mr Allali"> Le Chef De service Mr Allali</option>
                                <option value="docteur Mr Korso"> Docteur Mr Korso </option>
                                <option value="Directeur du centre"> le Directeur du Centre</option>
                                
                               
                            </select>
                            @error('signe_par')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-12">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-plus"></i><b style="font-weight:bold;"> Ajouter Certificat Médical</b></button>
                            </div>
                        </div>
                    </form>
                </div>
           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editCertificatMedicalModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Certificat Médical</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


            <form wire:submit.prevent="editCertificatMedicalData">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="certificat_id">ID Certificat :</label>
                            <input type="number" id="certificat_id" class="form-control" wire:model="certificat_id">
                                @error('certificat_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="date_certificat">Date Certificat :</label>
                            <input type="date" id="date_certificat" class="form-control" wire:model="date_certificat">
                                @error('date_certificat')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="soussigne">Soussigné Par Dr :</label>
                            <select id="soussigne" class="form-control @error('soussigne') is-invalid @enderror" wire:model="soussigne">
                                <option value="">---------</option>
                                <option value="halfaoui_amel">Mme Halfaoui Amel -Généraliste-</option>
                                <option value="korso_morade">Mr Korso Mourad -Neurologue-</option>
                                <option value="ait_abdelrahim">Mr Ait Abdelrahim -ORL-</option>
                                <option value="Tadlaoui_meryem">Mme tadlaoui Meryem -Psycologue-</option>
                                <option value="azzouni_youcef">Mr Azzouni Youcef -Ophtalmologue-</option>
                                <option value="aissaoui_kamel">Mr Aissaoui Kamel -Neufrologue-</option>
                                <option value="benmoussa_anes">Mr Benmoussa Anes -Traumatologue-</option>
                                <option value="benachenhou_karim">Mr Benachenhou Karim -Dantiste-</option>                              
                            </select>
                            @error('soussigne')
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
                            <label for="Age">Age :</label>
                            <input type="text" id="Age" class="form-control" wire:model="Age">
                                @error('Age')
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
                        <div class="form-group flex-grow-1">
                            <label for="Adresse">Adresse :</label>
                            <input type="text" id="Adresse" class="form-control" wire:model="Adresse">
                                @error('Adresse')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="Presente">Presente :</label>
                            <input type="text" id="Presente" class="form-control" wire:model="Presente">
                                @error('Presente')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="commentaire">Commentaire :</label>
                            <input type="text" id="commentaire" class="form-control" wire:model="commentaire">
                                @error('commentaire')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="signe_par">Signé Par :</label>
                            <select id="signe_par" class="form-control @error('signe_par') is-invalid @enderror" wire:model="signe_par">
                                <option value="">---------</option>
                                <option value="chef de service Mr Allali"> Le Chef De service Mr Allali</option>
                                <option value="docteur Mr Korso"> Docteur Mr Korso </option>
                                <option value="Directeur du centre"> le Directeur du Centre</option>
                                
                               
                            </select>
                            @error('signe_par')
                                <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-12">
                                <button type="submit" class="main_bt read_bt"><i class="fa fa-check"></i><b style="font-weight:bold;"> Modifier Certificat Médical</b></button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--end edit utilisateur-->

<!-- delete ordonnance-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="deleteCertificatMedicalModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Etes-vous sùre de vouloir Supprimer cet Certificat Médical !</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteCertificatMedicalData()">Oui! Supprimer</button>
                </div>
            </div>
        </div>
    </div>

<!--end delete utilisateur-->

<!-- view ordonnance-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="viewCertificatMedicalModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Certificat Médical Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewCertificatMedicalModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th> Certificat Médical ID : </th>
                                <td>{{ $view_certificat_medical_certificat_id }}</td>
                            </tr>
                            <tr>
                                <th>Date Certificat Médical : </th>
                                <td>{{ $view_certificat_medical_date_certificat }}</td>
                            </tr>
                            <tr>
                                <th>Soussigné par Mr : </th>
                                <td>{{ $view_certificat_medical_soussigne }}</td>
                            </tr>

                            <tr>
                                <th>Nom Prénom : </th>
                                <td> {{ $view_certificat_medical_nom }} {{ $view_certificat_medical_prenom }}</td>
                            </tr>
                            <tr>
                                <th>Date Naissance : </th>
                                <td>{{ $view_certificat_medical_date_naissance}}</td>
                            </tr>
                            <tr>
                                <th>Lieu Naissance : </th>
                                <td>{{ $view_certificat_medical_lieu_naissance }}</td>
                            </tr>
                            <tr>
                                <th>Age : </th>
                                <td>{{ $view_certificat_medical_Age }}</td>
                            </tr>
                            <tr>
                                <th>Adresse: </th>
                                <td>{{ $view_certificat_medical_Adresse }}</td>
                            </tr>
                             <tr>
                                <th>Presente: </th>
                                <td>{{ $view_certificat_medical_Presente }}</td>
                            </tr>
                            <tr>
                                <th>Commentaire: </th>
                                <td>{{ $view_certificat_medical_commentaire}}</td>
                            </tr>
                            <tr>
                                <th>Signé par Mr: </th>
                                <td>{{ $view_certificat_medical_signe_par }}</td>
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
            $('#addCertificatMedicalModal').modal('hide');
            $('#editCertificatMedicalModal').modal('hide');
            $('#deleteCertificatMedicalModal').modal('hide');
          
        });

        window.addEventListener('show-edit-certificat_medical-modal', event =>{
            $('#editCertificatMedicalModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteCertificatMedicalModal').modal('show');
          
        });

        window.addEventListener('show-view-certificat_medical-modal', event =>{
            $('#viewCertificatMedicalModal').modal('show');
          
        });



    </script>

@endpush 


