<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\User;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ModeratorAdminController extends Controller
{
    public function index(): View
    {
        $users = User::where('role', '!=', 'provider')->paginate(10);
        return view('admin.moderator.index', compact('users'));
    }

    public function update(User $user, Request $request) {
        $user->update(['role' => $request->role]);
        return back();
    }

    public function create() {
        return view('admin.moderator.create');
    }

    public function store(Request $request) {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $password = Str::random(12);
            $data['password'] = Hash::make($password);
            $user = User::create($data);
            Mail::to($user->email)->send(new PasswordMail($password));
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }

        return redirect()->route('admin.moderator.index');
    }
}
