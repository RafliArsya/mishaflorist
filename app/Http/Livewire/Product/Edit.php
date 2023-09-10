<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Edit extends Component
{
    use WithFileUploads;

    public $show = false;

    public $product;
    public $name;
    public $featured;
    public $stock;
    public $category;
    public $price;
    public $discounted;
    public $pictures = [];
    public $uploadedPictures = [];
    public $currentPictures = [];
    public $deletedPictures = [];
    public $description;

    public $categoryOptions;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'featured' => 'boolean',
        'stock' => 'required|numeric',
        'category' => 'nullable|exists:product_categories,id',
        'price' => 'required|numeric',
        'discounted' => 'required|numeric',
        'pictures' => 'array|max:8',
        'pictures.*' => 'image|max:2048', // 1MB Max
        'description' => 'nullable|min:6|max:2048'
    ];

    protected $listeners = [
        'showEdit' => 'showEdit'
    ];


    public function showEdit($id)
    {
        $product = Product::find($id);
        if ($product) {
            $this->categoryOptions = \App\Models\ProductCategory::all();
            $this->product = $product;
            $this->name = $product->name;
            $this->featured = $product->featured;
            $this->stock = $product->stock;
            $this->category = $product->category->id;
            $this->price = $product->price;
            $this->discounted = $product->discounted;
            $this->description = $product->description;
            $this->currentPictures = $product->pictures->toArray();
            $this->show = true;
        } else {
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => "Product Not Found."]);
        }
    }

    public function close()
    {
        $this->reset();
    }

    public function updatedPictures()
    {
        $this->validate([
            'pictures.*' => 'image|max:2048', // 1MB Max
        ]);
    }

    public function updatedUploadedPictures()
    {
        while ($this->uploadedPictures && count($this->pictures) < (8 - count($this->product->pictures))) {
            array_push($this->pictures, array_shift($this->uploadedPictures));
        }

        if ($this->uploadedPictures) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'warning',
                'message' => 'You can only upload 8 pictures',
            ]);
        }

        $this->reset('uploadedPictures');

        $this->updatedPictures();
    }

    public function removePict($index)
    {
        unset($this->pictures[$index]);

        $this->updatedPictures();
    }

    public function deletePict($id)
    {
        $this->deletedPictures[] = $id;
        $this->currentPictures = array_filter($this->currentPictures, function ($picture) use ($id) {
            return $picture['id'] != $id;
        });
    }

    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'featured' => $this->featured,
            'stock' => $this->stock,
            'product_category_id' => $this->category,
            'price' => $this->price,
            'discounted' => $this->discounted,
            'description' => $this->description,
        ];

        if($this->category == null){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Category tidak boleh kosong',
            ]);
            return;
        }

        if ($this->discounted > $this->price){
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => 'Harga diskon lebih besar dari harga utama',
            ]);
            //Session::flash('alert-class', 'alert-success');
            return;
        }

        $this->product->update($data);

        $this->product->pictures()->createMany(
            array_map(function ($picture) {
                return [
                    'path' => $picture->storePublicly('product', 'public')
                ];
            }, $this->pictures)
        );

        $pictures = $this->product->pictures()->whereIn('id', $this->deletedPictures)->get();
        if ($pictures) {
            foreach ($pictures as $picture) {
                Storage::disk('public')->delete("product/$picture->name");
            }
            $pictures->each->delete();
        }

        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Successfully Update <strong>'$this->name'</strong>"]);

        $this->emit('refreshProduct');
        $this->close();
    }

    public function render()
    {
        return view('livewire.product.edit', [
            'product' => $this->product
        ]);
    }
}
