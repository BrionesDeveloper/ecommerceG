<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    protected $listeners = ['apagar','encender'];
    public $sitio=true;
    public function apagar(){      

        $this->sitio=false;
    }
    public function encender(){       

        $this->sitio=true;
    }
    public function render()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('livewire.navigation', compact('categories', 'brands'));
    }
}
