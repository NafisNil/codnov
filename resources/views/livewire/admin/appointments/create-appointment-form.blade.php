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
                                            <select class="form-control" wire:model.defer="state.client_id">
                                                @foreach ($clients as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Date:</label>
                                            <div class="input-group date" wire:ignore id="appointmentDate" data-target-input="nearest" data-appointmentdate="@this">
                                                <input  type="text" class="form-control datetimepicker-input" data-target="#appointmentDate" id="appointmentDateInput">
                                                <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                        </div>
                                        <x-timepicker wire:model="state.appointment_start_time"></x-timepicker>
                                      </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Appointment Time:</label>
                                            <div class="input-group date" wire:ignore id="appointmentTime" data-target-input="nearest" data-appointmenttime="@this">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#appointmentTime" id="appointmentTimeInput">
                                                <div class="input-group-append" data-target="#appointmentTime" data-toggle="datetimepicker">
                                                    <div class="input-group-text">
                                                        <i class="far fa-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
    <script type="text/javascript">
        $(function () {
            $('#appointmentDate').datetimepicker({
                          format: 'L'
                      });
                      $('#appointmentTime').datetimepicker({
                          format: 'LT'
                      });
                      $('#appointmentDate').on("change.datetimepicker",function(e){
                        //alert('here');
                          let date = $(this).data('appointmentdate');
                         // console.log(date);
                          eval(date).set('state.date', $('#appointmentDateInput').val());
                      });
                      $('#appointmentTime').on("change.datetimepicker",function(e){
                        //alert('here');
                          let time = $(this).data('appointmenttime');
                         // console.log(date);
                          eval(time).set('state.time', $('#appointmentTimeInput').val());
                      });
      
        });
      </script>
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
