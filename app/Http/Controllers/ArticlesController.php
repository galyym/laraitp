<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//            $articles = Articles::all();
//            $articles = Articles::orderBy('created_at', 'desc')->take(1)->get();
            $articles = Articles::orderBy('created_at', 'desc')->get();
//            $articles = Articles::where('title', 'First title for article')->get();
//            $articles = DB::select('SELECT * FROM articles ORDER BY created_at DESC, id ASC');
        return view('articles.index')->with('articles', $articles);
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
           'title' => 'required|max:190|min:10',
           'text' => 'required|min:20'
        ]);

        $article = new Articles();
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->save();

        return redirect('/article')->with('success', 'Статья добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Articles::find($id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Articles::find($id);
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:190|min:10',
            'text' => 'required|min:20'
        ]);

        $article = Articles::find($id);
        $article->title = $request->input('title');
        $article->text = $request->input('text');
        $article->save();

        return redirect('/article')->with('success', 'Статья обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Articles::find($id);
        $article->delete();
        return redirect('/article')->with('success', 'Статья удалена');
    }
}
