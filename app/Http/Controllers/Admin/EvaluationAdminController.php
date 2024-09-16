<?php

namespace App\Http\Controllers\Admin;



use App\Exports\EvaluationExport;
use App\Exports\ProcedureExport;
use App\Http\Controllers\Controller;

use App\Imports\EvaluationImport;
use App\Imports\ProcedureImport;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class EvaluationAdminController extends Controller
{

    public function index()
    {
        $evaluations = Evaluation::paginate(10);
        return view('admin.evaluation.index', compact('evaluations'));
    }

    public function import(Request $request)
    {
        Excel::import(new EvaluationImport(), $request->file('file'));
        return back();
    }

    public function export()
    {
        return Excel::download(new EvaluationExport(), 'evaluations.xlsx');
    }

}
