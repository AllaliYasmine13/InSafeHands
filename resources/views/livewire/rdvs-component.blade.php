<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>Liste des Render-Vous</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addRdvModal">Add New RDV</button>
                    </div>

                    <div class="card-body">

                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <div class = "row mb-3">
                            <div class="col-md-12">
                                <input type="search" class="form-control w-25" placeholder="search"  wire:model="searchTerm"
                                style="float:right;"/>
                                
                           </div>
                        </div>

                                        <!-- Table des Utilisateurs-->

                     <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>   
                                    <th>Prenom</th>                                 
                                    <th>Tél</th>
                                    <th>Médecin Traitant</th>
                                    <th>Date de RDV</th>                                                                                                           
                                    <th style="text-align: center;">Action</th>
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
                                                <button class="btn btn-sm btn-secondary" wire:click="viewRdvDetails({{ $rdv->id }})">View</button>
                                                <button class="btn btn-sm btn-primary" wire:click="editRdvs({{ $rdv->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $rdv->id }})">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        </div>
                        <div class="card-footer">
                             <div class="float-right">
                                 {{ $rdvs->links() }} 
                             </div>
                       </div>
                        {{-- @if (count($rdvs))
                            {{ $rdvs->links('livewire-pagination-links') }}
                        @endif --}}

                <!-- end table des utilisateurs-->                        
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add utilisateur-->
    <div wire:ignore.self class="modal fade" id="addRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Render-Vous</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeRdvData">
                    <div class="form-group row">
                            <label for="rdv_id" class="col-3">RDV ID</label>
                            <div class="col-9">
                                <input type="number" id="rdv_id" class="form-control" wire:model="rdv_id">
                                @error('rdv_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nom" class="col-3">Nom</label>
                            <div class="col-9">
                                <input type="text" id="nom" class="form-control" wire:model="nom">
                                @error('nom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-3">Prénom</label>
                            <div class="col-9">
                                <input type="text" id="prenom" class="form-control" wire:model="prenom">
                                @error('prenom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_tel" class="col-3">Tél </label>
                            <div class="col-9">
                                <input type="number" id="num_tel" class="form-control" wire:model="num_tel">
                                @error('num_tel')
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
                            <label for="select_date" class="col-3">Date de RDV</label>
                            <div class="col-9">
                                <input type="date" id="select_date" class="form-control" wire:model="select_date">
                                @error('select_date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="commentaire" class="col-3">Commentaires</label>
                            <div class="col-9">
                                <input type="text" id="commentaire" class="form-control" wire:model="commentaire">
                                @error('commentaire')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Add RDV</button>
                            </div>
                        </div>
                    </form>
                </div>
              

           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade" id="editRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit RDV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="editRdvData">
                    <div class="form-group row">
                            <label for="rdv_id" class="col-3">RDV ID</label>
                            <div class="col-9">
                                <input type="number" id="rdv_id" class="form-control" wire:model="rdv_id">
                                @error('rdv_id')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nom" class="col-3">Nom</label>
                            <div class="col-9">
                                <input type="text" id="nom" class="form-control" wire:model="nom">
                                @error('nom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prenom" class="col-3">Prenom</label>
                            <div class="col-9">
                                <input type="text" id="prenom" class="form-control" wire:model="prenom">
                                @error('prenom')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="num_tel" class="col-3">Tél </label>
                            <div class="col-9">
                                <input type="number" id="num_tel" class="form-control" wire:model="num_tel">
                                @error('num_tel')
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
                            <label for="select_date" class="col-3">Date de RDV</label>
                            <div class="col-9">
                                <input type="date" id="select_date" class="form-control" wire:model="select_date">
                                @error('select_date')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="commentaire" class="col-3">Commentaires</label>
                            <div class="col-9">
                                <input type="text" id="commentaire" class="form-control" wire:model="commentaire">
                                @error('commentaire')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Edit RDV</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--end edit utilisateur-->

<!-- delete utilisateur-->


<div wire:ignore.self class="modal fade" id="deleteRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
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

<div wire:ignore.self class="modal fade" id="viewRdvModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Render-Vous Information</h5>
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
                                <th>Médecin Traitant: </th>
                                <td>{{ $view_rdv_medecin_traitant }}</td>
                            </tr>
                            <tr>
                                <th>Date de RDV: </th>
                                <td>{{ $view_rdv_select_date }}</td>
                            </tr>
                            <tr>
                                <th>Commentaire: </th>
                                <td>{{ $view_rdv_commentaire }}</td>
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

