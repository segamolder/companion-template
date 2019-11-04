<template>
    <div class="app-container">
        <div>
            <vs-navbar v-model="activeItem" class="nabarx">
                <div slot="title">
                    <router-link to="/">
                        <img src="/images/logo-black.svg" class="vs-navbar--title logo" alt="">
                    </router-link>
                </div>

                <vs-navbar-item v-if="authenticated" style="margin-right: 15px" index="1">
                    <vs-avatar @click="active = !active"
                               :src="user.user_image"/>
                </vs-navbar-item>
                <vs-navbar-item v-if="!authenticated" style="margin-right: 15px" index="1">
                    <vs-button class="auth-button" to="/login" color="primary" type="flat">Войти</vs-button>
                    <vs-button class="auth-button" to="/register" color="primary" type="flat">Зарегистрироваться</vs-button>
                </vs-navbar-item>
            </vs-navbar>
        </div>
        <router-view></router-view>
        <!--Sidebar-->
        <vs-sidebar parent="body" default-index="0" color="primary" class="sidebarx" spacer v-model="active">

            <div class="header-sidebar" slot="header">
                <vs-avatar size="70px" :src="user.user_image"/>

                <h4>
                    {{user.name}} {{user.surname !== '' && user.surname !== null ? user.surname : ''}}
                </h4>

            </div>

            <vs-sidebar-item index="1" icon="person" :to="'/account/'+user.id">
                Профиль
            </vs-sidebar-item>

            <vs-sidebar-item index="2" icon="search" to="/trip/search">
                Найти поездку
            </vs-sidebar-item>

            <vs-sidebar-item index="3" icon="directions_car" to="/trip/create">
                Создать поездку
            </vs-sidebar-item>

            <vs-sidebar-item index="4" icon="card_travel" to="/trip/my-trips">
                Мои поедки
            </vs-sidebar-item>

            <div class="footer-sidebar" slot="footer">
                <vs-button @click="logout" icon="reply" color="danger" type="flat">Выйти</vs-button>
                <vs-button icon="settings" color="primary" type="border"
                           @click="$router.push('/settings/'+user.id+'/user');"></vs-button>
            </div>

        </vs-sidebar>

    </div>

</template>

<script>
    export default {
        name: "app",
        data() {
            return {
                user_name: 'Сергей Иванов',
                user_img: 'https://randomuser.me/api/portraits/men/85.jpg',
                id: 1,
                activeItem: 0,
                active: false,

                authenticated: auth.check(),
                user: auth.user
            }
        },
        methods: {
            logout() {
                this.$vs.loading();
                auth.logout();

                Event.$on('userLoggedOut', () => {
                    this.authenticated = false;
                    this.active = false;
                    this.$vs.loading.close();
                    this.$router.push('/');
                    this.$vs.notify({title:'Успешно!',text:'Выполнен выход из аккаунта',color:'success'})
                })
            }
        },
        mounted() {
            Event.$on('userLoggedIn', () => {
                this.authenticated = true;
                this.user = auth.user;
            });
        },
    }
</script>

<style scoped lang="scss">
    $car-icon-color: darkred;
    $trip-search-color: #3490dc;

    .auth-button {
        font-family: "Neucha", cursive;
    }

    .logo {
        height: 7vh;
        padding: 1vh 3vw;

        &:hover {
            cursor: pointer;
        }
    }

    .header-search {
        color: $trip-search-color;
    }

    .header-car {
        color: $car-icon-color;
    }

    .header-sidebar {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
    }

    .header-sidebar h4 {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .header-sidebar h4 > button {
        margin-left: 10px;
    }

    .footer-sidebar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    .footer-sidebar > button {
        border: 0px solid rgba(0, 0, 0, 0) !important;
        border-left: 1px solid rgba(0, 0, 0, 0.07) !important;
        border-radius: 0px !important;
    }
</style>
