<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use Illuminate\Http\Request;

class Edit extends Component
{
    public function render(Request $request)
    {
        return view('livewire.profile.edit', [[
            'user' => $request->user(),
        ]]);
    }
}
