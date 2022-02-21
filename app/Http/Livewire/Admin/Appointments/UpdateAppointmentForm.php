<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Support\Facades\Validator;
class UpdateAppointmentForm extends Component
{
    public $state = [];
    public $appointment;
    public function mount(Appointment $appointment)
    {
        # code...
       // dd($appointment);
       $this->appointment = $appointment;
        $this->state = $appointment->toArray();
    }
    public function render()
    {
        $client = Client::all();
        return view('livewire.admin.appointments.update-appointment-form', [
            'clients' => $client
        ]);
    }

    public function updateAppointment()
    {
        # code...
        Validator::make($this->state,[
            'client_id' => 'required',
            'date' => 'required',
            'time' => '',
            'note' => 'nullable',
            'status' => 'required|in:SCHEDULED,CLOSED'
        ],['client_id.required' => 'Client field is required'])->validate();
    
      
        $this->appointment->update($this->state);

        $this->dispatchBrowserEvent('alert',['message' => 'Appointment updated successfully!']);
    }
}
