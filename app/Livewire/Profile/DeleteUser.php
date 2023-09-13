<?php

namespace App\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteUser extends Component
{
    public User $user;

    public function mount(): void
    {
        $this->user = User::find(Auth::user()->id);
    }

    public function delete()
    {

        $this->authorize('delete', $this->user);

        User::destroy($this->user->id);

        return redirect()->route('landing');
    }

    public function render()
    {
        return view('livewire.profile.delete-user');
    }
}
