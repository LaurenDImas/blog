<?php
    
namespace App\Http\Controllers;
    
use App\Article;
use Auth;
use Illuminate\Http\Request;
    
class ArticleController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index','show']]);
         $this->middleware('permission:article-create', ['only' => ['create','store']]);
         $this->middleware('permission:article-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:article-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $articles = Article::latest();
        if($user->hasRole('Staff'))
        {
            $articles = $articles->where('user_id',Auth::user()->id);
        }
        $articles = $articles->paginate(5);

        return view('articles.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
        ]);
        
        
        $input = $request->all();
        $input['tanggal'] = date("Y-m-d", strtotime($request->tanggal));
        $input['user_id'] = Auth::user()->id;
        // dd($input['user_id']);
        $user = Article::create($input);
        return redirect()->route('articles.index')
                        ->with('success','Article created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show',compact('article'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        
        $this->validate($request, [
            'judul' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
        ]);
        
        $input = $request->all();
        $input['tanggal'] = date("Y-m-d", strtotime($request->tanggal));
        $input['user_id'] = Auth::user()->id;
    
        $article->update($input);
    
        return redirect()->route('articles.index')
                        ->with('success','Article updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
    
        return redirect()->route('articles.index')
                        ->with('success','Article deleted successfully');
    }
}