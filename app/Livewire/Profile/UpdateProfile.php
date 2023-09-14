<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateProfile extends Component
{
    public User $user;
    public $name;
    public $email;

    public function mount(): void
    {
        $this->user = User::find(Auth::user()->id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function update(): void
    {
        $this->user->update(
            $this->all()
        );
        session()->flash('status', 'profile-updated');
    }

    public function render()
    {
        return view('livewire.profile.update-profile');
    }
}
