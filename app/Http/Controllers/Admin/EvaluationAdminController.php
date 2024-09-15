<?php

namespace App\Http\Controllers\Admin;


use App\Exports\ProcedureExport;
use App\Exports\ShipmentExport;
use App\Http\Controllers\Controller;
use App\Imports\ProcedureImport;
use App\Imports\ShipmentImport;
use App\Models\Evaluation;
use App\Models\Shipment;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class EvaluationAdminController extends Controller
{

    public function create(Shipment $shipment) {
        return view('admin.evaluation.create', compact('shipment'));
    }

    public function store(Shipment $shipment, Request $request) {
        $data = $request->all();
        $data['shipment_id'] = $shipment->id;
        Evaluation::create($data);
       return redirect()->route('admin.shipment.completed');
    }

    public function edit(Evaluation $evaluation) {
        return view('admin.evaluation.edit', compact('evaluation'));
    }

    public function update(Evaluation $evaluation, Request $request) {
        $data = $request->all();
        $evaluation->update($data);
        return redirect()->route('admin.shipment.index');
    }
}
