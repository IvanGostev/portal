<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Mail\PasswordMail;
use App\Models\Annex;
use App\Models\AnnexType;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\UserSubcategory;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisterSessionController extends Controller
{

    public function index(Request $request)
    {
        if (!(request()->session()->has('inn') and request()->session()->has('kpp'))) {
            return back();
        }
        $countries = Country::all();
        $cities = City::all();
        $currencies = Currency::all();
        $languages = Language::all();
        $categories = Category::all();
        $annexTypes = AnnexType::all();

        if ($request->session()->has('categories')) {
            foreach ($request->session()->get('categories')[0] as $categoryId) {
                $selectedSubcategories[] = Subcategory::where('id', $categoryId)->first();
            }
        } else {
            $selectedSubcategories = [];
        }

        return view('auth.register', compact('countries', 'cities', 'currencies', 'languages', 'categories', 'annexTypes', 'selectedSubcategories'));
    }

    public function updateOrRegister(Request $request)
    {

        if ($request->session()->has('files')) {
            $files = $request->session()->get('files')[0];
        } else {
            $files = [];
        }
        $request->session()->flush();
        $data = $request->all();
        if (isset($data['new_file'])) {
            $originalName = $request->file->getClientOriginalName();
            $path = "/images/" . $originalName . time();
            $filePatch = Storage::disk('public')->put($path, $data['file']);
            $file = [
                'title' => $originalName,
                'patch' => '/storage/' . $filePatch,
                'type_annex_title' => AnnexType::where('id', $data['type_annex'])->first()->title,
                'type_annex_id' => $data['type_annex'],
                'finish_date' => $data['finish_date'],
                'start_date' => $data['start_date'],

            ];
            if (isset($data['indefinite'])) {
                $file['indefinite'] = 'true';
            } else {
                $file['indefinite'] = 'false';
            }
            unset($data['file']);
            unset($data['new_file']);
            unset($data['indefinite']);
            unset($data['finish_date']);
            unset($data['start_date']);
            unset($data['type_annex']);

            $files[] = $file;
        }
        if (isset($data['file_delete'])) {
            unset($files[$data['file_delete']]);
        }
        $request->session()->push('files', $files);
        unset($data['_token']);
        foreach ($data as $key => $item) {
            $request->session()->push($key, $item);
        }
        if ($request->session()->has('category_delete')) {
            $categories = $request->session()->get('categories')[0];
            foreach ($categories as $key => $categoryID) {
                if ($categoryID == $request->session()->get('category_delete')[0]) {
                    unset($categories[$key]);
                    break;
                }
            }
            $request->session()->forget('categories');
            $request->session()->forget('category_delete');
            $request->session()->push('categories', $categories);
        }

        if (isset($data['register'])) {
            try {
                DB::beginTransaction();
                unset($data['register']);
                $categories = []; // id => type
                if (isset($data['categories'])) {
                    foreach ($data['categories'] as $categoryID) {
                        $categories[$categoryID] = $data['category_type_' . $categoryID];
                        unset($data['category_type_' . $categoryID]);
                    }
                }
                unset($data['categories']);
                unset($data['type_annex']);
                unset($data['start_date']);
                unset($data['finish_date']);
                unset($data['indefinite']);

                $password = Str::random(12);
                $data['password'] = Hash::make($password);
                $user = User::create($data);
                Mail::to($user->email)->send(new PasswordMail($password));
                foreach ($categories as $subcategoryID => $type) {
                    UserSubcategory::create([
                        'user_id' => $user->id,
                        'subcategory_id' => $subcategoryID,
                        'type' => $type,
                    ]);
                }

                $files = $request->session()->get('files')[0] ?? [];
                $request->session()->flush();
                foreach ($files as $file) {
                    Annex::create([
                        'user_id' => $user->id,
                        'annex_type_id' => $file['type_annex_id'],
                        'start' => $file['start_date'],
                        'finish' => $file['finish_date'],
                        'patch' => $file['patch']
                    ]);
                }
                auth()->login($user);
                DB::commit();
                return redirect('/');
            } catch (Exception $exception) {
                DB::rollBack();
            }
        }
        return redirect()->route('rsc');
    }
}


