<div>
    {{-- Success is as dangerous as failure. --}}
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Users Page</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Users Page</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>

      <div class="content">
        <div class="container-fluid">
          @if (session()->has('message'))
         
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> <i class="fa fa-check-circle mr-1"></i> Success!</strong> {{session('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
               
          @endif
          <div class="row">
            <div class="col-lg-12">
                <div class="d-flex justify-content-end">
                    <button wire:click.prevent="addNew" class="btn btn-outline-success btn-sm mb-2"><i class="fa fa-plus-square"></i>       
                      Add New User
                  </button>
                </div>
              <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Options</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $item)
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>
                                <a href="" class="text-info" wire:click.prevent = "edit({{$item}})">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" class="text-danger" wire:click.prevent = "confirmUserRemoval({{$item->id}})">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                          @endforeach
                          

                        </tbody>
                      </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                  {{$users->links()}}
                </div>
              </div>
    
             
            </div>
            <!-- /.col-md-6 -->
          
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
      <form wire:submit.prevent="{{$showEditModel ? 'updateUser':'createUser'}}">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            @if ($showEditModel)
                Edit User
            @else
                Add New User
            @endif
            </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" wire:model.defer="state.name" class="form-control @error('name') is-invalid   @enderror" id="name" aria-describedby="emailHelp" placeholder="Enter name" >
              @error('name')
              <div class="invalid-feedback">
                
                {{$message}}
              </div>
              @enderror
              
            </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" wire:model.defer="state.email" class="form-control @error('email') is-invalid   @enderror" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              @error('email')
             
              <div class="invalid-feedback">
                
                {{$message}}
              </div>
                   
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" wire:model.defer="state.password" class="form-control  @error('password') is-invalid   @enderror" id="password" placeholder="Password">
              @error('password')
           
              <div class="invalid-feedback">       
                {{$message}}
              </div>
                     
              @enderror
            </div>
            <div class="form-group">
              <label for="passwordConfirmation">Confirm Password</label>
              <input type="password" class="form-control" wire:model.defer="state.password_confirmation" id="passwordConfirmation" placeholder="Confirm Password">
            </div>
            
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Save changes</button>
        </div>
      
      </div>
    </form>
    </div>
  </div>

  <!-- conformation modal-->
  <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="text-warning"> Delete </h5>
          </div>
          <div class="modal-body">
            <h4 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"> Are you sure want to delete?</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="far fa-window-close"></i> Close</button>
            <button type="button" wire:click.prevent="deleteUser" class="btn btn-outline-danger"><i class="fas fa-minus-circle"></i> Delete</button>
          </div>
        </div>
    </div>
  </div>
  <!-- end modal -->
</div>
