<template>
    <div class="trip-search-container">
        <vs-collapse>
            <vs-collapse-item icon-arrow="search" class="search">
                <div slot="header">
                    Поиск
                </div>
                <div class="search-container">
                    <vs-input label="Откуда" v-model="search.from"/>
                    <vs-input label="Куда" v-model="search.to"/>
                    <vs-input data-toggle="datepicker" label="Когда" v-model="search.date"/>
                    <div class="price-container">
                        <vs-input label="Сумма" v-model="search.price[0]" class="price-container__from"
                                  placeholder="От"/>
                        <vs-slider text-fixed=Р max=5000 step=50 v-model="search.price" class="price-picker"/>
                        <vs-input v-model="search.price[1]" class="price-container__to" placeholder="До"/>
                    </div>
                </div>
            </vs-collapse-item>
        </vs-collapse>
        <div class="trip_cards">
            <vs-card class="trip-card" v-for="(data, index) in trip_data" :key="index">
                <div slot="header">
                </div>
                <div class="trip-content">
                    <div class="trip">
                        <div class="trip__address">{{data.from}} - {{data.to}}</div>
                        <div class="trip__price">Стоимость: {{data.price}} <i class="fas fa-ruble-sign"></i></div>
                        <div class="trip__dateTime">Когда: {{data.dateTime}}</div>
                        <div class="trip__free-places">Количество мест: {{data.free_places}}</div>
                        <vs-chip v-if="data.noMoreThanTwoPeople" color="success" class="trip__alert">
                            Не больше двух человек на заднем ряду
                        </vs-chip>
                    </div>
                    <div class="trip-content__photos">
                        <vs-avatar :src="data.user_img" class="trip-content__photos__user" size="large"/>
                        <div data-v-1d025b32="" class="con-vs-avatar trip-content__photos__car large"
                             style="background: rgb(195, 195, 195);">
                            <div class="con-img vs-avatar--con-img"><img :src="data.car_img" alt=""></div>
                        </div>
                    </div>
                </div>
                <div slot="footer" class="trip-card__footer">
                    <div class="preferences">
                        <span v-for="(preference_image, image_index) in data.preferences.images">
                            <img :src="preference_image.src" class="fas" :id="'pref-img-'+image_index+index">
                            <b-tooltip :target="'pref-img-'+image_index+index" :title="preference_image.title"
                                       placement="top"></b-tooltip>
                        </span>
                        <span v-for="(preference_icon, icon_index) in data.preferences.icons">
                            <i :class="'fas '+preference_icon.src" :id="'pref-icon'+icon_index+index"></i>
                            <b-tooltip :target="'pref-icon'+icon_index+index" :title="preference_icon.title"
                                       placement="top"></b-tooltip>
                        </span>
                    </div>
                    <vs-button v-if="data.canReserve" color="primary" type="filled" class="reserve-button">Забронировать</vs-button>
                </div>
            </vs-card>
        </div>
        <vs-pagination class="trip-pagination" :total="10" v-model="current_page" prev-icon="arrow_back"
                       next-icon="arrow_forward"></vs-pagination>
        <div class="mobile-pagination">
            <vs-button @click="current_page--">Назад</vs-button>
            <vs-button @click="current_page++">Вперед</vs-button>
        </div>
    </div>
</template>

<script>
    import '@chenfengyuan/datepicker/i18n/datepicker.ru-RU'

    export default {
        name: "Layout",
        data() {
            return {
                current_page: 2,
                search: {
                    from: '',
                    to: '',
                    date: '',
                    price: [100, 5000]
                },
                trip_data: [
                    {
                        user_img: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                        car_img: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект',
                        price: 550,
                        dateTime: '26 октября 2019 г., 13:54',
                        free_places: 2,
                        noMoreThanTwoPeople: true,
                        canReserve: true,
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
                    },
                    {
                        user_img: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                        car_img: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект',
                        price: 550,
                        free_places: 2,
                        dateTime: '26 октября 2019 г., 13:54',
                        noMoreThanTwoPeople: true,
                        canReserve: true,
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
                    },
                    {
                        user_img: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                        car_img: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект',
                        price: 550,
                        free_places: 2,
                        dateTime: '26 октября 2019 г., 13:54',
                        noMoreThanTwoPeople: false,
                        canReserve: true,
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
                    },
                    {
                        user_img: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                        car_img: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект',
                        price: 550,
                        free_places: 2,
                        dateTime: '26 октября 2019 г., 13:54',
                        noMoreThanTwoPeople: true,
                        canReserve: false,
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
                    },
                    {
                        user_img: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                        car_img: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект',
                        price: 550,
                        free_places: 2,
                        dateTime: '26 октября 2019 г., 13:54',
                        noMoreThanTwoPeople: true,
                        canReserve: false,
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
                    },
                    {
                        user_img: 'https://avatars2.githubusercontent.com/u/31676496?s=460&v=4',
                        car_img: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект',
                        price: 550,
                        free_places: 2,
                        dateTime: '26 октября 2019 г., 13:54',
                        noMoreThanTwoPeople: true,
                        canReserve: false,
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
                ]
            }
        },
        components: {},
        methods: {
            search() {

            },
            getData() {
                this.$vs.loading();
                //Заглушка под получение данных
                setTimeout(() => {
                    this.$vs.loading.close();
                }, 2000);
            },
            reserveTrip() {

            }
        },
        mounted() {
            this.getData();
            $('[data-toggle="datepicker"]').datepicker({
                language: 'ru-RU'
            });
        }
    }
</script>

<style scoped lang="scss">
    .reserve-button {
        margin: 5px;
    }

    .trip-search-container {
        overflow: auto;
        font-family: 'Montserrat', sans-serif;
        .search-container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }
    }

    .trip-pagination {
        width: 99%;
        margin-bottom: 30px;
        padding-right: 10px;
    }

    .price-container {
        display: flex;
        &__from {
            width: 5vw;
            margin-right: 15px;
        }

        .price-picker {
            align-self: flex-end;
            width: 20vw;
        }

        &__to {
            width: 5vw;
            margin-left: 15px;
        }
    }

    .trip-card {
        height: fit-content;
        //width: 30%;
        .trip-content {
            display: flex;
            justify-content: space-around;
            flex-direction: row-reverse;
            .trip {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                font-size: 0.8rem;
                align-items: center;
                margin-left: 10px;
                &__address {
                    font-size: 0.8rem;
                    text-align: center;
                    margin-bottom: 10px;
                }

                &__price {
                    margin-bottom: 5px;
                }

                &__free-places {
                    margin-bottom: 5px;
                }

                &__dateTime {
                    margin-bottom: 5px;
                }
                &__alert {

                }
            }

            &__photos {
                display: flex;
                flex-direction: column;

                img {
                    height: 100%;
                    object-fit: cover;
                    object-position: center;
                }
            }
        }

        &__footer {
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: -10%;
            .preferences {
                bottom: 0;
                display: flex;
                width: 20%;
                justify-content: space-evenly;
                margin-bottom: 10px;
                margin-left: 15px;
                span {
                    margin-right: 5px;
                }
                .fas {
                    font-size: 1.9rem;
                    height: 31px;
                }
            }
        }
    }
    .mobile-pagination {
        display: none;
    }

    .trip_cards {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        grid-gap: 1%;
        margin: 0 5%;
    }

    @media screen and (max-width: 800px) {
        .trip-pagination {
            display: none !important;
        }
        .mobile-pagination {
            display: flex;
            padding-bottom: 100px;
            justify-content: space-evenly;
        }
        .trip-search-container {
            overflow-y: auto;
            height: 100vh;
            .search-container {
                flex-direction: column;
                div {
                    margin-bottom: 10px;
                }
                .price-container {
                    flex-direction: column;
                    margin-bottom: 10px;
                    .price-picker {
                        padding-bottom: 10px;
                    }

                    &__from {
                        width: 200px;
                    }

                    &__to {
                        width: 200px;
                        margin-left: 0;
                    }
                }
            }
        }

        .trip_cards {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            .trip-card {
                width: 90%;
                &:last-child {
                    margin-bottom: 5vh;
                }

                .preferences {
                    margin-bottom: 0;
                    margin-left: 30px;
                }
            }
        }

        .trip {
            &__alert {
                text-align: center;
            }
        }

        .search {
            position: fixed;
            background-color: white;
            z-index: 11;
        }
    }

</style>
