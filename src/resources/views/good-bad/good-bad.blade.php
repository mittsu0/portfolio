<article-good-bad-component
    v-bind:initial-is-gooded-by="@json($article->isGoodedBy($uid))"
    v-bind:initial-goods-count="@json($article->countGoods())"
    good-endpoint={{ route('articles.good',$article->id )}}
    v-bind:initial-is-baded-by="@json($article->isBadedBy($uid))"
    v-bind:initial-bads="@json($article->countBads())"
    bad-endpoint={{ route('articles.bad',$article->id) }}
></article-good-bad-component>
