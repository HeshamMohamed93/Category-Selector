<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryA = Category::create(['name' => 'Category A']);
        $categoryB = Category::create(['name' => 'Category B']);
        $categoryC = Category::create(['name' => 'Category C']);

        $subA1 = Category::create(['name' => 'Sub A1', 'parent_id' => $categoryA->id]);
        $subA2 = Category::create(['name' => 'Sub A2', 'parent_id' => $categoryA->id]);

        $subB1 = Category::create(['name' => 'Sub B1', 'parent_id' => $categoryB->id]);
        $subB2 = Category::create(['name' => 'Sub B2', 'parent_id' => $categoryB->id]);

        $subC1 = Category::create(['name' => 'Sub C1', 'parent_id' => $categoryC->id]);
        $subC2 = Category::create(['name' => 'Sub C2', 'parent_id' => $categoryC->id]);

        $subSubA1_1 = Category::create(['name' => 'Sub Sub A1-1', 'parent_id' => $subA1->id]);
        $subSubA1_2 = Category::create(['name' => 'Sub Sub A1-2', 'parent_id' => $subA1->id]);

        $subSubB2_1 = Category::create(['name' => 'Sub Sub B2-1', 'parent_id' => $subB2->id]);
        $subSubB2_2 = Category::create(['name' => 'Sub Sub B2-2', 'parent_id' => $subB2->id]);

        $subSubC1_1 = Category::create(['name' => 'Sub Sub C1-1', 'parent_id' => $subC1->id]);
        $subSubC1_2 = Category::create(['name' => 'Sub Sub C1-2', 'parent_id' => $subC1->id]);

        Category::create(['name' => 'Sub Sub Sub A1-1-1', 'parent_id' => $subSubA1_1->id]);
        Category::create(['name' => 'Sub Sub Sub A1-1-2', 'parent_id' => $subSubA1_1->id]);
        Category::create(['name' => 'Sub Sub Sub B2-2-1', 'parent_id' => $subSubB2_2->id]);
        Category::create(['name' => 'Sub Sub Sub B2-2-2', 'parent_id' => $subSubB2_2->id]);
        Category::create(['name' => 'Sub Sub Sub C1-2-1', 'parent_id' => $subSubC1_2->id]);
        Category::create(['name' => 'Sub Sub Sub C1-2-2', 'parent_id' => $subSubC1_2->id]);
    }
}
