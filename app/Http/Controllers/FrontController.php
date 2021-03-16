<?php

namespace App\Http\Controllers;
use App\Article;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $article = Article::orderBy('id','desc')->paginate(16);
        
        return view('welcome',[
            'article' => $article 
        ]);
    }
    

    public function detail(Request $request, $id)
    {      
        $article = Article::where('id',$id)->firstOrFail();
        return view('detail',[
            'article' => $article
        ]);
    }
}
