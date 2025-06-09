<?php

namespace App\Livewire;

use App\Models\Product;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

class EditProduct extends Component
{
    public $title,$price,$description,$productID;
    #[On('edit-product')]
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productID = $id;
        $this->title = $product->title;
        $this->price = $product->price;
        $this->description = $product->description;

        Flux::modal("edit-product")->show();
    }

    public function update()
    {
        $this->validate([
            'title' => ['required','string','max:255'],
            'price' => ['required'],
            'description' => ['required'],
        ]);
        $product = Product::find($this->productID);
        $product->title = $this->title;
        $product->price = $this->price;
        $product->description = $this->description;
        $product->save();

        session()->flash('success', 'Product updated successfully.');
        $this->redirectRoute('products',navigate: true);
        Flux::modal('edit-product')->close();
    }

    public function render()
    {
        return view('livewire.edit-product');
    }
}
