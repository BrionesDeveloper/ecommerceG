<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;



class BrandComponent extends Component
{
    use WithFileUploads;

    public $brands, $brand,$rand;

    protected $listeners = ['delete'];

    public $createForm=[
        'name' => null,
        'image' => null,
    ];

    public $editForm=[
        'open' => false,
        'name' => null,
        'image' => null,
    ];
    public $editImage;


    public $rules = [
        'createForm.name' => 'required',
        'createForm.image' => 'required|image|max:1024'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre',
        'createForm.image' => 'imagen'
    ];

    public function mount(){
        $this->getBrands();
        $this->rand = rand();
    }

    public function getBrands(){
        $this->brands = Brand::all();
    }

    public function save(){
        $this->validate();
        $image = $this->createForm['image']->store('brands');
        Brand::create([
            'name' => $this->createForm['name'],            
            'image' => $image
        ]);        
        $this->rand = rand();

        $this->reset('createForm');

        $this->getBrands();
        $this->emit('saved');

    }

    public function edit(Brand $brand){
        $this->reset(['editImage']);
        $this->resetValidation();
        $this->brand = $brand;


        $this->editForm['open'] = true;
        $this->editForm['name'] = $brand->name;
        $this->editForm['image'] = $brand->image;

    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required'
        ]);
        if ($this->editImage) {
            $rules['editImage'] = 'required|image|max:1024';
        }
        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('categories');
        }

        $this->brand->update($this->editForm);
        $this->reset('editForm', 'editImage');

        $this->getBrands();
    }

    public function delete(Brand $brand){
        $brand->delete();
        $this->getBrands();
    }

    public function render()
    {
        return view('livewire.admin.brand-component')->layout('layouts.admin');
    }
}
