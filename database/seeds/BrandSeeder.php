<?php

use Illuminate\Database\Seeder;
use App\Brand;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            'title' => 'Dell',
            'logo' => 'uploads/brands/logoes/dell.png'
        ]);

        $brand = Brand::create([
            'title' => 'Samsung',
            'logo' => 'uploads/brands/logoes/samsung.jpg'
        ]);

        $brand = Brand::create([
            'title' => 'Apple',
            'logo' => 'uploads/brands/logoes/apple.png'
        ]);

        $brand = Brand::create([
            'title' => 'Addidas',
            'logo' => 'uploads/brands/logoes/addidas.png'
        ]);


        $brand = Brand::create([
            'title' => 'Haier',
            'logo' => ''
        ]);

        $brand = Brand::create([
            'title' => 'Kenwood',
            'logo' => ''
        ]);

        $brand = Brand::create([
            'title' => 'TCL',
            'logo' => ''
        ]);
        $brand = Brand::create([
            'title' => 'Sony',
            'logo' => ''
        ]);
        $brand = Brand::create([
            'title' => 'Dawlence',
            'logo' => ''
        ]);
        $brand = Brand::create([
            'title' => 'General',
            'logo' => ''
        ]);
    }
}
