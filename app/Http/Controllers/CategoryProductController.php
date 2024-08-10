<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{
    public function index()
    {
        return CategoryProduct::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $categoryProduct = CategoryProduct::create($validated);
        return response()->json($categoryProduct);
    }

    public function update(Request $request, $id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $categoryProduct->update($validated);
        return response()->json($categoryProduct);
    }

    public function destroy($id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $categoryProduct->delete();
        return response()->json(null, 204);
    }
}
