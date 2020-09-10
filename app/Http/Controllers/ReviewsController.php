<?php

namespace App\Http\Controllers;

use App\Article;
use App\Hosting;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function getHosting() {
        $hostings = Hosting::all();
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();
        $top5 = Hosting::orderBy('rating', 'desc')->limit(5)->get();
        dump($hostings);
        return view('templates.reviews', [
            'param' => '',
            'hostings' => $hostings,
            'articles' => $articles,
            'top5' => $top5
        ]);

    }
}
