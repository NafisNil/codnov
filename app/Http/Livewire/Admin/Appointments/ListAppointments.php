<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\Component;
use Livewire\WithPagination;
class ListAppointments extends AdminComponent
{
    
    public function render()
    {
        return view('livewire.admin.appointments.list-appointments');
    }
}
