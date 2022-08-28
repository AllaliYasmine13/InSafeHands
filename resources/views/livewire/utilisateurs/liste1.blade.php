{{-- Liste des Users --}}
<div class="dash_blog_inner">
        <div class="dash_head">
            <h3><span><i class="fa fa-users"></i> Liste Des Utilisateurs</span><span class="plus_green_bt"><a href="">+</a></span></h3>
        </div>
</div>

<div class="row p-4 pt-5">
      <div class="col-12">
           <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                {{-- <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des utilisateurs</h3> --}}

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-blue mr-4 d-block" wire:click = "goToAddUser()"><i class="fa fa-user-plus fa-2x orange_color"></i> Nouvel utilisateur</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search orange_color"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0 table-striped" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th style="width:5%;"></th>
                      <th style="font-weight:bold;">Utilisateurs</th>
                      <th style="font-weight:bold;" >Roles</th>
                      <th style="font-weight:bold;" class="text-center">Ajouté</th>
                      <th style="font-weight:bold;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>
                       <img src="{{asset('images/man.png')}}" width="24"/>
                      </td>
                      <td> {{$user->name}} </td>
                      <td>{{ $user->allRoleNames}} </td>
                      <td class="text-center"><span class="tag tag-success">{{ $user->created_at->diffForHumans() }}</span></td>
                      <td class="text-center">
                        <button class="btn btn-link" > <i class="fa fa-edit fa-2x blue2_color"></i> </button>
                        <button class="btn btn-link" > <i class="fa fa-trash-o fa-2x orange_color "></i> </button>
                      </td>
                    </tr>
                  @endforeach  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{ $users->links() }} 
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
