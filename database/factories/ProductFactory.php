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
            "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg",
            "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-02.jpg",
            "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-03.jpg",
            "https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-04.jpg",
        ];

        return [
            'name' => 'T-shirt ' . $product_no++,
            'description' => $this->faker->sentence(),
            'image_url' => $this->faker->randomElement($image_urls),
            'price' => $this->faker->randomFloat(2, 10, 50)
        ];
    }
}
