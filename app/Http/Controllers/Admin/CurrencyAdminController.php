<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CurrencyAdminController extends Controller
{

    public function index(): View
    {
        $currencies = Currency::paginate(10);
        return view('admin.currency.index', compact('currencies'));
    }

    public function create() : View {
        return view('admin.currency.create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Currency::create(['title' => $request->title]);
        return redirect()->route('admin.currency.index');
    }

    public function edit(Currency $currency) : View {
        return view('admin.currency.edit', compact('currency'));
    }
    public function update(Currency $currency, Request $request) : RedirectResponse
    {

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $currency->update(['title' => $request->title]);
        return redirect()->route('admin.currency.index');
    }
    public function destroy(Currency $currency) : RedirectResponse {
        $currency->delete();
        return redirect()->route('admin.currency.index');
    }
}
