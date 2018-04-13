<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//first product
        $product = new Product;
        $product->product_name = 'Worstenbroodje';
        $product->product_price = 1000;
        $product->product_discount_percentage = 99;
        $product->product_description = 'Dit is heel lekker!';
        $product->product_media = '[{"alt": "Worstenbroodjes", "url": "worstebrood.jpg", "type": "image"}, {"alt": "Worstenbroodjes", "url": "Brabants_worstenbroodje.jpg", "type": "image"}]';
        $product->product_specifications = '{"deeg": "bladerdeeg", "glutenvrij": false, "vegetarisch": false}';
        $product->save();
        // Second product
        $product = new Product;
        $product->product_name = 'Real MacBook Air 10.6"';
        $product->product_price = 299.99;
        $product->product_description = 'Very real MacBook by Apples company handcrafted by Steven Jobbs';
        $product->product_media = '[{"alt": "MacBookAir", "url": "Fake-Steve-Jobs-MacBook-Air.jpg", "type": "image"}]';
        $product->product_specifications = '{"Ram": "2GB", "Ports": "2 USB, charging port, 3.5 audio jack, SD card reader", "Weight": "3KG", "Resolution": "1920x1080", "Screen Size": "10.6\"", "Camera resolution": "360p"}';
        $product->save();
    }
}
