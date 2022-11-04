<?php

namespace App\Http\Livewire;

use App\Models\Brand as ModelsBrand;

use Livewire\Component;

class Brand extends Component
{
    public function render()
    {
        $brands= ModelsBrand::all();
        
        return view('livewire.brand',compact('brands'));
    }
}
