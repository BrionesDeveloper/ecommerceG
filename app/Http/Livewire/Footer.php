<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Footer extends Component
{

    
    public function Apagar(){      

        $this->emit('apagar');
    }
    public function Encender(){       

        $this->emit('encender');
    }
    public function render()
    {
        return view('livewire.footer');
    }
}
