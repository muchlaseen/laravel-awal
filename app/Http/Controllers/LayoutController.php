<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{ Article, Comment };

class LayoutController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);

        return view('main', [
            'title' => 'Home | Blog',
            'articles' => $articles,
        ]);
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('showmain', [
            'title' => 'Blog' . $id,
            'article' => $article,
            'comments' => $article->comments()->latest()->get(),
        ]);
    }

    public function comment(Request $request, $id)
    {
        // dd($request->all()); for dummie text
        $comment = new Comment;

        $comment->user_id = auth()->id();
        $comment->article_id = $id;
        $comment->message = $request->message;

        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil dipost');
    }

}
