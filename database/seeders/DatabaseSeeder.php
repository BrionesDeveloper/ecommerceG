<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // ELiminacion de carpetas apra evitar repeteciones de datos 
        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');
        Storage::deleteDirectory('products');
        Storage::deleteDirectory('brands');
        Storage::deleteDirectory('carrusels');


        // Creacion de carpetas para las imagenes 

        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');
        Storage::makeDirectory('products');
        Storage::makeDirectory('brands');
        Storage::makeDirectory('carrusels');

        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        
        $this->call(ProductSeeder::class);

        $this->call(ColorSeeder::class);
        $this->call(ColorProductSeeder::class);

        $this->call(SizeSeeder::class);

        $this->call(ColorSizeSeeder::class);

        $this->call(DepartmentSeeder::class);
   
    }
}
