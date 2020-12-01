<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListaAcademicosPublico extends Component
{
    public function render()
    {
        return view('livewire.lista-academicos-publico')
        ->layout('layouts.guest');
    }
}
