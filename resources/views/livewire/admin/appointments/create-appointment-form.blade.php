<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0 text-dark">Appointments</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="">Appointments</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form wire:submit.prevent="createAppointment">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add New Appointment</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group" wire:ignore>
                                            <label for="note">Note:</label>
                                            <textarea id="note" data-note="@this" wire:model.defer="state.note" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Client:</label>
                                            <select class="form-control @error('client_id') is-invalid @enderror" wire:model.defer="state.client_id">
                                                @foreach ($clients as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                            @error('client_id')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="input-group mb-3">
                                       
                                        <label>Appointment Date:</label>
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <x-datepicker wire:model="state.date" id="appointmentDate" />
                                      </div>
                                      @error('date')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                     @enderror
                                    <div class="input-group mb-3">
                                       
                                        <label>Appointment Time:</label>
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        </div>
                                        <x-timepicker wire:model="state.time" id="appointmentTime"></x-timepicker>
                                      </div>
                                      @error('time')
                                      <div class="invalid-feedback">
                                          {{$message}}
                                      </div>
                                     @enderror
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client">Status:</label>
                                            <select class="form-control @error('status') is-invalid @enderror" wire:model.defer="state.status"  >
                                                <option >Select</option>
                                                <option value="SCHEDULED">SCHEDULED</option>
                                                <option value="CLOSED">CLOSED</option>
                                            </select>
                                        </div>
                                        @error('status')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                       @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-secondary"><i class="fa fa-times mr-1"></i> Cancel</button>
                                <button type="submit" id="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('js')

      <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
      <script>
        ClassicEditor
                .create( document.querySelector( '#note' ) )
                .then( editor => {
                       /* editor.model.document.on('change:data', ()=>{
                          let note = $('#note').data('note');
                          eval(note).set('state.note', editor.getData()); 
                        })*/
                        document.querySelector('#submit').addEventListener('click', ()=>{
                          let note = $('#note').data('note');
                          eval(note).set('state.note', editor.getData()); 
                        });
                } )
                .catch( error => {
                        console.error( error );
                } );
      </script>
    @endpush
</div>
