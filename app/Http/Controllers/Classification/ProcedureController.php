<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Procedure;
use App\Models\User;

use App\Models\UserSubcategory;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProcedureController extends Controller
{

    public function index(Request $request) {
        $categoriesIDs = UserSubcategory::where('id', auth()->user()->id)->where('status', 'approved')->pluck('subcategory_id');
        $procedures = Procedure::whereIn('subcategory_id', $categoriesIDs)->paginate(10);
        return view('procedure', compact('procedures'));
    }
}
