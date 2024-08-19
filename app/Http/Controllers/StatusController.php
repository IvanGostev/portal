<?php

namespace App\Http\Controllers;

use App\Models\UserSubcategory;

use Illuminate\View\View;

class StatusController extends Controller
{

    public function index(): View
    {
        $userSubcategories = UserSubcategory::where('user_id', auth()->user()->id)->get();
        return view('status.index', compact('userSubcategories'));
    }


}
