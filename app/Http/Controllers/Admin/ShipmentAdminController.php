<?php

namespace App\Http\Controllers\Admin;


use App\Exports\ProcedureExport;
use App\Exports\ShipmentExport;
use App\Http\Controllers\Controller;
use App\Imports\ProcedureImport;
use App\Imports\ShipmentImport;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ShipmentAdminController extends Controller
{

    public function index(User $user): View
    {
        $shipments = Shipment::where('user_id', $user->id)->latest()->paginate(10);
        return view('admin.provider.shipment.index', compact('shipments', 'user'));
    }

    public function import(Request $request, User $user)
    {
        Excel::import(new ShipmentImport($user), $request->file('file'));
        return back();
    }

    public function export(User $user)
    {
        $shipments = Shipment::where('user_id', $user->id)->get();
        return Excel::download(new ShipmentExport($shipments), 'shipments.xlsx');
    }

    public function destroy(Shipment $shipment) : RedirectResponse {
        $shipment->delete();
        return back();
    }

    public function destroyAll(User $user) : RedirectResponse {
        $shipments = Shipment::where('user_id', $user->id)->get();
        foreach ($shipments as $shipment) {
            $shipment->delete();
        }
        return back();
    }
}
