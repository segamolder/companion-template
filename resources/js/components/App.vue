<template>
    <div>
        <div>
            <vs-navbar v-model="activeItem" class="nabarx">

                <div slot="title">
                    <router-link to="/">
                        <img src="/images/logo-black.svg" class="vs-navbar--title logo" alt="">
                    </router-link>
                </div>

                <vs-navbar-item index="0">
                    <a href="#">
                        <i class="fas fa-search header-search"></i>
                        Найти поездку
                    </a>
                </vs-navbar-item>
                <vs-navbar-item index="1">
                    <a href="#" class="directions_car">
                        <i class="fas fa-car-side header-car"></i>
                        Создать поездку
                    </a>
                </vs-navbar-item>
                <vs-navbar-item index="1">
                    <router-link :to="'/account/'+id">
                        <vs-avatar src="https://avatars2.githubusercontent.com/u/31676496?s=460&v=4"/>
                    </router-link>
                </vs-navbar-item>
            </vs-navbar>
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "app",
        data() {
            return {
                user_name: 'Sergey',
                id: 1,
                activeItem: 0
            }
        }
    }
</script>

<style scoped lang="scss">
    $car-icon-color: darkred;
    $trip-search-color: #3490dc;
    .logo {
        height: 7vh;
        padding: 1vh;
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
</style>
