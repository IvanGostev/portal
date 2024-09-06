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
    public function update(User $user, Request $request)
    {
        $data = $request->all();
        if (isset($data['work_edo']) and $data['work_edo'] == 'on') {
            $data['work_edo'] = 1;
        } else {
            $data['work_edo'] = 0;
        }
        if (isset($data['mail_coincides_legal']) and $data['mail_coincides_legal'] == 'on') {
            $data['mail_coincides_legal'] = 1;
        } else {
            $data['mail_coincides_legal'] = 0;
        }
        $user->update($data);
        return back();
    }
}
