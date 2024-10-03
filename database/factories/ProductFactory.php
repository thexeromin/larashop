<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $product_no = 1;
        $image_urls = [
            "https://res.cloudinary.com/dat1zs2bh/image/upload/v1727921251/products/zy2ngeiekdx4kqfrsta1.jpg",
            "https://res.cloudinary.com/dat1zs2bh/image/upload/v1727921251/products/b1cbjhye0jsz0qzpdrfm.jpg",
            "https://res.cloudinary.com/dat1zs2bh/image/upload/v1727921251/products/qo7qw318xedqnnxo1cbm.jpg",
            "https://res.cloudinary.com/dat1zs2bh/image/upload/v1727921251/products/uvkw4hf77dc5zuyf5amm.jpg",
        ];

        return [
            'name' => 'T-shirt ' . $product_no++,
            'description' => $this->faker->sentence(),
            'image_url' => $this->faker->randomElement($image_urls),
            'price' => $this->faker->randomFloat(2, 10, 50)
        ];
    }
}
