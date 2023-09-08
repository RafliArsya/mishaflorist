<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
	public function render()
	{
		$featuredProducts = Product::where('featured', true)->get();
		return view('livewire.home', compact('featuredProducts'))->layout('layouts.main', ['title' => 'Home', 'headerVisibleOnScroll' => false]);
	}
}
