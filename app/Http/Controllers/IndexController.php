<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hosting;
use App\Advantage;
use App\Article;

class IndexController extends Controller
{
    public function getHostingList($type = '') {

        $filter = null;
        $param = '';
        if($type == '') {
            $filter = -1;
            $param = 'top';
        } else if ($type == 'type') {
            $filter = 1;
            $param = 'type';
        } else if($type == 'free') {
            $filter = 2;
            $param = 'free';
        } else if($type == 'constructor') {
            $filter = 3;
            $param = 'constructor';
        } else if($type == 'bitrix') {
            $filter = 4;
            $param = 'bitrix';
        } else if($type == 'wordpress') {
            $filter = 5;
            $param = 'wordpress';
        }

        if($filter == -1) {
            $hostings = Hosting::orderBy('rating', 'desc')->limit(10)->get();
        } else {
            $hostings = Hosting::where('filters', 'LIKE', '%'.$filter.'%')->orderBy('rating', 'desc')->limit(10)->get();
        }

        foreach ($hostings as $hosting) {
            $hosting->advanteges = Advantage::where([
                ['hosting_id', '=', $hosting->id],
                ['type', '=', 1]
            ])->get();
        }

        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();

        if($filter != null) {
            return view('templates.home',
                            [
                                'param' => $param,
                                'hostings' => $hostings,
                                'articles' => $articles
                            ]
                        );
        } else {
            return view('404');
        }
    }
}
