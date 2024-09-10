<?php

namespace App\Livewire;

use App\Models\Carreer;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $carreers = Carreer::all();
        return view(
            'livewire.navigation',
            compact('carreers')
        );
    }
}
