<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Procedure;
use App\Models\Subcategory;
use App\Models\User;

use App\Models\UserSubcategory;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProcedureController extends Controller
{

    public function index(Request $request)
    {
        $categoriesIDs = UserSubcategory::where('user_id', auth()->user()->id)->where('status', 'approved')->get()->pluck('subcategory_id');
        $subcategories = Subcategory::whereIn('id', $categoriesIDs)->get();
        $procedures = Procedure::query();
        $data = $request->all();

        if (isset($data['subcategory_id']) and $data['subcategory_id'] != 'all') {
            $procedures->where('subcategory_id', $data['subcategory_id']);
        } else {
            $procedures->whereIn('subcategory_id', $categoriesIDs);
        }

        if (isset($data['status'])) {
            $procedures->where('status', 'LIKE', "%{$data['status']}%");
        }

        if (isset($data['title'])) {
            $procedures->where('title', 'LIKE', "%{$data['title']}%");
        }

        if (isset($data['procurement_method'])) {
            $procedures->where('procurement_method', 'LIKE', "%{$data['procurement_method']}%");
        }

        $procedures = $procedures->paginate(10);
        return view('procedure', compact('procedures', 'subcategories'));
    }
}
