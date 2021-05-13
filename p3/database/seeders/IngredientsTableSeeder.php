<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Ingredient;

use Carbon\Carbon; 

class IngredientsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredients = [
            ['cannellini beans', 'Mediterranean Bean Salad'],
            ['garbanzo beans', 'Mediterranean Bean Salad'],
            ['cherry tomato halves', 'Mediterranean Bean Salad'],
            ['Persian cucumbers', 'Mediterranean Bean Salad'],
            ['red onion', 'Mediterranean Bean Salad'],
            ['peppadew peppers', 'Mediterranean Bean Salad'],
            ['black olives', 'Mediterranean Bean Salad'],
            ['pimento stuffed green olives', 'Mediterranean Bean Salad'],
            ['bell peppers', 'Mediterranean Bean Salad'],
            ['crumbled feta cheese', 'Mediterranean Bean Salad'],
            ['marinated artichokes', 'Mediterranean Bean Salad'],
            ['basil', 'Mediterranean Bean Salad'],
            ['olive oil', 'Mediterranean Bean Salad'],
            ['red wine vinegar', 'Mediterranean Bean Salad'],
            ['thyme', 'Mediterranean Bean Salad'],
            ['oregano', 'Mediterranean Bean Salad'],
            ['rosemary', 'Mediterranean Bean Salad'],
            ['garlic', 'Mediterranean Bean Salad'],
            ['salt', 'Mediterranean Bean Salad'],
            ['pepper', 'Mediterranean Bean Salad'],
            ['potatoes', 'Easy Shepherds Pie'],
            ['butter', 'Easy Shepherds Pie'],
            ['onion', 'Easy Shepherds Pie'],
            ['vegetables', 'Easy Shepherds Pie'],
            ['ground beef', 'Easy Shepherds Pie'],
            ['beef broth', 'Easy Shepherds Pie'],
            ['Worcestershire', 'Easy Shepherds Pie'],
            ['salt', 'Easy Shepherds Pie'],
            ['pepper', 'Easy Shepherds Pie'],
            ['chicken breasts', 'Teriyaki Chicken & Broccoli'],
            ['broccoli', 'Teriyaki Chicken & Broccoli'],
            ['oil', 'Teriyaki Chicken & Broccoli'],
            ['soy sauce', 'Teriyaki Chicken & Broccoli'],
            ['coconut sugar', 'Teriyaki Chicken & Broccoli'],
            ['sesame oil', 'Teriyaki Chicken & Broccoli'],
            ['ginger', 'Teriyaki Chicken & Broccoli'],
            ['cornstarch', 'Teriyaki Chicken & Broccoli'],
            ['garlic', 'Teriyaki Chicken & Broccoli'],
            ['sesame seeds', 'Teriyaki Chicken & Broccoli'],
            ['salmon', 'Salmon Patties'],
            ['onion', 'Salmon Patties'],
            ['breadcrumbs', 'Salmon Patties'],
            ['parsley', 'Salmon Patties'],
            ['eggs', 'Salmon Patties'],
            ['butter', 'Salmon Patties'],
            ['olive oil', 'Salmon Patties'],
            ['salt', 'Salmon Patties'],
            ['pepper', 'Salmon Patties'],
            ['basmati rice', 'Red Beans and Rice'],
            ['vegetable oil', 'Red Beans and Rice'],
            ['andouille sausage', 'Red Beans and Rice'],
            ['sweet onion', 'Red Beans and Rice'],
            ['green bell pepper', 'Red Beans and Rice'],
            ['celery', 'Red Beans and Rice'],
            ['tomato paste', 'Red Beans and Rice'],
            ['garlic', 'Red Beans and Rice'],
            ['Cajun seasoning', 'Red Beans and Rice'],
            ['red beans', 'Red Beans and Rice'],
            ['chicken stock', 'Red Beans and Rice'],
            ['hot sauce', 'Red Beans and Rice'],
            ['bay leaf', 'Red Beans and Rice'],
            ['salt', 'Red Beans and Rice'],
            ['pepper', 'Red Beans and Rice'],
            ['parsley', 'Red Beans and Rice'],
            ['lemon juice', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['oregano', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['coriander', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['garlic', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['olive oil', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['salt', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['pepper', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['chicken', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['vegetable oil', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['unsalted butter', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['turmeric', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['cumin', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['Basmati rice', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['chicken broth', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['mayo', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['yogurt', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['sugar', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['white vinegar', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['fresh parsley', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['iceberg lettuce', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['tomato', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['pita bread', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['hot sauce', 'Halal Cart-Style Chicken and Rice With White Sauce'],
            ['cooking spray', 'Baked Oatmeal Cups'],
            ['eggs', 'Baked Oatmeal Cups'],
            ['milk', 'Baked Oatmeal Cups'],
            ['fruit purée', 'Baked Oatmeal Cups'],
            ['unsalted butter', 'Baked Oatmeal Cups'],
            ['maple syrup', 'Baked Oatmeal Cups'],
            ['vanilla extract', 'Baked Oatmeal Cups'],
            ['old fashion oats', 'Baked Oatmeal Cups'],
            ['baking powder', 'Baked Oatmeal Cups'],
            ['cinnamon', 'Baked Oatmeal Cups'],
            ['salt', 'Baked Oatmeal Cups'],
            ['nuts', 'Baked Oatmeal Cups'],
            ['raisins', 'Baked Oatmeal Cups'],
            ['butter', 'Scrambled Egg Muffins'],
            ['corn', 'Scrambled Egg Muffins'],
            ['salt', 'Scrambled Egg Muffins'],
            ['sugar', 'Scrambled Egg Muffins'],
            ['ham', 'Scrambled Egg Muffins'],
            ['maple syrup', 'Scrambled Egg Muffins'],
            ['eggs', 'Scrambled Egg Muffins'],
            ['flour', 'Scrambled Egg Muffins'],
            ['cornmeal', 'Scrambled Egg Muffins'],
            ['baking powder', 'Scrambled Egg Muffins'],
            ['baking soda', 'Scrambled Egg Muffins'],
            ['black pepper', 'Scrambled Egg Muffins'],
            ['cheese', 'Scrambled Egg Muffins'],
            ['poblano', 'Scrambled Egg Muffins'],
            ['milk', 'Scrambled Egg Muffins'],
            ['sugar', 'Banana Bread'],
            ['unsalted butter', 'Banana Bread'],
            ['eggs', 'Banana Bread'],
            ['bananas', 'Banana Bread'],
            ['milk', 'Banana Bread'],
            ['cinnamon', 'Banana Bread'],
            ['flour', 'Banana Bread'],
            ['baking power', 'Banana Bread'],
            ['baking soda', 'Banana Bread'],
            ['salt', 'Banana Bread'],
        ];
    
        $count = count($ingredients);
    
        # Loop through each author, adding them to the database
        foreach ($ingredients as $ingredientData) {
        
            $title = $ingredientData[1];
            $recipe_id = Recipe::where('title', '=', $title)->pluck('id')->first();
    
            $ingredient = new Ingredient();
            $ingredient->created_at = Carbon::now()->subDays($count)->toDateTimeString();
            $ingredient->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
            $ingredient->foodName = $ingredientData[0];
            $ingredient->recipe_id = $recipe_id;
            
            $ingredient->save();
            
            $count--;
        }
    }
}