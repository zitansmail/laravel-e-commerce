<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) { 
            $random = rand(1,10);
            Product::create([
            'name' => 'Labtop'.$i,
            'price' => rand(100,600),
            'description' =>'lorem ipclssum sasas'.$i,
            'image' => 'product'.$random,
            ])->categories()->attach(1);
             
        }
        $product = Product::find(19);
             $product->categories()->attach(2);
        for ($i=0; $i < 20; $i++) { 
            $random = rand(1,10);
            Product::create([
            'name' => 'Tv'.$i,
            'price' => rand(100,600),
            'description' =>'lorem ipclssum sasas'.$i,
            'image' => 'product'.$random,
            ])->categories()->attach(2);
        }
        for ($i=0; $i < 20; $i++) { 
            $random = rand(1,10);
            Product::create([
            'name' => 'Tablette'.$i,
            'price' => rand(100,600),
            'description' =>'lorem ipclssum sasas'.$i,
            'image' => 'product'.$random,
            ])->categories()->attach(3);
        }
        }
        }
    
        
        

