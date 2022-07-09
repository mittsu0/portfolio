<h1 class="article-title">
    オネダリを投稿する
</h1>
<form action="" class="article-form">
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="タイトルを書く">
    </div>
    <div class="d-sm-flex">
        <select class="custom-form-select w-50 me-2 mb-3" id="area">
            <option selected>エリアを選ぶ</option>
            @foreach (config('pref') as $pref_id => $pref)
                <option value="{{ $pref_id }}">{{ $pref }}</option>
            @endforeach
        </select>
        <select class="custom-form-select w-50 mb-3" id="category">
            <option selected>カテゴリを選ぶ</option>
            @foreach (config('category') as $category_id => $category)
                <option value="{{ $category_id }}">{{ $category }}</option>
            @endforeach
        </select>

    </div>
    <div class="mb-3">
        <textarea class="form-control" name="" placeholder="本文を書く"></textarea>
    </div>
    <div class="mb-4 d-flex">
        <img class="article-image" src="{{ asset('images/no_image.png') }}" alt="" class="src">
        <input class="form-control-file" type="file">
    </div>
    <div class="mb-3">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox">IDを表示する
        </label>
    </div>
    <button class="btn btn-outline-primary ms-2 w-50" type="submit">確認画面へ</button>
</form>