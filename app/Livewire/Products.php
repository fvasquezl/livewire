<?php

namespace App\Livewire;

use App\Models\Product;
use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    public $productID;

    public function render()
    {
        $products = Product::query()->orderByDesc('created_at')->paginate(3);
        return view('livewire.products', compact('products'));
    }

    public function edit($id)
    {
        $this->dispatch('edit-product', $id);
    }

    public function delete($id)
    {
        $this->productID = $id;
        Flux::modal('delete-product')->show();
    }

    public function deleteProduct()
    {
        Product::find($this->productID)->delete();
        session()->flash('success', 'Product deleted successfully.');
        $this->redirectRoute('products', navigate: true);
        Flux::modal('delete-product')->close();
    }

}
