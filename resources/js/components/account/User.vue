<template>
    <div class="user-block">
        <div class="user-block__first">
            <i class="fas fa-cog settings"></i>
            <vs-avatar class="profile" size="100px"
                       :src="user.photo"/>
            <div>
                <h3 class="pb-3">{{user.name}}
                    <a href="#">
                        <i class="fab fa-vk" style="color: #4a76a8"></i>
                    </a>
                </h3>


                <p class="pb-3">{{user.phone}}</p>

                <p>
                    <rating :value="user.rating"></rating>
                </p>
            </div>
            <div class="preferences">
                <span v-for="(preference_image, image_index) in user.preferences.images">
                    <img :src="preference_image.src" class="fas" :id="'pref-img-'+image_index">
                    <b-tooltip :target="'pref-img-'+image_index" :title="preference_image.title"
                               placement="top"></b-tooltip>
                </span>
                <span v-for="(preference_icon, icon_index) in user.preferences.icons">
                    <i :class="'fas '+preference_icon.src" :id="'pref-icon'+icon_index"></i>
                    <b-tooltip :target="'pref-icon'+icon_index" :title="preference_icon.title"
                               placement="top"></b-tooltip>
                </span>
            </div>
        </div>
        <div class="user-block__second">
            <statistic userStat="true"></statistic>
        </div>
        <div class="user-block__third">
            <trip></trip>
        </div>
        <div class="user-block__fourth">
            <comment :userId="id"></comment>
        </div>
    </div>
</template>

<script>
    import rating from '../plugins/RatingComponent'
    import statistic from './components/AccountStatistic'
    import trip from './components/AccountTrip'
    import comment from './components/AccountComment'

    export default {
        name: "user",
        props: ['id'],
        components: {
            rating,
            statistic,
            trip,
            comment
        },
        data() {
            return {
                user: {
                    name: 'Сергей Иванов',
                    photo: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                    phone: '+7 (999) 999-99-99',
                    rating: "3",
                    preferences: {
                        images: [
                            {
                                src: '/icons/animals_ban.svg',
                                title: 'Без животных'
                            }
                        ],
                        icons: [
                            {
                                src: 'fa-smoking-ban',
                                title: 'Против курения'
                            },
                            {
                                src: 'fa-user-friends',
                                title: 'Люблю поболтать'
                            }
                        ]
                    }
                }
            }
        },
        methods: {
            getData() {
                this.$vs.loading();
                //Заглушка под получение данных
                setTimeout(() => {
                    this.$vs.loading.close();
                }, 2000);
            }
        },
        created() {
            this.getData();
        },
        mounted() {
            $('.stat_count').mouseenter(function () {
                $(this).css("border", "4px solid mediumpurple").animate({
                    'borderWidth': '1px',
                }, 300);
            }).mouseleave(function () {
                $(this).animate({
                    'borderWidth': '4px',
                }, 300);
            });
        }
    }
</script>

<style scoped lang="scss">
    .user-block {
        box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, 1);
        display: flex;
        width: 100%;
        height: 52vh;
        &__first {
            width: 25%;
            padding: 5%;
            display: flex;
            flex-direction: column;
            align-items: center;

            .settings {
                position: absolute;
                bottom: 0;
                left: 0;
                margin: 10px;
                color: #bbb;
            }

            .profile {
                margin: 0;
            }

            .preferences {
                position: absolute;
                bottom: 0;
                display: flex;
                width: 20%;
                justify-content: space-evenly;
                margin-bottom: 10px;
                .fas {
                    font-size: 1.9rem;
                    height: 31px;
                }
            }
        }

        &__second {
            width: 25%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, 1);

        }

        &__third {
            width: 25%;
        }

        &__fourth {
            width: 25%;
            box-shadow: inset 0px 0px 10px 0px rgba(0, 0, 0, 1);
        }
    }

    @media screen and (max-width: 800px) {
        .pb-3 {
            padding-bottom: 3%
        }

        .user-block {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 60vh;
            box-shadow: none;

            &__first {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-evenly;
                box-shadow: none;

                .settings {
                    position: relative;
                    align-self: baseline;
                    color: #bbb;
                }

                .preferences {
                    position: relative;
                    display: flex;
                    flex-direction: row;
                    align-self: auto;
                    width: 100%;
                    padding: 5%;

                    .fas {
                        padding-bottom: 10px;
                        font-size: 1.4rem;
                        height: 31px;
                    }
                }
            }

            &__second {
                width: 100%;
                box-shadow: none;
            }

            &__third {
                width: 100%;
                box-shadow: none;
            }

            &__fourth {
                width: 100%;
                box-shadow: none;
            }
        }
    }

    h3 {
        font-family: 'Montserrat', sans-serif;
    }

    p {
        font-family: 'Montserrat', sans-serif;
    }

    .pb-3 {
        padding-bottom: 5%;
        padding-top: 5%;
    }

    .green {
        color: darkgreen;
    }

    .red {
        color: darkred;
    }

    .tooltip {
        width: 120px;
        background-color: #fff;
        color: black;
        text-align: center;
        padding: 5px 0;
        border-radius: 6px;
        border: 1px solid black;
    }
</style>
