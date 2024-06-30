<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::whereNull('parent_id')->get();
        return view('dashboard', compact('categories'));
    }
}
