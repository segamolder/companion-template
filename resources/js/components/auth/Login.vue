<template>
    <div class="login-container">
        <div class="login-container__content">
            <h1 class="login-container__content__header">Войти</h1>
            <vs-input class="login-container__content__input" type="email" label="Email" placeholder="Ваш e-mail" v-model="user.email"/>
            <vs-input class="login-container__content__input" type="password" label="Пароль" placeholder="Ваш пароль" v-model="user.password"/>
            <vs-button @click="login" class="login-container__content__button vs-con-loading__container" id="login" color="primary" type="filled">Войти</vs-button>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Login",
        data() {
            return {
                user: {
                    email: '',
                    password: ''
                }
            }
        },
        methods: {
            login() {
                this.$vs.loading({
                    background: 'primary',
                    color: '#fff',
                    container: '#login',
                    scale: 0.45
                });

                let data = {
                    email: this.user.email,
                    password: this.user.password
                };
                axios.post('/api/login', data)
                    .then(({data}) => {
                        auth.login(data.token, data.user);
                        this.$vs.loading.close('#login > .con-vs-loading');
                        this.$router.push('/');
                        this.$vs.notify({title:'Успешно!',text:'Выполнен вход',color:'success'})
                    })
                    .catch(({response}) => {
                        console.log(response.data.message);
                    });
            }
        }
    }
</script>

<style scoped lang="scss">
    .login-container {
        height: 95vh;
        background-position: center;
        background-size: contain;
        height: 95vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Montserrat', sans-serif;
        background-image: url("/images/background.jpg");
        &__content {
            background-color: #eee;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 25px;
            background: rgba(255,255,255,0.9);

            &__header {
                align-self: flex-start;
                padding: 10px 0;
            }

            &__input {
                padding: 10px 0;
            }

            &__button {
                align-self: flex-end;
                margin: 10px 0;
            }
         }
    }
</style>
