<?php

namespace App\Http\Controllers;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Shipment;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\UserSubcategory;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShipmentController extends Controller
{

    public function index(Request $request): View
    {
        $shipments = Shipment::query()->where('user_id', auth()->user()->id)->where(function ($query) {
            $query->orWhere('delivery_date', '>=', Carbon::now(new DateTimeZone('Europe/Moscow')));
        })->where(function ($query) {
            $query->whereNull('new_delivery_date')
                ->orWhere('new_delivery_date', '>=', Carbon::now(new DateTimeZone('Europe/Moscow')));
        });
        $categoriesIDs = UserSubcategory::where('user_id', auth()->user()->id)->where('status', 'approved')->get()->pluck('subcategory_id');
        $subcategories = Subcategory::whereIn('id', $categoriesIDs)->get();

        $data = $request->all();

        if (isset($data['subcategory_id'])) {
            $shipments->where('subcategory_id', $data['subcategory_id']);
        }
        if (isset($data['contract_number'])) {
            $shipments->where('contract_number', 'LIKE', "%{$data['contract_number']}%");
        }
        if (isset($data['order_number'])) {
            $shipments->where('order_number', 'LIKE', "%{$data['order_number']}%");
        }
        if (isset($data['spp_element'])) {
            $shipments->where('spp_element', 'LIKE', "%{$data['spp_element']}%");
        }
        if (isset($data['code_num'])) {
            $shipments->where('code_num', 'LIKE', "%{$data['code_num']}%");
        }
        if (isset($data['title_num'])) {
            $shipments->where('title_num', 'LIKE', "%{$data['title_num']}%");
        }
        if (isset($data['address'])) {
            $shipments->where('address', 'LIKE', "%{$data['address']}%");
        }
        if (isset($data['delivery_date'])) {
            $shipments->where('delivery_date', 'LIKE', "%{$data['delivery_date']}%");
        }
        if (isset($data['new_delivery_date'])) {
            $shipments->where('new_delivery_date', 'LIKE', "%{$data['new_delivery_date']}%");
        }
        if (isset($data['sort']) and ($data['sort'] != 'no')) {
            switch ($data['sort']) {
                case 'delivery_date':
                    $shipments->orderBy('delivery_date', 'ASC');
                    break;
                case 'new_delivery_date':
                    $shipments->orderBy('new_delivery_date', 'ASC');
                    break;
            }
        }
        $shipments = $shipments->paginate(10);
        return view('shipments', compact('shipments', 'subcategories'));
    }
    public function update(Shipment $shipment, Request $request)
    {
        $shipment->update(['new_delivery_date' => $request->date]);
        return back();
    }
}
