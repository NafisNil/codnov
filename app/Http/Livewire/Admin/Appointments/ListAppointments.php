<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use Livewire\WithPagination;
use App\Models\Appointment;
class ListAppointments extends AdminComponent
{
    public function confirmAppointmentRemoval($appointment)
    {
        # code...
        dd($appointment);
    }
    public function render()
    {
        $appointment = Appointment::with('client')->latest()->get();
        return view('livewire.admin.appointments.list-appointments', [
            'appointment' => $appointment
        ]);
    }
}
