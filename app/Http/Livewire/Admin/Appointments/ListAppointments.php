<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use Livewire\WithPagination;
use App\Models\Appointment;
class ListAppointments extends AdminComponent
{
    protected $listeners = ['deleteConfirmed' => 'deleteAppointment'];
    public $appointmentIdBeingRemoved = null;
    public function confirmAppointmentRemoval($appointment)
    {
        # code...
        $this->appointmentIdBeingRemoved = $appointment;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteAppointment()
    {
        # code...
        $appointment = Appointment::findorFail($this->appointmentIdBeingRemoved);
        $appointment->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Message deleted successfully!']);
    }

    public function render()
    {
        $appointment = Appointment::with('client')->latest()->get();
        return view('livewire.admin.appointments.list-appointments', [
            'appointment' => $appointment
        ]);
    }
}
