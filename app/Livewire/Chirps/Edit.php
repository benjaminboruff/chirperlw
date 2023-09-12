<?php

namespace App\Livewire\Chirps;

use App\Models\Chirp;
use Livewire\Component;

class Edit extends Component
{
    public Chirp $chirp;

    public string $message = "";

    public function mount(): void
    {
        $this->message = $this->chirp->message;
    }

    public function update(): void
    {
        $this->authorize('update', $this->chirp);

        $validated = $this->validate([
            'message' => 'required|string|max:255',
        ]);

        $this->chirp->update($validated);

        $this->dispatch('chirp-updated');
    }

    public function cancel(): void
    {
        $this->dispatch('chirp-edit-canceled');
    }

    public function render()
    {
        return view('livewire.chirps.edit');
    }
}
