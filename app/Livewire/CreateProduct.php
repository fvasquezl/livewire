<?php

namespace App\Livewire;

use App\Models\Product;
use Flux\Flux;
use Livewire\Component;

class CreateProduct extends Component
{
    public $title;
    public $price;
    public $description;

    public $rules = [
        'title' => 'required|string|max:255',
        'price' => 'required|string|max:255',
        'description' => 'required|string',
    ];

    public function save()
    {
        $this->validate();
        Product::create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
        ]);
        //reset form
        $this->reset();
        Flux::modal('create-product')->close();
        session()->flash('success', 'Product created successfully.');
        $this->redirectRoute('products',navigate: true);
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
