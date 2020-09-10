<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hosting;
use App\Advantage;
use App\Infoblock;
use App\Comment;
use App\Article;
use App\Article_infoblock;

use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function getHostingList() {
        $hosting = new Hosting;
        $hostings = $hosting::all();
        foreach ($hostings as $hosting) {
            $hosting->advanteges = Advantage::where([
                ['hosting_id', '=', $hosting->id],
                ['type', '=', 1]
            ])->get();
        }
        return view('admin.hostingList', ['hostings' => $hostings]);
    }

    public function getHosting($id) {

        return view('admin.index');
    }

    public function addHosting() {
        return view('admin.addHosting');
    }

    public function createHosting(Request $request) {
        $path = '';
        $path_small = '';
        if($request->file('hosting-image')) {
            $path = $request->file('hosting-image')->store('uploads', 'public');
        }

        if($request->file('hosting-image-small')) {
            $path_small = $request->file('hosting-image-small')->store('uploads', 'public');
        }

        $hosting = new Hosting;
        $hosting->hosting_name = $request->input('hosting-name');
        $hosting->logo = $path;
        $hosting->small_logo = $path_small;
        $hosting->admin_voice = $request->input('admin-voice');
        $hosting->hosting_url = $request->input('hosting-url');
        $filters = $request->input('filter');
        $filters_str = '';
        if($filters) {
            foreach ($filters as $filter) {
                $filters_str .= $filter.',';
            }
        }
        $hosting->price = $request->input('price');
        $hosting->filters = $filters_str;
        $hosting->save();

        $plus = $request->input('hosting-plus');
        $minus = $request->input('hosting-minus');

        if($plus) {
            foreach ($plus as $item) {
                $advantage = new Advantage;
                if ($item) {
                    $advantage->text = $item;
                    $advantage->hosting_id = $hosting->id;
                    $advantage->type = 1;
                    $advantage->save();
                }
            }
        }

        if($minus) {
            foreach ($minus as $item) {
                $advantage = new Advantage;
                if ($item) {
                    $advantage->text = $item;
                    $advantage->hosting_id = $hosting->id;
                    $advantage->type = 0;
                    $advantage->save();
                }
            }
        }


        $mediadata = $request->input('mediadata');
        $title = $request->input('title');
        if($mediadata) {
            for ($i = 0; $i < count($mediadata); $i++) {
                $infoblock = new Infoblock;
                $infoblock->title = $title[$i];
                $infoblock->description = $mediadata[$i];
                $infoblock->hosting_id = $hosting->id;
                $infoblock->save();
            }
        }
        return redirect('/admin/hostings');
    }

    public function deleteHosting($id) {
        Hosting::destroy($id);
        $infoblock = new Infoblock;
        $infoblocks = $infoblock->where('hosting_id', '=', $id)->get();
        foreach ($infoblocks as $infoblock) {
            $infoblock->delete();
        }

        $advantage = new Advantage;
        $advantages = $advantage->where('hosting_id', '=', $id)->get();
        foreach ($advantages as $advantage) {
            $advantage->delete();
        }

        $comment = new Comment;
        $comments = $comment->where('hosting_id', '=', $id)->get();
        foreach ($comments as $comment) {
            $comment->delete();
        }

        return redirect('/admin/hostings');
    }

    public function getComments() {
        $comment = new Comment;
        $comments = $comment::all();
        return view('admin.comments', ['comments' => $comments]);
    }

    public function addComments($id) {
        $comment = new Comment;
        $current_comment = $comment->find($id);
        $current_comment->update(['moderation' => 1]);
        $comments = $comment->where('moderation', 1)->get();

        $hosting = new Hosting;
        $rating = 0;
        $rating_usability = 0;
        $rating_satisfaction = 0;
        $rating_money = 0;
        $rating_quality = 0;

        if(count($comments)) {
            foreach ($comments as $comment) {
                $rating = $rating + $comment->totalRating;
                $rating_usability = $rating_usability + $comment->usability;
                $rating_satisfaction = $rating_satisfaction + $comment->satisfaction;
                $rating_money = $rating_money + $comment->money;
                $rating_quality = $rating_quality + $comment->quality;
            }

            $count_comments = count($comments);

            $rating = $rating / $count_comments;
            $rating_usability = $rating_usability / $count_comments;
            $rating_satisfaction = $rating_satisfaction / $count_comments;
            $rating_money = $rating_money / $count_comments;
            $rating_quality = $rating_quality / $count_comments;

            $hosting->where('id', $current_comment->hosting_id)
                ->update([
                    'rating' => $rating,
                    'rating_usability' => $rating_usability,
                    'rating_satisfaction' => $rating_satisfaction,
                    'rating_money' => $rating_money,
                    'rating_quality' => $rating_quality
                ]);
        }

        return redirect('/admin/comments');
    }

    public function deleteComments($id) {
        $comment = new Comment;
        $current_comment = $comment->find($id);
        $hosting_id = $current_comment->hosting_id;
        $current_comment->delete();

        $comments = $comment->where('moderation', 1)->get();

        $hosting = new Hosting;
        $rating = 0;
        $rating_usability = 0;
        $rating_satisfaction = 0;
        $rating_money = 0;
        $rating_quality = 0;

        if(count($comments)) {
            foreach ($comments as $comment) {
                $rating = $rating + $comment->totalRating;
                $rating_usability = $rating_usability + $comment->usability;
                $rating_satisfaction = $rating_satisfaction + $comment->satisfaction;
                $rating_money = $rating_money + $comment->money;
                $rating_quality = $rating_quality + $comment->quality;
            }

            $count_comments = count($comments);

            $rating = $rating / $count_comments;
            $rating_usability = $rating_usability / $count_comments;
            $rating_satisfaction = $rating_satisfaction / $count_comments;
            $rating_money = $rating_money / $count_comments;
            $rating_quality = $rating_quality / $count_comments;

            $hosting->where('id', $hosting_id)
                ->update([
                    'rating' => $rating,
                    'rating_usability' => $rating_usability,
                    'rating_satisfaction' => $rating_satisfaction,
                    'rating_money' => $rating_money,
                    'rating_quality' => $rating_quality
                ]);
        }

        return redirect('/admin/comments');
    }

    public function getArticles() {
        $articles = Article::all();
        return view('admin.articles', [
            'articles' => $articles
        ]);
    }

    public function addArticles() {
        return view('admin.addArticle');
    }

    public function createArticle(Request $request) {
        $article = new Article;
        $article->title = $request->input('article-title');
        $path = '';
        if($request->file('article-image')) {
            $path = $request->file('article-image')->store('uploads', 'public');
        }
        $article->image = $path;
        $article->description = $request->input('article-description');
        $article->save();

        $mediadata = $request->input('mediadata');
        $title = $request->input('title');

        if($mediadata) {
            for ($i = 0; $i < count($mediadata); $i++) {
                $infoblock = new Article_infoblock;
                $infoblock->title = $title[$i];
                $infoblock->description = $mediadata[$i];
                $infoblock->article_id = $article->id;
                $infoblock->save();
            }
        }

        return redirect('/admin/articles');
    }

    public function deleteArticle($id) {
        Article::destroy($id);
        $infoblock = new Article_infoblock;
        $infoblocks = $infoblock->where('article_id', '=', $id)->get();
        dump($infoblocks);
        foreach ($infoblocks as $infoblock) {
            $infoblock->delete();
        }

        return redirect('/admin/articles');
    }
}
