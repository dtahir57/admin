<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Http\Requests\NewsRequest;
use Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = News::latest()->get();
        return view('news.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->type = $request->type;
        $news->body = $request->body;
        $news->save();
        if ($news) {
            Session::flash('created', 'News Created Successfully');
            return redirect()->route('news.index');
        }
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
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->type = $request->type;
        $news->body = $request->body;
        $news->update();
        if ($news) {
            Session::flash('updated', 'News updated Successfully');
            return redirect()->route('news.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        if ($news) {
            Session::flash('deleted', 'News Deleted Successfully');
            return redirect()->route('news.index');
        }
    }
}
