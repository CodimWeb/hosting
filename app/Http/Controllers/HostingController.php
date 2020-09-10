<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Hosting;
use App\Advantage;
use App\Infoblock;
use App\Comment;

class HostingController extends Controller
{
    public function getHosting($id) {
        $hosting = Hosting::find($id);
        $hosting->advanteges = Advantage::where('hosting_id', '=', $hosting->id)->get();
        $hosting->infoblocks = Infoblock::where('hosting_id', '=', $hosting->id)->get();
        $hosting->comments = Comment::where([
                                                ['hosting_id', '=', $hosting->id],
                                                ['moderation', '=', 1]
                                        ])->get();
        $hosting->cntComments = $this->getCountComments($hosting);
        $top5 = Hosting::orderBy('rating', 'desc')->limit(5)->get();
        $articles = Article::orderBy('created_at', 'desc')->limit(3)->get();

        dump($hosting);

        return view('templates.hosting',
            [
                'param' => '',
                'hosting' => $hosting,
                'top5' => $top5,
                'articles' => $articles
            ]
        );
    }

    public function getCountComments($hosting) {
        $comment = new Comment;
        $comments = $comment
                    ->where([
                        ['hosting_id', '=', $hosting->id],
                        ['moderation', '=', 1]
                    ]);
        $count = $comments->count();

        $num = $count % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        $result = '';
        switch ($num) {
            case 1: $result = $count . ' коментарий'; break;
            case 2: $result = $count . ' коментария'; break;
            case 3: $result = $count . ' коментария'; break;
            case 4: $result = $count . ' коментария'; break;
            default: $result = $count . ' коментариев'; break;
        }

        return $result;
    }


    public function sendComment(Request $request) {
        $comment = new Comment;
        $comment->hosting_id = $request->input('hosting-id');
        $comment->text = $request->input('user-review');
        $comment->email = $request->input('email');
        $comment->user_name = $request->input('user-name');
        $comment->user_position = $request->input('position');
        $comment->usability = $request->input('usability');
        $comment->satisfaction = $request->input('satisfaction');
        $comment->money = $request->input('money');
        $comment->quality = $request->input('quality');
        $comment->totalRating = $request->input('totalRating');
        $comment->moderation = 0;
        $comment->save();

        $data = ['success' => 'success'];

        return $data;
    }
}
