<nav class="navbar fixed-top">
    <div class="container-fluid">
        <div class="link-item">
            <a class="navbar-brand" href="{{ route('articles.index') }}">ONEDARI</a>
        </div>
        <div class="nav-post link-item">
            <a  href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1 nav-icon"></i></a>
        </div>
        <div>
            <button class="link-item navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-search nav-icon"></i>
        </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="custom-form-container">
                <ul class="">
                    <li class="row mb-2">
                        <input class="custom-form-control offset-md-7 col-md-5" type="search" placeholder="キーワード">
                    </li>
                    <li class="row mb-2">
                        <label class="col-md-2 offset-md-7 nav-label" for="area">エリア</label>
                        <select class="col-md-3 custom-form-select" id="area">
                            <option selected>全て</option>
                            @foreach (config('pref') as $pref_id => $pref)
                                <option value="{{ $pref_id }}">{{ $pref }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="row mb-2">
                        <label class="col-md-2 offset-md-7 nav-label" for="area">カテゴリ</label>
                        <select class="col-md-3 custom-form-select">
                            <option selected>全て</option>
                            @foreach(config('category') as $category_id => $category)
                                <option value="{{ $category_id }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="row">
                        <button class="btn btn-sub col-md-5 offset-md-7" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
