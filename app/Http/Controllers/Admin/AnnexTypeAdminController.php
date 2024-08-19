<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\AnnexType;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnexTypeAdminController extends Controller
{

    public function index(): View
    {
        $types = AnnexType::paginate(10);
        return view('admin.annex-type.index', compact('types'));
    }

    public function create() : View {
        return view('admin.annex-type.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        AnnexType::create(['title' => $request->title]);
        return redirect()->route('admin.annex.type.index');
    }

    public function edit(AnnexType $type) : View {
        return view('admin.annex-type.edit', compact('type'));
    }
    public function update(AnnexType $type, Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $type->update(['title' => $request->title]);
        return redirect()->route('admin.annex.type.index');
    }
    public function destroy(AnnexType $type) : RedirectResponse {
        $type->delete();
        return redirect()->route('admin.annex.type.index');
    }
}
