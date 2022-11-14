<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Welcome extends Component
{
   
    public $sitio=true;
    

    public function ocultar(){      

        $this->sitio=false;
    }
    public function mostrar(){       

        $this->sitio=true;
    }
    public function render()
    {
        $categories = Category::all();
       
        return view('livewire.welcome',compact('categories'));
    }
}
