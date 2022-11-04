<?php

namespace App\Http\Livewire;

use App\Models\Carrusel as ModelsCarrusel;
use Livewire\Component;


class Carrusel extends Component
{
        
        public $brands= [];
    
    public function loadPosts(){
        // $this->products = $this->category->products()->where('status', 2)->take(15)->get();
        $this->brands= ModelsCarrusel::all();
        $this->emit('slider');
    }
    
    
    public function render(){
        
        return view('livewire.carrusel',);
    }
}
