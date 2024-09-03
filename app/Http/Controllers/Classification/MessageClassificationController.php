<?php

namespace App\Http\Controllers\Classification;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageClassificationController extends Controller
{

    public function store(Request $request)
    {

        $data = [
            'from' => auth()->user()->id,
            'text' => $request->text
        ];
        if ($request->for != 0) {
            $data['for'] = $request->for;
        }
        Message::create($data);
        return back();
    }

    public function answer(Message $message, Request $request)
    {
        $message->update(['answer' => $request->answer]);
        return back();
    }


    public function destroy(Message $message)
    {
        $message->delete();
        return back();
    }


}
