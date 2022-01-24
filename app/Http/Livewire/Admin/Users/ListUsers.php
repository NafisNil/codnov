<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Livewire\WithPagination;
class ListUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $state = [];
    public $user; 
    public $showEditModel = false;
    public $userIdBeignRemove;
    public function addNew()
    {
        # code...
       // dd('here');
       $this->state = [];
        $this->dispatchBrowserEvent('show-form');
    }
    public function render()
    {
        $users = User::latest()->paginate(5);
        return view('livewire.admin.users.list-users',[
            'users' => $users
        ]);
    }

    public function createUser()
    {
        # code...
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ])->validate();
            $validateData['password'] = bcrypt($validateData['password']);
            $this->showEditModel = false;
        User::create($validateData);
        session()->flash('message','User added successfully!');
        $this->dispatchBrowserEvent('hide-form',['message' => 'User added successfully!']);
      
    }

    public function edit(User $user)
    {
        # code...
        $this->showEditModel = true;
        $this->user = $user;
        $this->state = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        # code...
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed'
        ])->validate();
            if (!empty( $validateData['password'])) {
                # code...
                $validateData['password'] = bcrypt($validateData['password']);
            }
       
      
    $this->user->update($validateData);
    
    $this->dispatchBrowserEvent('hide-form',['message' => 'User updated successfully!']);
   
    }

    public function confirmUserRemoval($id)
    {
        # code...
        $this->userIdBeignRemove = $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        # code...
      //  dd($this->userIdBeignRemove);
        $user = User::find($this->userIdBeignRemove);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-modal',['message' => 'User deleted successfully!']);
    }
}
