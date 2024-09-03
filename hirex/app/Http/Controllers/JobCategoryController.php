<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Retrieve all job categories
        return view('categories.index', compact('categories')); // Return a view with the categories
    }
}
