
<div>
    <div class="container mt-5">
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="float: left;"><strong>Liste Des Utilisateurs</strong></h5>
                        <button class="btn btn-sm btn-primary" style="float: right;" data-toggle="modal" data-target="#addUserModal">Ajouter Utilisateur</button>
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
                                    <th></th>
                                    <th>Utilisateur</th>                             
                                    <th>Role</th>
                                    <th>Ajouté</th>

                                    
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                @if($user->sexe == "F")
                                                  <img src="{{asset('images/woman.png')}}" width="24"/>
                                                @else
                                                  <img src="{{asset('images/man.png')}}" width="24"/>
                                                @endif
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->allRoleNames}}</td>
                                            <td class="text-center"><span class="tag tag-success">{{$user->created_at->diffForHumans()}}</span></td>
                                          
                                            <td style="text-align:center;">
                                                <button class="btn btn-sm btn-link" wire:click="viewUserDetails({{ $user->id }})"> <i class="fa fa-info-circle fa-2x green_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="editUser({{ $user->id }})"> <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                                                <button class="btn btn-sm btn-link" wire:click="deleteConfirmation({{ $user->id }})"> <i class="fa fa-trash-o fa-2x orange_color"></i> </button>
                                                
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"><small>Non Utilisateur Trouvé !</small></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                <!-- end table des utilisateurs-->

                   </div> 
                   <div class="card-footer">
                       <div class="float-right">
                           {{ $users->links() }} 
                       </div>
                   </div>
                </div>
            </div>
   </div>              
   </div> 
   

    <!-- Modal -->
    <!-- add utilisateur-->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="addUserModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Un Utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body ">
                <form wire:submit.prevent="storeUserData" enctype="multipart/form-data">
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="name">Nom Prenom :</label>
                            <input type="text" id="name" class="form-control" wire:model="name">
                                @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="photo">Photo :</label>
                            <input type="file" id="photo" class="form-control" wire:model="photo">
                                @error('photo')
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
                            <label for="sexe">Genre :</label>
                            <select id="sexe" class="form-control @error('sexe') is-invalid @enderror" wire:model="sexe">
                                   <option value="">---------</option>
                                   <option value="H">Homme</option>
                                   <option value="F">Femme</option>
                            </select>
                                @error("sexe")
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror                          
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="email">Email :</label>
                            <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="password">Password :</label>
                            <input type="password" id="password" class="form-control" wire:model="password">
                                @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="telephone1">Telephone 1 :</label>
                            <input type="number" id="telephone1" class="form-control" wire:model="telephone1">
                                @error('telephone1')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="telephone2">Télephone 2 :</label>
                            <input type="number" id="telephone2" class="form-control" wire:model="telephone2">
                                @error('telephone2')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="pieceIdentite">Piece d'identité :</label>
                            <select id="pieceIdentite" class="form-control @error('pieceIdentite') is-invalid @enderror" wire:model="pieceIdentite">
                               <option value="">---------</option>
                               <option value="CARTE NATIONAL">CARTE NATIONAL</option>
                               <option value="PASSPORT">PASSPORT</option>
                               <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                            </select>
                                @error("pieceIdentite")
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror                           
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="numeroPieceIdentite">Numero PieceIdentite :</label>
                            <input type="number" id="numeroPieceIdentite" class="form-control" wire:model="numeroPieceIdentite">
                                @error('numeroPieceIdentite')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Ajouter Utilisateur</button>
                            </div>
                        </div>
                    </form>
                </div>             
           </div>
       </div>
   </div>
<!-- end add utilisateur-->

<!-- Edit utilisateur-->

<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editUserModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modifier Les Informations d'Un Utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="editUserData" enctype="multipart/form-data">                      
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="name">Nom Prenom :</label>
                            <input type="text" id="name" class="form-control" wire:model="name">
                                @error('name')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="photo">Photo :</label>
                            <input type="file" id="photo" class="form-control" wire:model="photo">
                                @error('photo')
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
                            <label for="sexe">Genre :</label>
                            <select id="sexe" class="form-control @error('sexe') is-invalid @enderror" wire:model="sexe">
                                   <option value="">---------</option>
                                   <option value="H">Homme</option>
                                   <option value="F">Femme</option>
                            </select>
                                @error("sexe")
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror                          
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="email">Email :</label>
                            <input type="email" id="email" class="form-control" wire:model="email">
                                @error('email')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="password">Password :</label>
                            <input type="password" id="password" class="form-control" wire:model="password">
                                @error('password')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>

                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="telephone1">Telephone 1 :</label>
                            <input type="number" id="telephone1" class="form-control" wire:model="telephone1">
                                @error('telephone1')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="telephone2">Télephone 2 :</label>
                            <input type="number" id="telephone2" class="form-control" wire:model="telephone2">
                                @error('telephone2')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                    <div class="d-flex">                           
                        <div class="form-group flex-grow-1 mr-2">
                            <label for="pieceIdentite">Piece d'identité :</label>
                            <select id="pieceIdentite" class="form-control @error('pieceIdentite') is-invalid @enderror" wire:model="pieceIdentite">
                               <option value="">---------</option>
                               <option value="CARTE NATIONAL">CARTE NATIONAL</option>
                               <option value="PASSPORT">PASSPORT</option>
                               <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                            </select>
                                @error("pieceIdentite")
                                    <span class="text-danger">{{ $message }}</span>
                                 @enderror                           
                        </div>
                        <div class="form-group flex-grow-1">
                            <label for="numeroPieceIdentite">Numero PieceIdentite :</label>
                            <input type="number" id="numeroPieceIdentite" class="form-control" wire:model="numeroPieceIdentite">
                                @error('numeroPieceIdentite')
                                    <span class="text-danger" style="font-size: 11.5px;">{{ $message }}</span>
                                @enderror
                        </div>
                    </div>
                        <div class="form-group row">
                            <label for="" class="col-3"></label>
                            <div class="col-9">
                                <button type="submit" class="btn btn-sm btn-primary">Ajouter Utilisateur</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--end edit utilisateur-->

<!-- delete utilisateur-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="deleteUserModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
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
                    <button class="btn btn-sm btn-danger" wire:click="deleteUserData()">Yes! Delete</button>
                </div>
            </div>
        </div>
    </div>
<!--end delete utilisateur-->

<!-- view utilisateur-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="viewUserModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Utilisateur Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewUserModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Nom Prenom : </th>
                                <td>{{ $view_user_name }}</td>
                            </tr>
                            <tr>
                                <th>Photo : </th>
                                <td>{{ $view_user_photo }}</td>
                            </tr>

                            <tr>
                                <th>Date de Naissance: </th>
                                <td>{{ $view_user_date_naissance}}</td>
                            </tr>
                            <tr>
                                <th>Genre : </th>
                                <td>{{ $view_user_sexe}}</td>
                            </tr>


                            <tr>
                                <th>Email: </th>
                                <td>{{ $view_user_email }}</td>
                            </tr>
                            <tr>
                                <th>Password: </th>
                                <td>{{ $view_user_password }}</td>
                            </tr>
                            <tr>
                                <th>Telephone 1: </th>
                                <td>{{ $view_user_telephone1 }}</td>
                            </tr>
                            <tr>
                                <th>Telephone 2: </th>
                                <td>{{ $view_user_telephone2 }}</td>
                            </tr>
                            <tr>
                                <th>Piece d'Identité : </th>
                                <td>{{ $view_user_pieceIdentite }}</td>
                            </tr>
                            <tr>
                                <th>Numero Piece d'Identité : </th>
                                <td>{{ $view_user_numeroPieceIdentite }}</td>
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
            $('#addUserModal').modal('hide');
            $('#editUserModal').modal('hide');
            $('#deleteUserModal').modal('hide');
          
        });

        window.addEventListener('show-edit-user-modal', event =>{
            $('#editUserModal').modal('show');
          
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteUserModal').modal('show');
          
        });

        window.addEventListener('show-view-user-modal', event =>{
            $('#viewUserModal').modal('show');
          
        });


        
    </script>

@endpush 


