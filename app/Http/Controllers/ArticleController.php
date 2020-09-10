<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Article;
use App\Article_infoblock;
use App\Hosting;

class ArticleController extends Controller
{
    public function getArticles() {
        $article = new Article;
        $articles = $article->orderBy('id', 'desc')->get();
        $top5 = Hosting::orderBy('rating', 'desc')->limit(5)->get();

        return view('templates.articles', [
            'param' => 'article',
            'articles' => $articles,
            'top5' => $top5
        ]);
    }

    public function getArticle($id) {
        $article = new Article;
        $current_article = $article->find($id);
        $infoblock = new Article_infoblock;
        $infoblocks = $infoblock->where('article_id', '=', $id)->get();
        $current_article->test = 'test';
        $current_article->infoblocks = $infoblocks;
        $top5 = Hosting::orderBy('rating', 'desc')->limit(5)->get();
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();

        dump($top5);

        return view('templates.article', [
            'param' => '',
            'article' => $current_article,
            'top5' => $top5,
            'articles' => $articles
        ]);
    }
}
