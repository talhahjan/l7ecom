<?php

use Illuminate\Database\Seeder;
use App\Section;
use App\Category;
class CategorySectionSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $section=Section::create([
            'title'=>'Electronic Items',
            'slug'=>'electronic-items',
        ]);

        $parentCategory = Category::create([
            'title' => 'Mobiles & Tablets',
            'slug' => 'mobiles-tablets',
             'section_id'=>$section->id,
             'parent_id'=>0,
        ]);


        $category = Category::create([
            'title' => 'Smart phones',
            'slug' => 'smart-phones',
             'section_id'=>$section->id,
             'parent_id'=>$parentCategory->id,
        ]);

        $category = Category::create([
            'title' => 'Tablets',
            'slug' => 'tablets',
             'section_id'=>$section->id,
             'parent_id'=>$parentCategory->id,
        ]);

        $category = Category::create([
            'title' => 'Accesories',
            'slug' => 'accessories',
             'section_id'=>$section->id,
             'parent_id'=>$parentCategory->id,
        ]);



        $section=Section::create([
            'title'=>'Fashion',
            'slug'=>'fashion',
        ]);

        $parentCategory = Category::create([
            'title' => 'Foot Wear',
            'slug' => 'footwear',
             'section_id'=>$section->id,
             'parent_id'=>0,
        ]);

        $category = Category::create([
            'title' => 'Men Footwear',
            'slug' => 'men-footwear',
             'section_id'=>$section->id,
             'parent_id'=>$parentCategory->id,
        ]);


        $category = Category::create([
            'title' => 'Women Footwear',
            'slug' => 'women-footwear',
             'section_id'=>$section->id,
             'parent_id'=>$parentCategory->id,
           
        ]);

        $category = Category::create([
            'title' => 'Kids Footwear',
            'slug' => 'kids-footwear',
             'section_id'=>$section->id,
             'parent_id'=>$parentCategory->id,
        ]);



        $parentCategory = Category::create([
            'title' => 'Cosmetic & Beauty',
            'slug' => 'cosmetic & Beauty',
             'section_id'=>$section->id,
        ]);


        $section=Section::create([
            'title'=>'General Store',
            'slug'=>'general-store'
        ]);

        $parentCategory = Category::create([
            'title' => 'Foods',
            'slug' => 'foods',
            'section_id'=>$section->id,
            'parent_id'=>0,
        ]);


        $category = Category::create([
            'title' => 'Spices',
            'slug' => 'spices',
            'parent_id' => $parentCategory->id,
            'section_id'=>$section->id,
        ]);

        $category = Category::create([
            'title' => 'Pickles',
            'slug' => 'pickles',
            'parent_id' => $parentCategory->id,
            'section_id'=>$section->id,
        ]);


        $section=Section::create([
            'title'=>'Health care',
            'slug'=>'health-care'
        ]);

        $parentCategory = Category::create([
            'title' => 'Medicines & Surgical',
            'slug' => 'medicenes-surgical',
            'section_id'=>$section->id,
            'parent_id'=>0,

        ]);
        $parentCategory = Category::create([
            'title' => 'Fitness Equipment',
            'slug' => 'fitness-equipment',
            'parent_id' => $parentCategory->id,
            'section_id'=>$section->id,
            'parent_id'=>0,
        ]);
        

    }
}