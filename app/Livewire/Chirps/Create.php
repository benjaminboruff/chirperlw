<?php

namespace App\Livewire\Chirps;

use Livewire\Component;

class Create extends Component
{
    public string $message = '';

    public function store(): void
    {
        $validated = $this->validate([
            'message' => 'required|string|max:255',
        ]);

        auth()->user()->chirps()->create($validated);

        $this->message = '';

        $this->dispatch('chirp-created');
    }

    public function render()
    {
        return view('livewire.chirps.create');
    }
}
