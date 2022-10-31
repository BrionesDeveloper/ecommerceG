<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('livewire.navigation', compact('categories', 'brands'));
    }
}
