<div>
    {{-- Success is as dangerous as failure. --}}
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Appointment Page</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Appointment Page</li>
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
                    <a href="{{route('admin.appointments.create')}}">
                    <button class="btn btn-outline-success btn-sm mb-2"><i class="fa fa-plus-square"></i>       
                      Add New Appointment
                  </button>
                </a>
                </div>
              <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Options</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($appointment as $item)
                       
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->client->name}}</td>
                            <td>{{date_format($item->date, 'Y-m-d')}}</td>
                            <td>{{$item->time}}</td>
                            <td>
                              @if ($item->status == 'SCHEDULED')
                                  <span class="badge badge-success">SCHEDULED</span>
                              @else
                                  <span class="badge badge-danger">CLOSED</span>
                              @endif
                            </td>
                            <td>
                                <a href="{{route('admin.appointments.edit', $item)}}" class="text-info" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="" class="text-danger" wire:click.prevent = "">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                          </tr>
                         
                                
                         @endforeach

                        </tbody>
                      </table>
                </div>
                <div class="card-footer d-flex justify-content-end">
                  
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
