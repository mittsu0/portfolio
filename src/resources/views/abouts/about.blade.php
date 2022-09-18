@extends('app')
@section('title','本サイトについて | ONEDARI - オネダリ -')

@section('content')
    @include('nav')
    <div class="container main-container">
        <h1 class="content-title text-center mb-4">ONEDARI -オネダリ- は、みんなの「ホシイ」を共有するためのサービスです</h1>
        <div>
            <div class="mb-4">
                <h2 class="content-sub-title">CONCEPT</h2>
                <h3 class="concept mb-0">「地域の需要を可視化する」</h3>
            </div>
            <div>
                <p class="mb-3">地方は都市部と比べると、モノやサービスの多様性（飲食店・商業施設・娯楽施設など）がどうしても低くなるため、
                    そこで暮らす人は、ときに不便さや物足りなさを感じることもあるかと思います。
                    そんな課題を解決する糸口になればと、ONEDARIを立ち上げました。
                <p class="mb-3">
                    ONEDARIでは、地域ごとに欲しいモノやサービスを、匿名で気軽に投稿することができます。
                    そして誰かの投稿に対して、ホシイボタン
                    <i class="far fa-laugh-beam me-1 main-color"></i>
                    とイラナイボタン
                    <i class="far fa-meh me-1 sub-color"></i>
                    で評価し、「どこで」「どれだけの人が」「どんなものを」望んでいるのか、ひと目で分かるようにしました。
                </p>
                <p>ONEDARIは、ユーザーの需要（＝ある地域における住民の需要）を明確にすることで、企業や行政機関の街づくりに貢献し、
                    地方でも不自由なくモノやサービスが利用できる世界を目指します。</p>
            </div>
        </div>
    </div>
    @include('footer')
@endsection