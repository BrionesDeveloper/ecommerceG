<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrusel;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class CarruselComponent extends Component
{
    use WithFileUploads;

    public $carrusels, $carrusel,$rand;

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
        'createForm.image' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'editForm.name' => 'nombre',
        'createForm.image' => 'imagen'
    ];

    public function mount(){
        $this->getCarrusels();
        $this->rand = rand();
    }

    public function getCarrusels(){
        $this->carrusels = Carrusel::all();
    }

    public function save(){
        $this->validate();
        $image = $this->createForm['image']->store('carrusels');
        Carrusel::create([
            'name' => $this->createForm['name'],            
            'image' => $image
        ]);        
        $this->rand = rand();

        $this->reset('createForm');

        $this->getCarrusels();
        $this->emit('saved');

    }

    public function edit(Carrusel $carrusel){
        $this->reset(['editImage']);
        $this->resetValidation();
        $this->carrusel = $carrusel;


        $this->editForm['open'] = true;
        $this->editForm['name'] = $carrusel->name;
        $this->editForm['image'] = $carrusel->image;

    }

    public function update(){
        $this->validate([
            'editForm.name' => 'required'
        ]);
        if ($this->editImage) {
            $rules['editImage'] = 'required|image';
        }
        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('carrusels');
        }

        $this->carrusel->update($this->editForm);
        $this->reset('editForm', 'editImage');

        $this->getCarrusels();
    }

    public function delete(Carrusel $carrusel){
        $carrusel->delete();
        $this->getCarrusels();
    }

    public function render()
    {
        return view('livewire.admin.carrusel-component')->layout('layouts.admin');
    }
}
