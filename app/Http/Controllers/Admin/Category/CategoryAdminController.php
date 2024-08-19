<?php

namespace App\Http\Controllers\Admin\Category;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryAdminController extends Controller
{

    public function index(): View
    {
        $categories = Category::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create() : View {
        return view('admin.category.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Category::create(['title' => $request->title]);
        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category) : View {
        return view('admin.category.edit', compact('category'));
    }
    public function update(Category $category, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $category->update(['title' => $request->title]);
        return redirect()->route('admin.category.index');
    }
    public function destroy(Category $category) : RedirectResponse {
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        foreach ($subcategories as $subcategory) {
            $subcategory->delete();
        }
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}