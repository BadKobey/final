<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProducts extends Component
{
    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $products = [];
        if($this->search){
            $products = Product::search($this->search)->get();
        }

        return view('livewire.search-products', compact('products'));
    }
}
