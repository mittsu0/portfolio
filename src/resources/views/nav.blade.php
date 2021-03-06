<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('articles.index') }}">ONEDARI</a>
        <a class="nav-post nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-1"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-search"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="custom-form-container">
                <ul class="">
                    <li class="row mb-2">
                        <input class="custom-form-control col-md-5" type="search" placeholder="キーワード">
                    </li>
                    <li class="row mb-2">
                        <label class="col-md-2" for="area">エリア</label>
                        <select class="col-md-3 custom-form-select" id="area">
                            <option selected>全て</option>
                            @foreach (config('pref') as $pref_id => $pref)
                                <option value="{{ $pref_id }}">{{ $pref }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="row mb-2">
                        <label class="col-md-2" for="area">カテゴリ</label>
                        <select class="col-md-3 custom-form-select">
                            <option selected>全て</option>
                            @foreach(config('category') as $category_id => $category)
                                <option value="{{ $category_id }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li class="row">
                        <button class="btn btn-outline-primary col-md-5" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</nav>
