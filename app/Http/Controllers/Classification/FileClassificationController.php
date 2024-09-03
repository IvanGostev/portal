<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use App\Models\Annex;
use App\Models\Message;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class FileClassificationController extends Controller
{

    public function store(Request $request)
    {
        $data = [
            'patch' => '/storage/' . Storage::disk('public')->put('files', $request->file),
            'user_id' => auth()->user()->id,
            'annex_type_id' => $request->annex_type_id,
            'text' => $request->text ?? null,
        ];
        if (isset($request['indefinite'])) {
            $data['indefinite'] = 1;
        } else {
            $data['start'] = $request->start;
            $data['finish'] = $request->finish;
        }
        Annex::create($data);
        return back();
    }

    public function answer(Message $message, Request $request)
    {
        $message->update(['answer' => $request->answer]);
        return back();
    }


    public function destroy(Annex $annex)
    {
        $annex->delete();
        return back();
    }


}
