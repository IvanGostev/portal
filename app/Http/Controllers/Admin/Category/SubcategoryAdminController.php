<?php

namespace App\Http\Controllers\Admin\Category;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubcategoryAdminController extends Controller
{

    public function index(Category $category) : View
    {
        $subcategories = Subcategory::where('category_id', $category->id)->paginate(10);
        return view('admin.category.subcategory.index', compact('category', 'subcategories'));
    }

    public function create(Category $category) : View {
        return view('admin.category.subcategory.create', compact('category'));
    }

    public function store(Category $category, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Subcategory::create(['title' => $request->title, 'category_id' => $category->id]);
        return redirect()->route('admin.category.subcategory.index', compact('category'));
    }

    public function edit(Subcategory $subcategory) : View {
        return view('admin.category.subcategory.edit', compact('subcategory'));
    }
    public function update(Subcategory $subcategory, Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);
        $subcategory->update(['title' => $request->title]);
        return redirect()->route('admin.category.subcategory.index', ['category' => $subcategory->category_id]);
    }
    public function destroy(Subcategory $subcategory) : RedirectResponse {
        $subcategory->delete();
        return back();
    }
}
