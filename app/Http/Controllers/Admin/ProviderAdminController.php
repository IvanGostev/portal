<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ProviderAdminController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', 'provider')->paginate(10);
        return view('admin.provider.index', compact('users'));
    }
}
