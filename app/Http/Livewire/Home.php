<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
//use Illuminate\Support\Facades\Hash;
class Home extends Component
{
	public function render()
	{
		//$password = Hash::make('');
		//dd($password);
		$featuredProducts = Product::where('featured', true)->get();
		return view('livewire.home', compact('featuredProducts'))->layout('layouts.main', ['title' => 'Home', 'headerVisibleOnScroll' => false]);
	}
}
