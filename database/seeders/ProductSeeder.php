<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    private array $categories = [
        "bucket", "papan", "vas"
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (env('APP_ENV') === 'local') {
            Storage::disk('public')->deleteDirectory('product');
        }

        $allImages = Storage::disk('dummy')->allFiles();
        foreach ($this->categories as $category) {
            $category = ProductCategory::create([
                "name" => $category
            ]);

            $images = array_filter($allImages, function ($image) use ($category) {
                return strpos($image, $category->name) !== false;
            });

            foreach ($images as $image) {
                $productFactory = Product::factory()->make([
                    "name" => str_replace(["-", ".jpg"], [" ", ""], $image),
                ]);

                $product = $category->products()->createMany([
                    [
                        "name" => $productFactory->name,
                        "price" => $productFactory->price,
                        "stock" => $productFactory->stock,
                        "discount" => $productFactory->discount,
                        "description" => $productFactory->description,
                        "featured" => $productFactory->featured,
                    ]
                ]);

                $product = $product[0];

                $temp = Storage::disk('dummy')->get($image);

                $compressedImage = Image::make($temp);

                $path = storage_path('app/public/product');
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                $fileName = explode(".", $image)[0];
                $filePath = $path . "/" . $fileName . ".webp";

                $compressedImage->save($filePath, 50);

                info("Uploaded new image:" . $filePath);

                $filePath = str_replace(storage_path('app/public'), "", $filePath);

                $product->pictures()->create([
                    "path" => $filePath,
                ]);

                info("Stored " . json_encode($product->toArray()));
            }
        }
    }
}
