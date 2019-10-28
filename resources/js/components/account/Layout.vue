<template>
    <div class="account">
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="flex-end" vs-w="12" class="main-image">
                <vs-tabs alignment="right" :color="colorx" v-model="activeChild" class="tabs">
                    <vs-tab label="Автомобиль" icon="directions_car"
                            @click="$router.push('/account/'+id+'/car'); colorx = '#551A8B'">
                    </vs-tab>
                    <vs-tab label="Профиль" icon="account_circle"
                            @click="$router.push('/account/'+id+'/user'); colorx = '#FFFFFF'">
                    </vs-tab>
                </vs-tabs>
            </vs-col>
        </vs-row>
        <vs-row class="account-container">
            <router-view></router-view>
        </vs-row>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        name: "layout",
        data: () => ({
            colorx: '#FFFFFF',
            activeChild: 1
        }),
        method: {},
        created() {

        }
    }
</script>

<style scoped lang="scss">
    .account {
        font-family: 'Montserrat', sans-serif;

        .main-image {
            height: 40vh;
            background-image: url("/images/profile/background.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;

            .tabs {
                margin-right: 5%;
            }
        }
    }

    @media screen and (max-width: 800px) {
        .account {
            overflow: auto;
        }
    }
</style>
