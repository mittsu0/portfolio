<template>
    <div class="my-3 d-flex align-items-center gap-3">
        <img class="article-image" v-if="url" :src="url">
        <img class="article-image" v-else src="../../../public/images/no_image.png">
        <div>
            <label class="btn-grey link-item">
                <input type="file" name="image" id="image" accept="image/*" ref="preview" v-on:change="show">画像を選択
            </label>
        </div>
    </div>
</template>

<script>
export default{
    name:"ImagePreviewComponent",
    data(){
        return{
            url: null
        }
    },
    methods:{
        show(){
            const file = this.$refs.preview.files[0];
            this.url = URL.createObjectURL(file)
        }
    }
}
</script>