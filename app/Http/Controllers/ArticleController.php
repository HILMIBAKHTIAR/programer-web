<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $article = Article::all();
        return view('article.index', compact('article'));
    }
    public function get()
    {
        $article = Article::orderBy('id', 'ASC')->get();
        return response()->json($article);
    }
    public function edit()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article = new Article();
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('assets/article', 'public');
        } else {
            $filename = null;
        }

        $article->title = $request->title;
        $article->description = $request->description;
        $article->image = $filename;
        $result = $article->save();

        if ($result) {
            return response()->json([
                'status' => 'true',
                'message' => 'data valid',
                'data' => $article
            ], 200);
            // return redirect('/article');
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'data invalid'
            ]);
        }

        // return redirect('/article');

        // $articles = $request->all();
        // $this->authorize('post', $articles);
        // $articles['photo'] = $request->file('photo')->store('assets/Articles', 'public');

        // Article::create($articles);

        // return response()->json([

        //     200
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $id)
    {
        //
        $article = Article::find($id);
        if (!$article) {
            return response()->json(['message' => 'id not found'], 404);
        }
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);


        $article->title = $request->title;
        $article->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $filename = date('Y') . $image->getClientOriginalName();

            $path = $request->image->storeAs('image', $filename, 'public');
            $article['image'] = $path;
        }

        $result = $article->update($request->except('image'));

        if ($result) {
            return response()->json([
                'status' => 'true',
                'message' => 'data valid',
                'data' => $article
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'data invalid'
            ]);
        }
        // $article->judul = $request->judul;
        // $article->deskripsi = $request->deskripsi;
        // $article->save();

        // return response(['data' => $article]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article, $id)
    {
        //
        $article = Article::findOrFail($id);
        $article->delete();
        return back();
    }
}
