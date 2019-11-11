<template>
    <div class="login-container">
        <div class="login-container__content">
            <h1 class="login-container__content__header">Зарегистрироваться</h1>
            <vs-input class="login-container__content__input" type="text" label="Имя"  placeholder="Ваше имя" v-model="user.name" :success="validateName" danger-text="Обязательное поле" :danger="!validateName" />
            <vs-input class="login-container__content__input" type="email" label="Email" placeholder="Ваш e-mail" v-model="user.email" :success="validateEmail" danger-text="Обязательное поле" :danger="!validateEmail" />
            <vs-input class="login-container__content__input" type="password" label="Пароль" placeholder="Ваш пароль" :success="validate" :danger="!validate" v-model="user.password"/>
            <vs-input class="login-container__content__input" type="password" label="Пароль" placeholder="Подтвердите пароль" :success="validate" success-text="Пароли совпадают" danger-text="Пароли не совпадают или пароль содержит меньше 8 символов" :danger="!validate" v-model="user.password_repeat"/>
            <vs-button @click="login" class="login-container__content__button vs-con-loading__container" id="login" color="primary" type="filled">Войти</vs-button>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "Register",
        data() {
            return {
                user: {
                    name: '',
                    email: '',
                    password: '',
                    password_repeat: ''
                }
            }
        },
        computed: {
            validate() {
                return this.user.password === this.user.password_repeat && this.user.password.length > 7 ? true : false;
            },
            validateName() {
                return this.user.name.length > 0 ? true : false;
            },
            validateEmail() {
                return this.user.email.length > 0 ? true : false;
            }
        },
        methods: {
            login() {
                if(this.validate && this.validateName && this.validateEmail) {
                    this.$vs.loading({
                        background: 'primary',
                        color: '#fff',
                        container: '#login',
                        scale: 0.45
                    });

                    let data = {
                        name: this.user.name,
                        email: this.user.email,
                        password: this.user.password
                    };
                    axios.post('/api/register', data)
                        .then(({data}) => {
                            this.$vs.loading.close('#login > .con-vs-loading');
                            this.$router.push('/login');
                            this.$vs.notify({title: 'Успешно!', text: 'Можете войти в аккаунт', color: 'success'})
                        })
                        .catch(({response}) => {
                            console.log(response.data.message);
                        });
                } else {
                    this.$vs.notify({title: 'Ошибка!', text: 'Поля не заполнены или заполнены не правильно', color: 'danger'})
                }
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
