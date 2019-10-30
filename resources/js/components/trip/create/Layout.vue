<template>
    <div class="trip-create-container">
        <span class="bg_img" :style="'background-image: url('+backgroundImage+')' "></span>
        <div id="map"
             style="width:40vw;height:85vh; display:flex; justify-content: center; align-items: center; padding: 15px;"></div>
        <div class="trip-right-side">
            <div class="trip-create">
                <div class="trip-create-inputs">
                    <vs-row class="trip-create-inputs__row">
                        <vs-col vs-w="6" class="trip-create-inputs__first">
                            <p v-if="tripRoutes.from.address != null"><b>Откуда:</b> {{tripRoutes.from.address}}</p>
                            <p v-else><b>Откуда:</b>
                                <vs-button type="line" @click='focusInput(".ymaps-2-1-74-route-panel-input__input", 0)'>
                                    Укажите на карте
                                </vs-button>
                            </p>
                            <p v-if="tripRoutes.to.address != null"><b>Куда:</b> {{tripRoutes.to.address}}</p>
                            <p v-else><b>Куда:</b>
                                <vs-button type="line" @click='focusInput(".ymaps-2-1-74-route-panel-input__input", 1)'>
                                    Укажите на карте
                                </vs-button>
                            </p>
                            <vs-input data-toggle="datepicker" label-placeholder="Когда" class="trip-create-input" v-model="trip.dateTime"/>
                            <vs-input label-placeholder="Цена" class="trip-create-input" v-model="trip.price"/>
                        </vs-col>
                        <vs-col vs-w="6" class="trip-create-inputs__second">
                            <vs-input-number label="Количество мест:" style="background: none"
                                             v-model="trip.free_places"/>
                            <vs-checkbox class="trip-create-inputs__checkbox" v-model="trip.checkbox">Не больше двух человек на заднем сиденье</vs-checkbox>
                            <vs-button color="primary" type="filled">Создать</vs-button>
                        </vs-col>
                    </vs-row>
                </div>
            </div>
            <div class="trip-result">
                <vs-row class="hasTrip__row">
                    <vs-col vs-w="6" class="hasTrip__container">
                        <vs-card class="hasTrip__card">
                            <div slot="header">
                                <h3>
                                    Текущая поездка
                                </h3>
                            </div>
                            <div class="hasTrip__tripInfo">
                                <vs-list>
                                    <vs-list-item v-if="tripRoutes.from.address !== null" title="Откуда"
                                                  :subtitle="tripRoutes.from.address"></vs-list-item>
                                    <vs-list-item v-else title="Откуда" subtitle="-"></vs-list-item>
                                    <vs-list-item v-if="tripRoutes.from.address !== null" title="Куда"
                                                  :subtitle="tripRoutes.to.address"></vs-list-item>
                                    <vs-list-item v-else title="Куда" subtitle="-"></vs-list-item>
                                    <vs-list-item title="Когда" :subtitle="trip.dateTime"></vs-list-item>
                                    <vs-list-item title="Количество свободных мест"
                                                  :subtitle="trip.free_places.toString()"></vs-list-item>
                                    <vs-list-item title="Цена за место"
                                                  :subtitle="trip.price.toString()"></vs-list-item>
                                </vs-list>
                            </div>
                            <div slot="footer" class="card-footer">

                            </div>
                        </vs-card>
                    </vs-col>
                </vs-row>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Layout",
        data() {
            return {
                backgroundImage: '/images/trip/background.jpg',
                myMap: null,
                tripRoutes: {
                    from: {
                        address: null
                    },
                    to: {
                        address: null
                    },
                    duration: null,
                    distance: null,
                    durationValue: null,
                    distanceValue: null
                },
                trip: {
                    price: '',
                    dateTime: '',
                    free_places: 1,
                    checkbox: false
                }
            }
        },
        methods: {
            getRoutes() {
                //Получаем данные с панели
                let control = this.myMap.controls.get('routeButtonControl');
                //Получаем данные марщрута
                let multiRoutePromise = control.routePanel.getRoute().model.properties._data.waypoints;
                //Записываем данные маршрута
                this.tripRoutes.from = multiRoutePromise[0];
                this.tripRoutes.to = multiRoutePromise[1];
                this.tripRoutes.distance = control.routePanel.getRoute().getActiveRoute().properties.get("distance").text;
                this.tripRoutes.distanceValue = control.routePanel.getRoute().getActiveRoute().properties.get("distance").value;
                this.tripRoutes.duration = control.routePanel.getRoute().getActiveRoute().properties.get("duration").text;
                this.tripRoutes.durationValue = control.routePanel.getRoute().getActiveRoute().properties.get("duration").value;
            },
            getUpdatedRoutes() {
                // Получение ссылки на панель.
                let control = self.myMap.controls.get('routeButtonControl');
                // Получение мультимаршрута.
                let multiRoutePromise = control.routePanel.getRouteAsync();
                multiRoutePromise.then(function (multiRoute) {
                    // Подписка на событие обновления мультимаршрута.
                    multiRoute.model.events.add('requestsuccess', function () {
                        // Получение ссылки на активный маршрут.
                        var activeRoute = multiRoute.getActiveRoute();
                        // Когда панель добавляется на карту, она
                        // создает маршрут с изначально пустой геометрией.
                        // Только когда пользователь выберет начальную и конечную точки,
                        // маршрут будет перестроен с непустой геометрией.
                        // Поэтому для избежания ошибки нужно добавить проверку,
                        // что маршрут не пустой.
                        if (activeRoute) {
                            self.getRoutes();
                        }
                    });
                }, function (err) {
                    console.log(err);
                });
            },
            focusInput(classToFocus, item = -1) {
                //TODO убрать
                $('.ymaps-2-1-74-float-button-text')[1].click();
                if (item === -1) {
                    $(classToFocus).focus();
                } else {
                    $(classToFocus)[item].focus();
                }
            },
        },
        created() {
            self = this;
            ymaps.ready(function () {
                self.myMap = new ymaps.Map('map', {
                    center: [55.75, 37.57],
                    zoom: 9,
                    controls: ['geolocationControl', 'routeButtonControl', 'zoomControl']
                });
                self.getUpdatedRoutes();
            });
        },
        updated() {
            this.getUpdatedRoutes();
        },
        mounted() {
            $('[data-toggle="datepicker"]').datepicker({
                language: 'ru-RU'
            });
        }
    }
</script>

<style scoped lang="scss">
    .bg_img {
        position: absolute;
        height: 100%;
        width: 100%;
        -webkit-filter: grayscale(70%);
        background-position: center;
        background-size: cover;
        z-index: -1;
    }

    .trip-create-container {
        display: flex;
        font-family: 'Montserrat', sans-serif;

        .trip-right-side {
            width: 60vw;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
    }

    #map {

    }

    .trip-create {
        height: 50%;
        width: 100%;
        padding: 15px;
    }

    .trip-result {
        height: 50%;
        width: 100%;
    }

    .trip-create-inputs {
        &__row {
            height: 40vh;
        }

        &__first {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;

            .trip-create-input {
                width: 90%;
            }
        }

        &__second {
            margin-left: 0%;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }
    }

    .hasTrip {
        &__row {
            justify-content: flex-end;
            display: flex;
            width: 100%;
            padding: 15px;
        }
    }

    @media screen and (max-width: 800px) {
        #map {
            width: 100% !important;
        }

        .trip-create-container {
            flex-direction: column;
            overflow-y: scroll;
            height: 100vh;

            .trip-right-side {
                width: 100%;
                flex-direction: column;
                height: 33vh;

                .trip-create {
                    height: auto;
                    .trip-create-inputs {
                        height: 100%;
                        width: 100%;
                        &__row {
                            display: flex;
                            width: 100%;
                        }
                        &__first {
                            margin-left: 0;
                            width: 50%;
                        }

                        &_second {
                            margin-left: 0;
                            width: 50%;
                        }
                    }
                }
            }
        }

        .trip-create-inputs {
            &__checkbox {
                display: flex;
                flex-direction: column;
                text-align: center;
            }
        }

        .trip-result {
            height: 100%;
            width: 90vw;

            .hasTrip {
                &__row {
                    display: flex;
                    width: 100%;
                    height: 100%;
                    justify-content: normal;
                }

                &__container {
                    margin-left: 0%;
                    width: 50%;
                    height: 100%;
                }

                &__card {
                    width: 90vw;
                }
            }
        }
    }
</style>
