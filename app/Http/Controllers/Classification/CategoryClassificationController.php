<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;

use App\Models\UserSubcategory;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryClassificationController extends Controller
{


    public function update(UserSubcategory $category, Request $request) {
        $category->type = $request->type;
        $category->update();
        return back();
    }

    public function destroy(UserSubcategory $category) {
        $category->delete();
        return back();
    }


}
