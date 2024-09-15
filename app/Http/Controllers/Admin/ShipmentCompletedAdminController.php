<?php

namespace App\Http\Controllers\Admin;


use App\Exports\ProcedureExport;
use App\Exports\ShipmentExport;
use App\Http\Controllers\Controller;
use App\Imports\ProcedureImport;
use App\Imports\ShipmentImport;
use App\Models\Shipment;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ShipmentCompletedAdminController extends Controller
{

    public function index(User $user, Request $request): View
    {
        $shipments = Shipment::query()->where(function ($query) {
            $query->orWhere('shipments.delivery_date', '<', Carbon::now(new DateTimeZone('Europe/Moscow')));
        })->where(function ($query) {
            $query->whereNull('shipments.new_delivery_date')
                ->orWhere('shipments.new_delivery_date', '<', Carbon::now(new DateTimeZone('Europe/Moscow')));
        });
        $data = $request->all();

        if (isset($data['subcategory_id']) and  $data['subcategory_id'] != 'all') {
            $shipments->where('shipments.subcategory_id', $data['subcategory_id']);
        }

        if (isset($data['title'])) {
            $shipments->join('users', 'users.id', '=', 'shipments.user_id')
            ->where('users.company_title', 'LIKE', "%{$data['title']}%");
        }
        $shipments = $shipments->paginate(10);
        $subcategories = Subcategory::all();
        return view('admin.shipment.completed', compact('shipments', 'user', 'subcategories'));
    }


}
