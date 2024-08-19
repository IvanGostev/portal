<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryAdminController extends Controller
{

    public function index(): View
    {
        $countries = Country::paginate(10);
        return view('admin.country.index', compact('countries'));
    }

    public function create() : View {
        return view('admin.country.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Country::create(['title' => $request->title]);
        return redirect()->route('admin.country.index');
    }

    public function edit(Country $country) : View {
        return view('admin.country.edit', compact('country'));
    }
    public function update(Country $country, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $country->update(['title' => $request->title]);
        return redirect()->route('admin.country.index');
    }
    public function destroy(Country $country) : RedirectResponse {
        $country->delete();
        return redirect()->route('admin.country.index');
    }
}
