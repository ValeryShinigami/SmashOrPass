<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profiles extends Component
{
    public $user;

    public function addFavoris()
    {
        
        //ajouter en favoris avec l'utilisateur connecté
       
        
    }

    public function render()
    {
        return view('livewire.profiles');
    }
}
