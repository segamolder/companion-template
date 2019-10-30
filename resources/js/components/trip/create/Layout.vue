<template>
    <div class="trip-create-container">
        <div class="trip-create">
            <div id="map" style="width:100%;height:40vh"></div>
            <div class="trip-create-inputs">
                <vs-row class="trip-create-inputs__row">
                    <vs-col vs-w="6" class="trip-create-inputs__first">
                        <p v-if="tripRoutes.from.address != null">Откуда: {{tripRoutes.from.address}}</p>
                        <p v-else>Откуда: <vs-button type="line" @click='focusInput(".ymaps-2-1-74-route-panel-input__input", 0)'>Укажите на карте</vs-button></p>
                        <p v-if="tripRoutes.to.address != null">Куда: {{tripRoutes.to.address}}</p>
                        <p v-else>Куда: <vs-button type="line" @click='focusInput(".ymaps-2-1-74-route-panel-input__input", 1)'>Укажите на карте</vs-button></p>
                        <vs-input label-placeholder="Когда" class="trip-create-input" v-model="value1"/>
                        <vs-input label-placeholder="Цена" class="trip-create-input" v-model="value1"/>
                    </vs-col>
                    <vs-col vs-w="6" class="trip-create-inputs__second">
                        <vs-input-number v-model="number"/>
                        <vs-checkbox v-model="checkBox1">Не больше двух человек на заднем сиденье</vs-checkbox>
                    </vs-col>
                </vs-row>
            </div>
        </div>
        <div class="trip-result">

        </div>
    </div>
</template>

<script>
    export default {
        name: "Layout",
        data() {
            return {
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
        }
    }
</script>

<style scoped lang="scss">
    .trip-create {
        width: 65%;
        padding: 15px;
    }

    .trip-result {
        width: 35%;
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

        }
    }
</style>
