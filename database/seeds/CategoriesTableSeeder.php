<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryNames = [
            'Electronics',
            'Toys',
            'Foods',
            'Services',
            'Furniture',
            'Art',
            'Trash',
            'Living Matter',
            'Vehicles',
            'Clothes',
            'Books',
            'Domestic Products',
            'Fun',
            'Sports',
            'Stuff',
            'Entertainment'
        ];
        foreach ($categoryNames as $categoryName) {
            $category = new Category;
            $category->category_name = $categoryName;
            $category->save();
        }
    }
}
