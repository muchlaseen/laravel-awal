<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

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

}
