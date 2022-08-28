<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong> La Liste des Patients Agées</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addPatientModal"><i class="fa fa-user-plus"></i> Ajouter Patient</button>
                        {{-- <button class="btn btn-success btn-sm" style="float: right;" data-toggle="modal" data-target="#"> <i class="fas fa-table"></i> Exporter</button>
                        <button class="btn btn-secondary btn-sm" style="float: right;" data-toggle="modal" data-target="#"> <i class="fas fa-print"></i> Imprimer</button> --}}
                    </div>

                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <div class = "row mb-3">
                            <div class="col-md-12">
                                <input type="search" class="form-control w-25" placeholder="search" wire:model="searchTerm"
                                style="float:right;"/>
                           </div>
                        </div>

                                        <!-- Table des patients agées-->

                     <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom Prenom </th>
                                    <th>Date de Naissance</th>                
                                    <th>Ajouté</th>                                                                    
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($patients->count() > 0)
                                    @foreach ($patients as $patient)
                                        <tr>
                                            <td>{{ $patient->patient_id }}</td>
                                            <td>{{ $patient->nom_prenom }}</td>
                                            <td>{{ $patient->date }}</td>                                            
                                            <td>{{ $patient->created_at }}</td>
                                                                                      
                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary" wire:click="viewPatientDetails({{ $patient->id }})">View</button>
                                                <button class="btn btn-sm btn-primary" wire:click="editPatient({{ $patient->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $patient->id }})">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                               
                                @endif
                            </tbody>
                        </table>

                <!-- end table des patients agées-->

                   </div> 

                </div>
            </div>
   </div>              
</div>
   

    <!-- Modal -->
    <!-- add utilisateur-->
    <div wire:ignore.self class="modal fade" id="addPatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Patient Agé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storePatientData">
                    <div class="form-group row">
                            <label for="patient_id" class="col-3">Patient ID</label>
                            <div class="col-9">
                                <input type="number" id="patient_id" class="form-control" wire:model="patient_id">
                                @error('patient_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nom" class="col-3">Nom Prenom </label>
                            <div class="col-9">
                                <input type="text" id="nom_prenom" class="form-control" wire:model="nom_prenom">
                                @error('nom_prenom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-3">Date de Naissance</label>
                            <div class="col-9">
                                <input type="date" id="date" class="form-control" wire:model="date">
                                @error('date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="poid" class="col-3">Poid</label>
                            <div class="col-9">
                                <input type="number" id="poid" class="form-control" wire:model="poid">
                                @error('poid')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taille" class="col-3">Taille</label>
                            <div class="col-9">
                                <input type="number" id="taille" class="form-control" wire:model="taille">
                                @error('taille')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maladie_chronique" class="col-3">Maladie Chronique</label>
                            <div class="col-9">
                                <input type="text" id="maladie_chronique" class="form-control" wire:model="maladie_chronique">
                                @error('maladie_chronique')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresse" class="col-3">Adresse</label>
                            <div class="col-9">
                                <input type="text" id="adresse" class="form-control" wire:model="adresse">
                                @error('adresse')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-3">Telephone</label>
                            <div class="col-9">
                                <input type="number" id="telephone" class="form-control" wire:model="telephone">
                                @error('telephone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-3">Email</label>
                            <div class="col-9">
                                <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="medecin_traitant" class="col-3">Médecin Traitant</label>
                            <div class="col-9">
                                <input type="text" id="medecin_traitant" class="form-control" wire:model="medecin_traitant">
                                @error('medecin_traitant')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adressee_par" class="col-3">Adressé Par</label>
                            <div class="col-9">
                                <input type="text" id="adressee_par" class="form-control" wire:model="adressee_par">
                                @error('medecin_traitant')
                                    <span class="adressee_par" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="assurance_maladie" class="col-3">Assurance Maladie</label>
                            <div class="col-9">
                                <input type="number" id="assurance_maladie" class="form-control" wire:model="assurance_maladie">
                                @error('assurance_maladie')
                                    <span class="assurance_maladie" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom_contact_urgence" class="col-3">Nom de Contatct en cas d'urgence</label>
                            <div class="col-9">
                                <input type="text" id="nom_contact_urgence" class="form-control" wire:model="nom_contact_urgence">
                                @error('nom_contact_urgence')
                                    <span class="nom_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel_contact_urgence" class="col-3">Telephone de contatct en cas d'urgence</label>
                            <div class="col-9">
                                <input type="text" id="tel_contact_urgence" class="form-control" wire:model="tel_contact_urgence">
                                @error('tel_contact_urgence')
                                    <span class="tel_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Add Patient Agé</button>
                            </div>
                        </div>
                    </form>
                </div>
              

           </div>
       </div>
   </div>
<!-- end add patient-->

<!-- Edit patient-->

<div wire:ignore.self class="modal fade" id="editPatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Patient Agé</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="editPatientData">
                    <div class="form-group row">
                            <label for="patient_id" class="col-3">Patient ID</label>
                            <div class="col-9">
                                <input type="number" id="patient_id" class="form-control" wire:model="patient_id">
                                @error('patient_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nom_prenom" class="col-3">Nom Prenom </label>
                            <div class="col-9">
                                <input type="text" id="nom_prenom" class="form-control" wire:model="nom_prenom">
                                @error('nom_prenom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-3">Date de Naissance</label>
                            <div class="col-9">
                                <input type="date" id="date" class="form-control" wire:model="date">
                                @error('date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="poid" class="col-3">Poid</label>
                            <div class="col-9">
                                <input type="number" id="poid" class="form-control" wire:model="poid">
                                @error('poid')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="taille" class="col-3">Taille</label>
                            <div class="col-9">
                                <input type="number" id="taille" class="form-control" wire:model="taille">
                                @error('taille')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="maladie_chronique" class="col-3">Maladie Chronique</label>
                            <div class="col-9">
                                <input type="text" id="maladie_chronique" class="form-control" wire:model="maladie_chronique">
                                @error('maladie_chronique')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adresse" class="col-3">Adresse</label>
                            <div class="col-9">
                                <input type="text" id="adresse" class="form-control" wire:model="adresse">
                                @error('adresse')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-3">Telephone</label>
                            <div class="col-9">
                                <input type="telephone" id="telephone" class="form-control" wire:model="telephone">
                                @error('telephone')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-3">Email</label>
                            <div class="col-9">
                                <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="medecin_traitant" class="col-3">Médecin Traitant</label>
                            <div class="col-9">
                                <input type="text" id="medecin_traitant" class="form-control" wire:model="medecin_traitant">
                                @error('medecin_traitant')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="adressee_par" class="col-3">Adressé Par</label>
                            <div class="col-9">
                                <input type="text" id="adressee_par" class="form-control" wire:model="adressee_par">
                                @error('medecin_traitant')
                                    <span class="adressee_par" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="assurance_maladie" class="col-3">Assurance Maladie</label>
                            <div class="col-9">
                                <input type="number" id="assurance_maladie" class="form-control" wire:model="assurance_maladie">
                                @error('assurance_maladie')
                                    <span class="assurance_maladie" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nom_contact_urgence" class="col-3">Nom de Contatct en cas d'urgence</label>
                            <div class="col-9">
                                <input type="text" id="nom_contact_urgence" class="form-control" wire:model="nom_contact_urgence">
                                @error('nom_contact_urgence')
                                    <span class="nom_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel_contact_urgence" class="col-3">Telephone de contatct en cas d'urgence</label>
                            <div class="col-9">
                                <input type="text" id="tel_contact_urgence" class="form-control" wire:model="tel_contact_urgence">
                                @error('tel_contact_urgence')
                                    <span class="tel_contact_urgence" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Edit Patient Agé</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--end edit patient-->

<!-- delete patient-->


<div wire:ignore.self class="modal fade" id="deletePatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Patient Agé data!</h6>
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

<div wire:ignore.self class="modal fade" id="viewPatientModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Patient Agé Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewPatientModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID: </th>
                                <td>{{ $view_patient_id }}</td>
                            </tr>


                            <tr>
                                <th>Nom Prenom: </th>
                                <td>{{ $view_patient_nom_prenom }}</td>
                            </tr>

                            <tr>
                                <th>Date de Naissance: </th>
                                <td>{{ $view_patient_date}}</td>
                            </tr>

                            <tr>
                                <th>Poid: </th>
                                <td>{{ $view_patient_poid }}</td>
                            </tr>
                            <tr>
                                <th>Taille: </th>
                                <td>{{ $view_patient_taille }}</td>
                            </tr>
                            
                            <tr>
                                <th>Maladie Chronique: </th>
                                <td>{{ $view_patient_maladie_chronique }}</td>
                            </tr>

                            <tr>
                                <th>Adresse: </th>
                                <td>{{ $view_patient_adresse }}</td>
                            </tr>
                            
                            <tr>
                                <th>Telephone: </th>
                                <td>{{ $view_patient_telephone}}</td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td>{{ $view_patient_email }}</td>
                            </tr>
                            <tr>
                                <th>Medecin Traitant: </th>
                                <td>{{ $view_patient_medecin_traitant }}</td>
                            </tr>
                            
                            <tr>
                                <th>Adressé Par: </th>
                                <td>{{ $view_patient_adressee_par }}</td>
                            </tr>

                            <tr>
                                <th>Assurance Maladie: </th>
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
