<template>
<div>
    <div class="blog-form-container">
        <div class="blog-title-form">
            <label for="blog-title">title</label>
            <input name="title" id="blog-title" type="text">
        </div>

        <div class="blog-text-form">
            <label for="blog-text">text</label>
            <textarea name="text" id="blog-text" cols="30" rows="10"></textarea>
        </div>

        <button class="button08">投稿</button>

    </div>
</div>

</template>

<style>
    @media (min-width: 767px) {

        .blog-form-container {
            width: 800px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
        }

        .blog-title-form input {
            width: 800px;
            border-radius: 0.25rem;
            margin-bottom: 30px;
        }

        .blog-text-form textarea {
            width: 800px;
            border-radius: 0.25rem;
            height: 800px;
            margin-bottom: 30px;
        }


        .button08 {
            background: #ebebeb;
            border-top: 4px solid #ddd;
            border-bottom: 4px solid #9fa6ab;
            border-right: 4px solid #9fa6ab;
            border-left: 4px solid #ddd;
            color: #333;
            /*padding: 15px 0;*/
            width: 130px;
            float: right;
        }

    }
    @media (max-width: 479px) {


    }

</style>

<script>

    export default {
        data(){
            return {

            }
        },
        methods: {

        },

    }
</script>
