<template>
    <div id="account-trip-content" class="vs-con-loading__container">
        <div v-if="hasTrip" class="noTrips">
            <img class="noTrips__carImage" src="/icons/car.svg" alt="">
            <p>Поездок не найдено</p>
        </div>
        <div v-if="!hasTrip" class="hasTrip">
            <vs-row vs-justify="center" fixed-height="true" class="hasTrip__row">
                <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6" class="hasTrip__container">
                    <vs-card class="hasTrip__card">
                        <div slot="header">
                            <h3>
                                Текущая поездка
                            </h3>
                        </div>
                        <div class="hasTrip__tripInfo">
                            <vs-list>
                                <vs-list-item title="Откуда" :subtitle="trip.whereFrom"></vs-list-item>
                                <vs-list-item title="Куда" :subtitle="trip.whereTo"></vs-list-item>
                                <vs-list-item title="Когда" :subtitle="trip.dateTime"></vs-list-item>
                                <vs-list-item title="Количество свободных мест"
                                              :subtitle="trip.freePlaces.toString()"></vs-list-item>
                                <vs-list-item title="Цена за место" :subtitle="trip.cost.toString()"></vs-list-item>
                            </vs-list>
                        </div>
                        <div slot="footer" class="card-footer">
                            <vs-row vs-justify="flex-end">
                                <vs-button @click="showModal = true" color="rgb(230,230,230)"
                                           color-text="rgb(50,50,50)" icon="settings"
                                           style="padding: 0"></vs-button>
                            </vs-row>
                        </div>
                    </vs-card>
                </vs-col>
            </vs-row>
        </div>
        <trip-modal @getChildData="getChildData" v-if="showModal" @close="showModal = false"
                    :freePlaces="trip.freePlaces" :cost="trip.cost" :whereFrom="trip.whereFrom"
                    :whereTo="trip.whereTo" :dateTime="trip.dateTime"></trip-modal>
    </div>
</template>

<script>
    import tripModal from '../components/TripEditModal';

    export default {
        name: "AccountTrip",
        components: {
            tripModal
        },
        data() {
            return {
                trip: {
                    whereFrom: 'Россия, Чувашская Республика, Чебоксары',
                    whereTo: 'Россия, Московская область, Подольск',
                    dateTime: '26 октября 2019 г., 13:54',
                    freePlaces: 3,
                    cost: 567
                },
                hasTrip: false,
                showModal: false,
            }
        },
        methods: {
            getChildData(data) {
                this.trip.whereFrom = data.whereFrom;
                this.trip.whereTo = data.whereTo;
                this.trip.dateTime = data.dateTime;
                this.trip.freePlaces = data.freePlaces;
                this.trip.cost = data.cost;
                this.showModal = false;
                //Выводим сообщение об успешном сохранении
                this.$vs.notify({
                    title: 'Уведомление!',
                    text: 'Успешно сохранено',
                    color: 'success'
                });
            },
            getData() {
                this.$vs.loading({
                    container: '#account-trip-content',
                    scale: 0.6
                })
                //Заглушка под получение данных
                setTimeout( ()=> {
                    this.$vs.loading.close('#account-trip-content > .con-vs-loading')
                }, 3000);
            }
        },
        mounted() {
            this.getData();
        }
    }
</script>

<style scoped lang="scss">
    #account-trip-content {
        height: 100%;
    }

    .noTrips {
        height: inherit;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        &__carImage {
            height: auto;
            width: 50%;
            opacity: 0.5;
        }
        p {
            text-shadow: 1px 1px 0px #bbb;
        }
    }

    .hasTrip {
        height: 100%;
        &__row {
            height: 100%;
            padding: 5%;
        }
        &__container {
            height: 100%;
            width: 90% !important;
        }
        &__card {
            height: 90%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        &__tripInfo {
            font-size: 1rem;
            font-family: 'Rubik', sans-serif;
        }

        .card-footer {
            margin-top: -7% !important;
        }
    }

    .vs-card--content {
        height: inherit !important;
    }


</style>
