<?php

namespace App\Http\Controllers\Admin\Article;

use Session;
use App\Model\Admin\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index')
                ->with('articles', Article::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create');
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
          'title' => 'required|min:2',
          'des' => 'required|min:2'
        ]);

        $article = new Article();

        $article->title = $request->title;
        $article->des = $request->des;

        if ($article->save()) {
          Session::flash('success', 'Article Create Successfully');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.article.edit')
                ->with('article', Article::find($id));
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
        'title' => 'required|min:2',
        'des' => 'required|min:2'
      ]);

      $article = Article::find($id);

      $article->title = $request->title;
      $article->des = $request->des;

      if ($article->save()) {
        Session::flash('success', 'Article Update Successfully');
      }

      return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        if ($article->delete()) {
          Session::flash('success', 'Article Delete Successfully');
        }

        return redirect()->back();
    }
}
