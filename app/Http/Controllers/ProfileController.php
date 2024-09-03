<?php

namespace App\Http\Controllers;


use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function show(): View
    {
        $countries = Country::all();
        $cities = City::all();
        $currencies = Currency::all();

        return view('profile', compact('countries', 'cities', 'currencies'));
    }
    public function update(User $user, Request $request): View
    {
        $user->update($request->all());
        return back();
    }
}
