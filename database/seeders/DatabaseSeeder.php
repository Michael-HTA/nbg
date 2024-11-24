<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public $categories = [
        'Beef',
        'Pork',
        'Egg',
        'Rice',
        'Wheat',
        'Fresh Fruits',
        'Dry Fruits',
        'Frozen Fruits',
        'Fish',
    ];

    public $products = [
        [
            'name' => 'Beef Sirloin',
            'price' => 25.99,
            'stock' => 50,
            'description' => 'Fresh and tender beef sirloin, perfect for grilling.',
            'category_id' => 1,
        ],
        [
            'name' => 'Pork Tenderloin',
            'price' => 19.49,
            'stock' => 30,
            'description' => 'Juicy pork tenderloin, ideal for roasting.',
            'category_id' => 2,
        ],
        [
            'name' => 'Organic Eggs',
            'price' => 3.99,
            'stock' => 100,
            'description' => 'Fresh organic eggs, high in protein and flavor.',
            'category_id' => 3,
        ],
        [
            'name' => 'Jasmine Rice',
            'price' => 5.49,
            'stock' => 200,
            'description' => 'Premium quality jasmine rice with a delicate aroma.',
            'category_id' => 4,
        ],
        [
            'name' => 'Whole Wheat Flour',
            'price' => 2.99,
            'stock' => 150,
            'description' => 'Whole wheat flour, perfect for baking healthy bread.',
            'category_id' => 5,
        ],
        [
            'name' => 'Fresh Apples',
            'price' => 1.99,
            'stock' => 300,
            'description' => 'Crisp and fresh apples, ideal for snacks or pies.',
            'category_id' => 6,
        ],
        [
            'name' => 'Almonds (Dry Fruits)',
            'price' => 9.99,
            'stock' => 50,
            'description' => 'Roasted almonds, rich in nutrients and perfect for snacking.',
            'category_id' => 7,
        ],
        [
            'name' => 'Frozen Blueberries',
            'price' => 6.99,
            'stock' => 80,
            'description' => 'Frozen blueberries, perfect for smoothies or baking.',
            'category_id' => 8,
        ],
        [
            'name' => 'Salmon Fillet',
            'price' => 14.99,
            'stock' => 60,
            'description' => 'Fresh salmon fillet, perfect for grilling or baking.',
            'category_id' => 9,
        ],
        [
            'name' => 'Chicken Breast',
            'price' => 9.49,
            'stock' => 120,
            'description' => 'Boneless and skinless chicken breasts, ideal for grilling or stir-frying.',
            'category_id' => 1,
        ],
    ];



    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        foreach($this->categories as $category){
             Category::create([
                'name' => $category,
             ]);
        }

        foreach($this->products as $product){
            Product::create($product);
       }
    }
}
