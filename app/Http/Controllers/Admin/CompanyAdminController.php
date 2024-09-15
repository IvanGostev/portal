<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Annex;
use App\Models\AnnexType;
use App\Models\Country;
use App\Models\Message;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\UserSubcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyAdminController extends Controller
{

    public function index(Request $request): View
    {
        $users = User::query()->where('role', 'provider');
        $data = $request->all();
        if (isset($data['title'])) {
            $users->where('company_title', 'LIKE', "%{$data['title']}%");
        }
        $users = $users->latest()->paginate('10');
        return view('admin.company.index', compact('users'));
    }

    public function edit(User $user) : View {
        $userSubcategories = UserSubcategory::where('user_id', $user->id)->get();
        $messages = Message::where('from', $user->id)->orWhere('for', $user->id)->latest()->paginate();
        $files = Annex::where('user_id', $user->id)->get();
        $types = AnnexType::all();
        return view('admin.company.edit', compact('user', 'userSubcategories', 'messages', 'files', 'types'));
    }

    public function statusUpdate(User $user, Request $request) : RedirectResponse
    {
        $user->status = $request->status;
        $user->update();
        return back();
    }
    public function statusCategoryUpdate(UserSubcategory $usc, Request $request) : RedirectResponse
    {
        $usc->status = $request->status;
        $usc->update();
        return back();
    }
    public function destroy(Country $country) : RedirectResponse {
        $country->delete();
        return redirect()->route('admin.country.index');
    }
}
