<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Good;
use App\Models\Bad;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Article::all() @return コレクションオブジェクト
        $articles= Article::all()->sortByDesc('created_at');
        return view('articles.index',compact('articles'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        if($request->has('back')){
            return redirect()->route('articles.create')->withInput();
        }
        $data= $request->only(['title','area','category','body','can_display_id','image']);
        $article->fill($data);
        $article->fill(['uid' => $request->uid, 'ip_address' => $request->ip()])->save();
        if(isset($data['image'])){
            Storage::move('public/temp/'.$data['image'], 'public/UploadedFiles/'.$data['image']);
        }
        $article_id= $article->id;
        return view('articles.complete',compact('article_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Article $article)
    {
        /**
         * ルートモデルバインディングを使用(ルートパラメータからORMを自動的に解決する仕組み)
         * ルートパラメータを任意の名前で定義し、値にはORMのidを定義
         * コントローラのメソッドにルートパラメータ名と同じ名前でタイプヒンティングで引数を定義
         */
        $comments= $article->comments->sortByDesc('created_at');//@return collection
        $comments_count= $article->countComments();
        $uid= $request->uid;
        return view('articles.show', compact('article', 'comments','comments_count','uid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function confirm(ArticleRequest $request){
        $data= $request->only(['title','area','category','body','can_display_id']);
        $image= $request->image;
        if(isset($image)){
            //storeメソッド：アップロードファイルをtmpディレクトリから任意のディスクへ移動させる
            //デフォルトであるpublicディスクは、storage/app/public下を示す
            //ディスクルートからの相対ファイルパスを返す
            //dd($image->store('temp','public'));@return temp/画像ファイル名
            //public/storage(シンボリック)/temp/画像ファイル名」でアクセス可能にしたい
            $image=str_replace('temp/','',$image->store('temp','public'));
            $data= array_merge($data,array('image'=>$image));
        }
        return view('articles.confirm',compact('data'));
    }
    public function good(Request $request, Article $article){
        $uid = $request->uid;
        $has_many_bad= $article->bads()->where('uid',$uid);
        if($has_many_bad->count() !== 0) $has_many_bad->first()->delete();
        $has_many_good= $article->goods()->where('uid',$uid);
        if($has_many_good->count() !== 0) $has_many_good->first()->delete();
        $good = new Good;
        $good->fill(['article_id' => $article->id, 'uid' => $uid])->save();
        return [
            'goods_count' => $article->countGoods(),
            'bads_count' => $article->countBads()
        ];
    }
    public function ungood(Request $request, Article $article){
        $uid = $request->uid;
        $has_many_good= $article->goods()->where('uid',$uid);
        if($has_many_good->count() !== 0) $has_many_good->first()->delete();
        return [
            'goods_count' => $article->countGoods()
        ];
    }
    public function bad(Request $request, Article $article){
        $uid = $request->uid;
        $has_many_good= $article->goods()->where('uid',$uid);
        if($has_many_good->count() !== 0) $has_many_good->first()->delete();
        $has_many_bad= $article->bads()->where('uid',$uid);
        if($has_many_bad->count() !== 0) $has_many_bad->first()->delete();
        $bad = new Bad;
        $bad->fill(['article_id' => $article->id, 'uid' => $uid])->save();
        return [
            'goods_count' => $article->countGoods(),
            'bads_count' => $article->countBads()
        ];
    }
    public function unbad(Request $request, Article $article){
        $uid = $request->uid;
        $has_many_bad= $article->bads()->where('uid',$uid);
        if($has_many_bad->count() !== 0) $has_many_bad->first()->delete();
        return [
            'bads_count' => $article->countBads()
        ];
    }
}
