<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function storageOfPersonalData(): View
    {
        return view('main.storageOfPersonalData');
    }
    public function termsOfCooperation(): View
    {
        return view('main.termsOfCooperation');
    }
}
