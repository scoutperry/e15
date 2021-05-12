<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Recipe; # Make Recipe Model accessible
use Carbon\Carbon; # We’ll use this library to generate timestamps
use Faker\Factory; # We’ll use this library to generate random/fake data

class RecipesTableSeeder extends Seeder
{
    /**
     * This run method is the first method you should have in all your Seeder class files
     * This method will be invoked when we invoke this seeder
     * In this method you should put code that will cause data to be entered into your tables
     * (in this case, that's the `recipes` table)
     */
    public function run()
    {
        $this->addRecipeA();
        // $this->addRecipe2();
        // $this->addRecipe3();
        // $this->addRecipe4();
        // $this->addRecipe5();
        // $this->addRecipe6();
        // $this->addRecipe7();
        // $this->addRecipe8();
        // $this->addRecipe9();
    }

    private function addRecipeA()
    {
        $recipe = new Recipe();
         $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
         $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'mediterranean-bean-salad';
        $recipe->title = 'Mediterranean Bean Salad';
        $recipe->pic_url = 'https://theviewfromgreatisland.com/wp-content/uploads/2017/03/Mediterranean-bean-salad-6019-March-07-2017-4.jpg';
        $recipe->source_url ='https://theviewfromgreatisland.com/mediterranean-bean-salad-recipe/';
        $recipe->author = 'Sue Moran';
        $recipe->yield = 8;
        $recipe->calorie = '274.23';
        $recipe->prep_time = 15;
        $recipe->cook_time = '';
        $recipe->total_time = 15;
        $recipe->save();
    }

    private function addRecipe2()
    {
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'easy-shepherds-pie';
        $recipe->title = 'Easy Shepherds Pie';
        $recipe->pic_url = 'https://www.simplyrecipes.com/thmb/L3-WVPNdAV-8uf33m8aahtDDPzs=/960x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/__opt__aboutcom__coeus__resources__content_migration__simply_recipes__uploads__2006__04__shepherds-pie-horiz-a-1600-0f32127e2ea04e7f97ffc8383c60b9bb.jpg';
        $recipe->source_url ='https://www.simplyrecipes.com/recipes/easy_shepherds_pie/';
        $recipe->author = 'Elise Bauer';
        $recipe->yield = '4';
        $recipe->calorie = '';
        $recipe->prep_time = 15;
        $recipe->cook_time = 50;
        $recipe->total_time = 65;
        $recipe->save();
    }

    private function addRecipe3()
    {
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'teriyaki-chicken-and-broccoli';
        $recipe->title = 'Teriyaki Chicken & Broccoli';
        $recipe->pic_url = 'https://asimplepalate.com/wp-content/uploads/2019/02/Chicken-Teriyaki-4-1.jpg';
        $recipe->source_url ='https://asimplepalate.com/blog/10-minute-teriyaki-chicken-broccoli/';
        $recipe->author = 'Bethany Kramer';
        $recipe->yield = 4;
        $recipe->calorie = '';
        $recipe->prep_time = 10;
        $recipe->cook_time = 10;
        $recipe->total_time = 20;
        $recipe->save();
    }

    private function addRecipe4()
    {
        $recipe4 = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'salmon-patties';
        $recipe->title = 'Salmon Patties';
        $recipe->pic_url = 'https://img.sndimg.com/food/image/upload/c_thumb,q_80,w_608,h_342/v1/img/recipes/43/35/23/PhnHAK2WSOJrDf2QdkPl_fishcakes6.jpg';
        $recipe->source_url ='https://www.food.com/recipe/so-easy-salmon-patties-433523';
        $recipe->author = 'Oliver Fischers Mo';
        $recipe->yield = '4';
        $recipe->calorie = '';
        $recipe->prep_time = '';
        $recipe->cook_time = '';
        $recipe->total_time = '15';
        $recipe->save();
    }

    private function addRecipe5()
    {    
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'red-beans-and-rice';
        $recipe->title = 'Red Beans and Rice';
        $recipe->pic_url = 'https://s23209.pcdn.co/wp-content/uploads/2019/04/Red-Beans-and-RiceIMG_8715.jpg';
        $recipe->source_url ='https://damndelicious.net/2019/04/15/red-beans-and-rice/';
        $recipe->author = 'Chungah Rhee';
        $recipe->yield = '8';
        $recipe->calorie = '';
        $recipe->prep_time = '20';
        $recipe->cook_time = '40';
        $recipe->total_time = '60';
        $recipe->save();
    }

    private function addRecipe6()
    {    
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'halal-cart-style-chicken-and-rice-white-sauce';
        $recipe->title = 'Halal Cart-Style Chicken and Rice With White Sauce';
        $recipe->pic_url = 'https://www.seriouseats.com/thmb/yUv5KUnabn9dmvvzFfZmpZ-kF8E=/960x0/filters:no_upscale():max_bytes(150000):strip_icc():format(webp)/__opt__aboutcom__coeus__resources__content_migration__serious_eats__seriouseats.com__2011__12__320200406-halal-chicken-rice-vicky-wasik-5da6e222798f47f2a0a4ac9091a3e4c7.jpg';
        $recipe->source_url ='https://www.seriouseats.com/serious-eats-halal-cart-style-chicken-and-rice-white-sauce-recipe';
        $recipe->author = 'Caroline Russock';
        $recipe->yield = '8';
        $recipe->calorie = '';
        $recipe->prep_time = '15';
        $recipe->cook_time = '45';
        $recipe->total_time = '60';
        $recipe->save();
    }

    private function addRecipe7()
    {
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'baked-oatmeal-cups';
        $recipe->title = 'Baked Oatmeal Cups';
        $recipe->pic_url = 'https://cdn.apartmenttherapy.info/image/upload/f_auto,q_auto:eco,c_fit,w_1392,h_928/k%2Farchive%2F864c06c25c770857d74c752fcf85e5dc00f3c5d8';
        $recipe->source_url ='https://www.thekitchn.com/how-to-make-tender-baked-oatmeal-cups-242475';
        $recipe->author = 'Meghan Splawn';
        $recipe->yield = '12';
        $recipe->calorie = '256';
        $recipe->prep_time = '';
        $recipe->cook_time = '30';
        $recipe->total_time = '30';
        $recipe->save();
    }

    private function addRecipe8()
    {
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'scrambled-egg-muffins';
        $recipe->title = 'Scrambled Egg Muffins';
        $recipe->pic_url = 'https://images.food52.com/DghwjgLIxIzDv71h02VrApMNbsQ=/1320x880/filters:format(webp)/cc9d00a0-cf3e-4e93-b180-34c390724d36--egg_muffin_sm.jpg';
        $recipe->source_url ='https://food52.com/recipes/24818-scrambled-egg-muffins';
        $recipe->author = 'SAVORTHIS, Food52';
        $recipe->yield = '12';
        $recipe->calorie = '';
        $recipe->prep_time = '';
        $recipe->cook_time = '';
        $recipe->total_time = '60';
        $recipe->save();
    }

    private function addRecipe9()
    {
        $recipe = new Recipe();
        $recipe->created_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
        $recipe->slug = 'banana-bread-recipe';
        $recipe->title = 'Banana Bread';
        $recipe->pic_url = 'https://food.fnr.sndimg.com/content/dam/images/food/fullset/2010/4/13/0/GC_banana-bread_s4x3.jpg.rend.hgtvcom.826.620.suffix/1371592847747.jpeg';
        $recipe->source_url ='https://www.foodnetwork.com/recipes/banana-bread-recipe-1969572';
        $recipe->author = 'Mary Sue Milliken, Susan Feniger';
        $recipe->yield = '12';
        $recipe->calorie = '';
        $recipe->prep_time = '30';
        $recipe->cook_time = '70';
        $recipe->total_time = '100';
        $recipe->save();

    }
}