<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Katalog extends Component
{
    public $filter = [
        'search' => '',
        'discount' => false,
        'price' => 0,
        'stock' => 0,
    ];

    public function render()
    {
        $products = Product::query();
        if ($this->filter) {
            $filter = $this->filter;
            if ($filter['search']) {
                $products = $products->where('name', 'like', '%' . $filter['search'] . '%');
            }
            if ($filter['discount']) {
                $products = $products->where('discounted', '>', 0);
            }
            if ($filter['stock']){
                $value = $filter['stock'];
                $arga = null;
                $argb = null;
                $arga = $value == 1 ? '<=': $arga;
                $arga = $value == 2 ? '>' : $arga;
                $argb = $value >= 1 ? (int)10 : $argb;
                if ($argb != null || $arga != null){
                    $products = $products->where('stock', $arga, $argb);
                    $products = $products->where('stock', '>', 0);
                }
            }
        }
        $products = $products->get();
        if ($filter['price'] == 1){
            $products = $products->sortBy("price");
        }
        if ($filter['price'] == 2){
            $products = $products->sortByDesc("price");
        }

        return view('livewire.katalog', compact('products'))
            ->layout('layouts.main', ['title' => 'Katalog']);
    }
}
