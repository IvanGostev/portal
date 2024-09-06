<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShipmentController extends Controller
{

    public function index(): View
    {
        $shipments = Shipment::where('user_id', auth()->user()->id)->paginate(10);
        return view('shipments', compact('shipments'));
    }
    public function update(Shipment $shipment, Request $request)
    {
        $shipment->update(['new_delivery_date' => $request->date]);
        return back();
    }
}
