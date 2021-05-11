<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Word;

class WordsController extends Controller
{
     public function store(Request $request)
    {
         Word::create($request->all());
        return response()->json(['message' => 'La categoria ha sido creada'], 200);
    }

      public function indexTwo($id)
    {
        $word = Word::where('topic_id', $id)->get();
        return $word;
    }
}