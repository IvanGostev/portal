<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProcedureExport;
use App\Http\Controllers\Controller;
use App\Imports\ProcedureImport;
use App\Models\Category;
use App\Models\Procedure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class ProcedureAdminController extends Controller
{

    public function index(): View
    {
        $procedures = Procedure::latest()->paginate(10);
        return view('admin.procedure.index', compact('procedures'));
    }

    public function destroy(Procedure $procedure): RedirectResponse
    {
        $procedure->delete();
        return back();
    }

    public function import(Request $request)
    {
        Excel::import(new ProcedureImport(), $request->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new ProcedureExport(), 'procedures.xlsx');
    }
}
