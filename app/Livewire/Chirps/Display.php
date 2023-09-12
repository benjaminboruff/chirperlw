<?php

namespace App\Livewire\Chirps;

use App\Models\Chirp;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\Attributes\On;

class Display extends Component
{
    public Collection $chirps;

    public ?Chirp $editing = null;

    public function mount(): void
    {
        $this->getChirps();
    }

    #[On('chirp-created')]
    #[On('chirp-updated')]
    public function getChirps(): void
    {
        $this->editing = null;

        $this->chirps = Chirp::with('user')
            ->latest()
            ->get();
    }

    public function edit(Chirp $chirp): void
    {
        $this->editing = $chirp;
    }

    #[On('chirp-edit-canceled')]
    public function cancelEdit(): void
    {
        $this->editing = null;
    }

    public function delete(Chirp $chirp): void
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();

        $this->getChirps();
    }

    public function render()
    {
        return view('livewire.chirps.display');
    }
}
