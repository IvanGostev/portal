<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguageAdminController extends Controller
{

    public function index(): View
    {
        $languages = Language::paginate(10);
        return view('admin.language.index', compact('languages'));
    }

    public function create() : View {
        return view('admin.language.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Language::create(['title' => $request->title]);
        return redirect()->route('admin.language.index');
    }

    public function edit(Language $language) : View {
        return view('admin.language.edit', compact('language'));
    }
    public function update(Language $language, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $language->update(['title' => $request->title]);
        return redirect()->route('admin.language.index');
    }
    public function destroy(Language $language) : RedirectResponse {
        $language->delete();
        return redirect()->route('admin.language.index');
    }
}
