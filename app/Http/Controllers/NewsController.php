<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    //
    public function index(){
        $news = News::where('status','active')->get();
        $news= $news->makeHidden(['description']);
        return response()->json($news);
    }

    public function getArticle($id){
        $news = News::where('id',$id)->get();
        return response()->json($news);
    }

    public function updateArticle(Request $request,$id){
        $validated = $request->validate([
            'status' => 'required|in:active,hidden',
        ]);
        if($validated){
            $article = $request->all();
            News::where('id',$id)->update($article);
            $article = News::where('id',$id)->get();
        }
        return response()->json($article);
    }
}
