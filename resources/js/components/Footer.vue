<template>
<div>
    <footer>
        <div class="footer-content">
            <div class="footer-title">ALEGOAL</div>
            <a href="/contact">お問い合わせ</a>
            <div class="footer-copyright">© 2020 ALEGOAL</div>
        </div>
    </footer>
</div>

</template>

<style>
    @media (min-width: 767px) {
        footer {
            margin-top: 64px;
            background-color: #191919;
            height: 174px;
            bottom: 0;
            color: #fff;
            padding: 30px 250px;
        }

        footer a {
            color: #fff !important;
            float: right;
            margin-top: 20px;
        }

        .footer-title {
            font-size: 30px;
            display: contents;
        }

        .footer-copyright {
            text-align: center;
            margin-top: 50px;
            font-size: 12px;
        }
    }
    @media (max-width: 479px) {

        footer {
            margin-top: 64px;
            background-color: #191919;
            height: 300px;
            bottom: 0;
            color: #fff;
            padding: 30px 50px;
        }

        footer a {
            color: #fff !important;
            margin-top: 20px;
        }

        .footer-title {
            font-size: 30px;
            margin-bottom: 40px;
        }

        .footer-copyright {
            text-align: center;
            margin-top: 110px;
            font-size: 12px;
        }
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
