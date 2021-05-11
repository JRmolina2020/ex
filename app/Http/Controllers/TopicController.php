<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Topic;

class TopicController extends Controller
{
  public function index()
    {
        $topics = Topic::get();
        return $topics;
    }
    public function indexTwo($id)
    {
        $topics = Topic::where('id', $id)->get();
        return $topics;
    }
    public function store(Request $request)
    {
         Topic::create($request->all());
        return response()->json(['message' => 'La categoria ha sido creada'], 200);
    }

     public function update(Request $request, $id)
    {
        $topics =Topic::find($id, ['id', 'name']);
        $topics->fill([
            'name' => request('name'),
            'type' => request('type'),
            'anger' => request('anger'),
            'disgust' => request('disgust'),
            'fear' => request('fear'),
            'joy' => request('joy'),
            'surprise' => request('surprise'),
            'neutro' => request('neutro'),
            'sadness' => request('sadness'),
             'pos' => request('pos'),
              'neg' => request('neg'),
             'mpos' => request('mpos'),
              'mneg' => request('mneg'),
             
        ])->save();
        return response()->json(['message' => 'El tema ha sido modificado'], 201);
    }
    public function destroy($id){
        $topics = Topic::find($id);
        $topics->delete();

    }
   


}