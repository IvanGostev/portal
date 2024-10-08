<?php

namespace App\Http\Controllers\Admin;


use App\Exports\CategoryExport;
use App\Exports\CityExport;
use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Imports\CityImport;
use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class CityAdminController extends Controller
{

    public function index(): View
    {
        $cities = City::paginate(10);
        return view('admin.city.index', compact('cities'));
    }

    public function create() : View {
        return view('admin.city.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        City::create(['title' => $request->title]);
        return redirect()->route('admin.city.index');
    }

    public function edit(City $city) : View {
        return view('admin.city.edit', compact('city'));
    }
    public function update(City $city, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $city->update(['title' => $request->title]);
        return redirect()->route('admin.city.index');
    }
    public function destroy(City $city) : RedirectResponse {
        $city->delete();
        return redirect()->route('admin.city.index');
    }
    public function import(Request $request)
    {
        Excel::import(new CityImport(), $request->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new CityExport(), 'cities.xlsx');
    }
}
