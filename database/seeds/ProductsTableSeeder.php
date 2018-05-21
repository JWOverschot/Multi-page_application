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
    	// Worstenbroodje
        $product = new Product;
        $product->product_name = 'Worstenbroodje';
        $product->product_price = 1000;
        $product->product_discount_percentage = 99;
        $product->product_description = 'Dit is heel lekker!';
        $product->product_media = '[{"alt": "Worstenbroodjes", "url": "worstebrood.jpg", "type": "image"}, {"alt": "Worstenbroodjes", "url": "Brabants_worstenbroodje.jpg", "type": "image"}]';
        $product->product_specifications = '{"deeg": "bladerdeeg", "glutenvrij": false, "vegetarisch": false}';
        $product->save();
        // MacBook
        $product = new Product;
        $product->product_name = 'Real MacBook Air 10.6"';
        $product->product_price = 299.99;
        $product->product_description = 'Very real MacBook by Apples company handcrafted by Steven Jobbs';
        $product->product_media = '[{"alt": "MacBookAir", "url": "Fake-Steve-Jobs-MacBook-Air.jpg", "type": "image"}]';
        $product->product_specifications = '{"Ram": "2GB", "Ports": "2 USB, charging port, 3.5 audio jack, SD card reader", "Weight": "3KG", "Resolution": "1920x1080", "Screen Size": "10.6\"", "Camera resolution": "360p"}';
        $product->save();
        // Simon help
        $product = new Product;
        $product->product_name = 'Simon helpt';
        $product->product_price = 8.50;
        $product->product_description = 'Prijs is per minuut';
        $product->product_media = '[{"alt": "IMG-20180209-WA0003", "url": "IMG-20180209-WA0003_1523365976.jpg", "type": "image"}]';
        $product->product_specifications = '{"specialiteit": "Eten"}';
        $product->save();
        // PewDiePie chair
        $product = new Product;
        $product->product_name = 'PewDiePie Chair';
        $product->product_price = 399.99;
        $product->product_description = 'But can you do this?';
        $product->product_media = '[{"alt": "clutch_chairz-pewdiepie_edition-gaming_chair-2-1", "url": "clutch_chairz-pewdiepie_edition-gaming_chair-2-1_1523360744.png", "type": "image"}]';
        $product->product_specifications = '{"Tilt": "180 Deg."}';
        $product->save();
         // Vsauce Michael
        $product = new Product;
        $product->product_name = 'Hey, Vsauce Michael here';
        $product->product_price = 0.01;
        $product->product_description = '“The bigger question now becomes, "so what? Who cares?" You will never have an infinite number of balls and you will never have a large enough urn to hold all of them. You will never build a lamp that can turn on and off arbitrarily fast. We cannot investigate time or space past a certain smallness, except when pretending, so what are supertasks, but recreational fictions, entertaining riddles? We can ask more questions than we can answer, so what? Well, here\'s what. Neanderthals. Neanderthals and humans, us, Homo sapiens, lived together in Europe for at least five thousand years. Neanderthals were strong and clever, they may have even intentionally buried their dead, but for hundreds of thousands of years, Neanderthals barely went anywhere. They pretty much just explored and spread until they reached water or some other obstacle and then stopped. Homo sapiens, on the other hand, didn\'t do that. They did things that make no sense crossing terrain and water without knowing what lay ahead. Svante Pääbo has worked on the Neanderthal genome at the Max Planck Institute for Evolutionary Anthropology and he points out that technology alone didn\'t allow humans to go to Madagascar, to Australia. Neanderthals built boats too. Instead, he says, there\'s "some madness there. How many people must have sailed out and vanished on the Pacific before you found Easter Island? I mean, it\'s ridiculous. And why do you do that? Is it for the glory? For immortality? For curiosity? And now we go to Mars. We never stop." It\'s ridiculous, foolish, maybe? But it was the Neanderthals who went extinct, not the humans.”';
        $product->product_media = '[{"alt": "vsauce", "url": "vsauce_1524060577.png", "type": "image"}]';
        $product->product_specifications = '{"Supercalifragilisticexpialidocious": "Pasghetti"}';
        $product->save();
    }
}
