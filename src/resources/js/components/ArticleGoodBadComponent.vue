<template>
    <div class="d-flex justify-content-end align-items-center me-2">
        <div
            v-bind:class="[{'main-color': isGoodedBy}, 'me-3 article-list-icon link-item']"
            v-on:click="clickGood">
            <i class="far fa-laugh-beam me-1"></i>
            <span>{{goodsCount}}</span>
        </div>
        <div
            v-bind:class="[{'sub-color': isBadedBy}, 'me-3 article-list-icon link-item']"
            v-on:click="clickBad">
            <i class="far fa-meh me-1"></i>
            <span>{{badsCount}}</span>
        </div>
        <a href="#comment-link" class="btn btn-sub">コメントを投稿</a>
    </div>
</template>

<script>
export default{
    name:"ArticleGoodBadComponent",
    props:{
        initialIsGoodedBy:{
            type: Boolean,
            default: false
        },
        initialGoodsCount: {
            type: Number,
            default: 0
        },
        goodEndpoint: {
            type: String
        },
        initialIsBadedBy:{
            type: Boolean,
            default: false
        },
        initialBadsCount: {
            type: Number,
            default: 0
        },
        badEndpoint: {
            type: String
        }
    },
    data(){
        return{
            isGoodedBy: this.initialIsGoodedBy,
            goodsCount: this.initialGoodsCount,
            isBadedBy: this.initialIsBadedBy,
            badsCount: this.initialBadsCount
        }
    },
    methods:{
        clickGood(){
            this.isGoodedBy ? this.ungood() : this.good();
        },
        async good(){
            const response = await axios.put(this.goodEndpoint);
            this.isGoodedBy = true;
            this.isBadedBy = false;
            this.goodsCount = response.data.goods_count;
            this.badsCount = response.data.bads_count;
        },
        async ungood(){
            const response = await axios.delete(this.goodEndpoint);
            this.isGoodedBy = false;
            this.goodsCount = response.data.goods_count;
        },
        clickBad(){
            this.isBadedBy ? this.unbad() : this.bad();
        },
        async bad(){
            const response = await axios.put(this.badEndpoint);
            this.isBadedBy = true;
            this.isGoodedBy = false;
            this.badsCount = response.data.bads_count;
            this.goodsCount = response.data.goods_count;
        },
        async unbad(){
            const response = await axios.delete(this.badEndpoint);
            this.isBadedBy = false;
            this.badsCount = response.data.bads_count;
        }
    }
}
</script>