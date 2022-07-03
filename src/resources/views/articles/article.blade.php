<h1 class="">
    オネダリを投稿する
</h1>
<form action="" class="article-form">
    <div>
    <input type="text" class="custom-form-control" placeholder="タイトルを書く">
    </div>
    <div>
        <select class="col-md-3 custom-form-select" id="area">
            <option selected>エリアを選択</option>
            @foreach (config('pref') as $pref_id => $pref)
                <option value="{{ $pref_id }}">{{ $pref }}</option>
            @endforeach
        </select>
        <select class="col-md-3 custom-form-select">
            <option selected>カテゴリを選択</option>
            @foreach(config('category') as $category_id => $category)
                <option value="{{ $category_id }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>
    <div class="">
        <textarea name="" placeholder="本文を書く"></textarea>
    </div>
       
</form>