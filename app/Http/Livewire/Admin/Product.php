<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product as ProductModel;
use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;

    public $search;
    public $filter = [
        'search' => null,
        'discount' => 'all',
        'featured' => 'all',
        'category' => [],
        'price' => [
            'min' => null,
            'max' => null,
        ],
        'stock' => [
            'min' => null,
            'max' => null,
        ],
    ];
    public $showFilter = false;
    public $categoryOptions;

    protected $paginationTheme = 'tailwind';

    protected $listeners = [
        'changeFeatured' => 'changeFeatured',
        'delete' => 'deleteProduct',
        'refreshProduct' => '$refresh',
    ];

    public function mount()
    {
        $this->categoryOptions = ProductCategory::all();
        $this->filter['category'] = $this->categoryOptions->pluck('id')->toArray();
    }

    public function render()
    {
        $products = ProductModel::query();
        $products = $products->where('name', 'like', '%' . $this->search . '%');

        $products = $this->filter($products);

        $products = $products->latest()->paginate(10);

        return view('livewire.admin.product', ['products' => $products])->layout('layouts.admin', ['title' => 'Product']);
    }

    function toggleShowFilter()
    {
        $this->showFilter = !$this->showFilter;
    }

    function resetFilter()
    {
        $this->reset('filter', 'showFilter');
        $this->filter['category'] = $this->categoryOptions->pluck('id')->toArray();
    }

    function filter($products): \Illuminate\Database\Eloquent\Builder
    {
        foreach (array_keys($this->filter) as $key) {
            switch ($key) {
                case 'discount':
                    if ($this->filter['discount']==true & $this->filter['discount'] != 'all') {
                        $products = $products->where('discounted', '>', 0);
                        break;
                    }elseif ($this->filter['discount']==false){
                        $products = $products->where('discounted', 0);
                    }
                    break;

                case 'featured':
                    if ($this->filter['featured']==true & $this->filter['featured']!="all") {
                        $products = $products->where('featured', 1);
                        break;
                    }elseif ($this->filter['featured']==false){
                        $products = $products->where('featured', 0);
                    }
                    break;

                case 'category':
                    if (count($this->filter['category']) > 0) {
                        $products = $products->whereIn('product_category_id', $this->filter['category']);
                        break;
                    }
                    $products = $products->where('product_category_id', null);
                    break;

                case 'price':
                    if ($this->filter['price']['min'] != null) {
                        $products = $products->where('price', '>=', $this->filter['price']['min']);
                    }
                    if ($this->filter['price']['max'] != null) {
                        $products = $products->where('price', '<=', $this->filter['price']['max']);
                    }
                    break;

                case 'stock':
                    if ($this->filter['stock']['min'] != null) {
                        dd($this->filter['stock']['min']);
                        $products = $products->where('stock', '>=', $this->filter['stock']['min']);
                    }
                    if ($this->filter['stock']['max'] != null) {
                        $products = $products->where('stock', '<=', $this->filter['stock']['max']);
                    }
                    break;
            }
        }

        return $products;
    }

    public function changeFeatured($product, $req)
    {
        $product = ProductModel::find($product);
        $product->update([
            'featured' => $req
        ]);

        $message = $req ? 'Featured' : 'Unfeatured';
        $product = $product->name;

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Successfully Set <strong>'$product'</strong> as <strong>$message Product.</strong>"]);
    }

    public function deleteProduct($id)
    {
        $product = ProductModel::find($id);
        $product->delete();

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Successfully Delete <strong>'$product->name'</strong>"]);

        $this->emit('refreshProduct');
    }

    function edit($id)
    {
        $this->emit('showEdit', $id);
    }

    function create()
    {
        $this->emit('showCreate');
    }
}
