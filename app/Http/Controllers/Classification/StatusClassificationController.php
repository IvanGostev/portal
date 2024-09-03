<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use App\Models\Annex;
use App\Models\AnnexType;
use App\Models\Message;
use App\Models\UserSubcategory;
use Illuminate\View\View;

class StatusClassificationController extends Controller
{

    public function index(): View
    {
        $userSubcategories = UserSubcategory::where('user_id', auth()->user()->id)->get();
        $messages = Message::where('from', auth()->user()->id)->orWhere('for', auth()->user()->id)->latest()->paginate();
        $files = Annex::where('user_id', auth()->user()->id)->get();
        $types = AnnexType::all();
        return view('classification.index', compact('userSubcategories', 'messages', 'files', 'types'));
    }

}
