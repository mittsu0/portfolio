<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleSearchRequest;
use App\Models\Article;
use App\Models\Good;
use App\Models\Bad;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleSearchRequest $request)
    {
        $params = $request->only(['area', 'category', 'keyword', 'popularity']);
        if (!empty($params)) {
            $articles = Article::search($params)->paginate(100)->withQueryString();
            return view('articles.index', compact('articles', 'params'));
        }
        $articles = Article::withCount(['comments', 'goods', 'bads'])->orderBy('created_at', 'desc')->paginate(100);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        if ($request->has('back')) {
            return redirect()->route('articles.create')->withInput();
        }
        $data = $request->only(['title', 'area', 'category', 'body', 'can_display_id', 'image']);
        $article->fill($data);
        $article->fill(['uid' => $request->uid, 'ip_address' => $request->ip()])->save();
        if (isset($data['image'])) {
            Storage::disk('s3')->move('temp/' . $data['image'], 'upload/' . $data['image']);
        }
        $article_id = $article->id;
        return view('articles.complete', compact('article_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Article $article)
    {
        $comments = $article->comments()->orderBy('created_at', 'desc')->paginate(100);
        $comments_count = $article->countComments();
        $uid = $request->uid;
        $request->session()->put('uid', $uid);
        return view('articles.show', compact('article', 'comments', 'comments_count', 'uid'));
    }

    /**
     * Display form confirmation screen.
     *
     * @param \App\Http\Requests\ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function confirm(ArticleRequest $request)
    {
        $data = $request->only(['title', 'area', 'category', 'body', 'can_display_id']);
        $image = $request->image;
        if (isset($image)) {
            $temp_path = Storage::disk('s3')->putFile('temp', $image, 'public');
            $image = str_replace('temp/', '', $temp_path);
            $data = array_merge($data, compact('image'));
        }
        return view('articles.confirm', compact('data'));
    }

    /**
     * Add "good" to specific articles.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return Json
     */
    public function good(Request $request, Article $article)
    {
        $uid = $request->session()->get('uid');
        $has_many_bad = $article->bads()->where('uid', $uid);
        if ($has_many_bad->count() !== 0) $has_many_bad->first()->delete();
        $has_many_good = $article->goods()->where('uid', $uid);
        if ($has_many_good->count() !== 0) $has_many_good->first()->delete();
        $good = new Good;
        $good->fill(['article_id' => $article->id, 'uid' => $uid])->save();
        return [
            'goods_count' => $article->countGoods(),
            'bads_count' => $article->countBads()
        ];
    }

    /**
     * Remove "good" from specific articles.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return Json
     */
    public function ungood(Request $request, Article $article)
    {
        $uid = $request->session()->get('uid');
        $has_many_good = $article->goods()->where('uid', $uid);
        if ($has_many_good->count() !== 0) $has_many_good->first()->delete();
        return [
            'goods_count' => $article->countGoods()
        ];
    }

    /**
     * Add "bad" to specific articles.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return Json
     */
    public function bad(Request $request, Article $article)
    {
        $uid = $request->session()->get('uid');
        $has_many_good = $article->goods()->where('uid', $uid);
        if ($has_many_good->count() !== 0) $has_many_good->first()->delete();
        $has_many_bad = $article->bads()->where('uid', $uid);
        if ($has_many_bad->count() !== 0) $has_many_bad->first()->delete();
        $bad = new Bad;
        $bad->fill(['article_id' => $article->id, 'uid' => $uid])->save();
        return [
            'goods_count' => $article->countGoods(),
            'bads_count' => $article->countBads()
        ];
    }

    /**
     * Remove "bad" from specific articles.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return Json
     */
    public function unbad(Request $request, Article $article)
    {
        $uid = $request->session()->get('uid');
        $has_many_bad = $article->bads()->where('uid', $uid);
        if ($has_many_bad->count() !== 0) $has_many_bad->first()->delete();
        return [
            'bads_count' => $article->countBads()
        ];
    }
}
