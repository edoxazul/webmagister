<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ListaNoticias;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class ListaNoticiasPublico extends Component
{
    public function render()
    {
        return view('livewire.lista-noticias-publico');
    }
}
