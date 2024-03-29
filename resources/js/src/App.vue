<template>
    <h1>Привет, {{ post.username }}! </h1>
    <p>Заполни, пожалуйста, форму</p>

    <form action="/form/save" method="post" onsubmit="return false;">
        <label for="">Имя</label>
        <input type="text" name="username" v-model='post.username'>

        <label for="">Телефон</label>
        <input type="tel" name="phone" v-model='post.phone'>

        <label for="">Сообщение</label>
        <textarea name="" id="" cols="30" rows="10" v-model='post.message'></textarea>
        <br>
        <br>

        <button v-on:click="saveForm">Сохранить</button>
    </form>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import axios from 'axios'
export default defineComponent({
    components: {},
    data: function () {
        return {
            post: {
                username: 'Николай',
                phone: '',
                message: ''
            }
        };
    },
    methods: {
        saveForm: function () {
            axios
                .post('/form/save', this.post)
                .then(response => (this.info = response));
            return false;
        },
    },
});
</script>


<style lang="scss"  scoped>
    form {
        label {
            display: block;
            width: 100%;
        }
        input {
            margin-bottom: 10px;
        }
    }
</style>
