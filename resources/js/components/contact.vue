<!--<template>-->
<!--<div>-->
<!--    <form v-if="!emailSent">-->
<!--        <div class="contact-form">-->
<!--            <h1 style="font-size: 30px; margin-bottom: 30px;">お問い合わせ</h1>-->

<!--            <div style="margin-bottom: 15px;">-->
<!--                <div style="float: left;">-->
<!--                    <label for="last-name">姓</label>-->
<!--                    <div>-->
<!--                        <input type="text" style="margin-right: 5px;" v-model="lastName">-->
<!--                    </div>-->
<!--                    <div class="error_txt" v-html="errors.lastName"></div>-->
<!--                </div>-->

<!--                <div>-->
<!--                    <label for="first-name">名</label>-->
<!--                    <div>-->
<!--                        <input type="text" v-model="firstName">-->
<!--                    </div>-->
<!--                    <div class="error_txt" v-html="errors.firstName"></div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div style="margin-bottom: 15px;">-->
<!--                <label for="address">メールアドレス</label>-->
<!--                <div>-->
<!--                    <input type="text" style="width: 300px;" v-model="mailAddress">-->
<!--                </div>-->
<!--                <div class="error_txt" v-html="errors.mailAddress"></div>-->
<!--            </div>-->

<!--            <div>-->
<!--                <label for="body">お問い合わせ内容</label>-->
<!--                <div>-->
<!--                    <textarea style="width: 600px; height: 200px;" v-model="body"></textarea>-->
<!--                </div>-->
<!--                <div class="error_txt" v-html="errors.body"></div>-->
<!--            </div>-->

<!--                <button class="button expanded btn btn-primary" type="submit" style="float: right; margin-top: 15px;" @click="onSubmit()">送信</button>-->
<!--&lt;!&ndash;            <input class="btn btn-primary" type="submit" value="送信" style="float: right; margin-top: 15px;" @click="onSubmit()">&ndash;&gt;-->

<!--        </div>-->
<!--    </form>-->

<!--    <div v-if="emailSent">メッセージが送信されました。ありがとうございました。</div>-->


<!--</div>-->

<!--</template>-->

<!--<style>-->

<!--    .contact-form {-->
<!--        width: 600px;-->
<!--        margin-top: 30px;-->
<!--        margin-left: auto;-->
<!--        margin-right: auto;-->
<!--    }-->

<!--</style>-->


<!--<script>-->

<!--    import axios from 'axios';-->

<!--    export default {-->
<!--        data(){-->
<!--            return {-->
<!--                firstName: '',-->
<!--                lastName: '',-->
<!--                mailAddress: '',-->
<!--                body: '',-->
<!--                errors: {},-->
<!--                emailSent: false-->
<!--            }-->
<!--        },-->
<!--        methods: {-->
<!--            onSubmit: function () {-->

<!--                // if(!confirm('送信します。よろしいですか？')) {-->
<!--                //-->
<!--                //     return;-->
<!--                //-->
<!--                // }-->

<!--                var params = {-->

<!--                    firstName: this.firstName,-->
<!--                    lastName: this.lastName,-->
<!--                    mailAddress: this.mailAddress,-->
<!--                    body: this.body-->

<!--                }-->

<!--                this.errors = {};-->

<!--                var axiosPost = axios.create({-->
<!--                    xsrfHeaderName: "X-CSRF-TOKEN",-->
<!--                    withCredentials: true-->
<!--                })-->

<!--                axiosPost.post('/api/contact', params).then((res) => {-->

<!--                    console.log(res)-->
<!--                    // this.emailSent = true-->

<!--                }).catch(function (error) {-->

<!--                    console.log(error)-->

<!--                    // var errors = {};-->
<!--                    //-->
<!--                    // for(var key in error.res.data.errors) {-->
<!--                    //-->
<!--                    //     errors[key] = error.res.data.errors[key].join('<br>');-->
<!--                    //-->
<!--                    // }-->
<!--                    //-->
<!--                    // self.errors = errors;-->

<!--                })-->
<!--            },-->
<!--        }-->
<!--    }-->
<!--</script>-->
