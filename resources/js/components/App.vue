<template>
    <div>
        <div>
            <vs-navbar v-model="activeItem" class="nabarx">

                <div slot="title">
                    <router-link to="/">
                        <img src="/images/logo-black.svg" class="vs-navbar--title logo" alt="">
                    </router-link>
                </div>

                <vs-navbar-item style="margin-right: 15px" index="1">
                    <vs-avatar @click="active = !active"
                               :src="user_img"/>
                </vs-navbar-item>
            </vs-navbar>
        </div>
        <router-view></router-view>
        <!--Sidebar-->
        <vs-sidebar parent="body" default-index="0" color="primary" class="sidebarx" spacer v-model="active">

            <div class="header-sidebar" slot="header">
                <vs-avatar size="70px" :src="user_img"/>

                <h4>
                    {{user_name}}
                </h4>

            </div>

            <vs-sidebar-item index="1" icon="person">
                <router-link :to="'/account/'+id">
                    Профиль
                </router-link>
            </vs-sidebar-item>

            <vs-sidebar-item index="2" icon="search">
                <router-link to="/trip/search">
                    Найти поездку
                </router-link>
            </vs-sidebar-item>

            <vs-sidebar-item index="3" icon="directions_car">
                <router-link to="/trip/create">
                    Создать поездку
                </router-link>
            </vs-sidebar-item>

            <div class="footer-sidebar" slot="footer">
                <vs-button icon="reply" color="danger" type="flat">Выйти</vs-button>
                <vs-button icon="settings" color="primary" type="border" @click="$router.push('/settings/'+id+'/user');"></vs-button>
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
            }
        }
    }
</script>

<style scoped lang="scss">
    $car-icon-color: darkred;
    $trip-search-color: #3490dc;
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
