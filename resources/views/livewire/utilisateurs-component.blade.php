
<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>All Utilisateurs</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addUtilisateurModal">Add New Utilisateur</button>
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
                                        <!-- Table des Utilisateurs-->

                     <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date de Naissance</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($utilisateurs->count() > 0)
                                    @foreach ($utilisateurs as $utilisateur)
                                        <tr>
                                            <td>{{ $utilisateur->utilisateur_id }}</td>
                                            <td>{{ $utilisateur->nom }}</td>
                                            <td>{{ $utilisateur->prenom }}</td>
                                            <td>{{ $utilisateur->date_de_naissance}}</td>
                                            <td>{{ $utilisateur->email}}</td>
                                            <td>{{ $utilisateur->role}}</td>

                                            <td style="text-align: center;">
                                                <button class="btn btn-sm btn-secondary" wire:click="viewUtilisateurDetails({{ $utilisateur->id }})">View</button>
                                                <button class="btn btn-sm btn-primary" wire:click="editUtilisateurs({{ $utilisateur->id }})">Edit</button>
                                                <button class="btn btn-sm btn-danger" wire:click="deleteConfirmation({{ $utilisateur->id }})">Delete</button>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>No Utilisateur Found</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                <!-- end table des utilisateurs-->

                   </div> 
                   {{-- <div class="card-footer">
                       <div class="float-right">
                           {{ $utilisateurs->links() }} 
                       </div>
                   </div> --}}
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add utilisateur-->
    <div wire:ignore.self class="modal fade" id="addUtilisateurModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeUtilisateurData">
                    <div class="form-group row">
                            <label for="utilisateur_id" class="col-3">Utilisateur ID</label>
                            <div class="col-9">
                                <input type="number" id="utilisateur_id" class="form-control" wire:model="utilisateur_id">
                                @error('utilisateur_id')
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
                            <label for="date_de_naissance" class="col-3">Date de Naissance</label>
                            <div class="col-9">
                                <input type="date" id="date_de_naissance" class="form-control" wire:model="date_de_naissance">
                                @error('date_de_naissance')
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
                            <label for="role" class="col-3">Role</label>
                            <div class="col-9">
                                <input type="text" id="role" class="form-control" wire:model="role">
                                @error('role')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Add Utilisateur</button>
                            </div>
                        </div>
                    </form>
                </div>
              

           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade" id="editUtilisateurModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form wire:submit.prevent="editUtilisateurData">
                        <div class="form-group row">
                            <label for="utilisateur_id" class="col-3">Utilisateur ID</label>
                            <div class="col-9">
                                <input type="number" id="utilisateur_id" class="form-control" wire:model="utilisateur_id">
                                @error('utilisateur_id')
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
                            <label for="date_de_naissance" class="col-3">Date de Naissance</label>
                            <div class="col-9">
                                <input type="date" id="date_de_naissance" class="form-control" wire:model="date_de_naissance">
                                @error('date_de_naissance')
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
                            <label for="role" class="col-3">Role</label>
                            <div class="col-9">
                                <input type="text" id="role" class="form-control" wire:model="role">
                                @error('role')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Edit Utilisateur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!--end edit utilisateur-->

<!-- delete utilisateur-->


<div wire:ignore.self class="modal fade" id="deleteUtilisateurModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-4">
                    <h6>Are you sure? You want to delete this Utilisateur data!</h6>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-primary" wire:click="cancel()" data-dismiss="modal" aria-label="Close">Cancel</button>
                    <button class="btn btn-sm btn-danger" wire:click="deleteUtilisateurData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>

<!--end delete utilisateur-->

<!-- view utilisateur-->

<div wire:ignore.self class="modal fade" id="viewUtilisateurModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Utilisateur Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewUtilisateurModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>ID: </th>
                                <td>{{ $view_utilisateur_id }}</td>
                            </tr>


                            <tr>
                                <th>Nom: </th>
                                <td>{{ $view_utilisateur_nom }}</td>
                            </tr>

                            <tr>
                                <th>Prenom: </th>
                                <td>{{ $view_utilisateur_prenom }}</td>
                            </tr>

                            <tr>
                                <th>Date de Naissance: </th>
                                <td>{{ $view_utilisateur_date_de_naissance}}</td>
                            </tr>


                            <tr>
                                <th>Email: </th>
                                <td>{{ $view_utilisateur_email }}</td>
                            </tr>
                            <tr>
                                <th>Role: </th>
                                <td>{{ $view_utilisateur_role }}</td>
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
            $('#addUtilisateurModal').modal('hide');
            $('#editUtilisateurModal').modal('hide');
            $('#deleteUtilisateurModal').modal('hide');
          
        });

        window.addEventListener('show-edit-utilisateur-modal', event =>{
            $('#editUtilisateurModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteUtilisateurModal').modal('show');
          
        });

        window.addEventListener('show-view-utilisateur-modal', event =>{
            $('#viewUtilisateurModal').modal('show');
          
        });


        
    </script>

@endpush 

