<template>
    <div>
        <div v-if="!hasTrip" class="noTrips">
            <img class="noTrips__carImage" src="/icons/car.svg" alt="">
            <p>Поездок не найдено</p>
        </div>
        <div v-if="hasTrip" class="trip-list-container">
            <h3>Последние поездки</h3>
            <vs-card v-for="(item,index) in data" :key="index">
                <div>
                    <vs-list>
                        <vs-list-item title="Откуда" :subtitle="item.from"></vs-list-item>
                        <vs-list-item title="Куда" :subtitle="item.to"></vs-list-item>
                    </vs-list>
                </div>
            </vs-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LastTripsList",
        data() {
            return {
                data: [
                    {
                        from: 'Россия, Ханты-Мансийский автономный округ, Нижневартовск',
                        to: 'Россия, Москва, Ленинский проспект'
                    },
                    {
                        from: 'Россия, Санкт-Петербург',
                        to: 'Россия, Московская область, Наро-Фоминск'
                    },
                    {
                        from: 'Россия, Свердловская область, Екатеринбург',
                        to: 'Россия, Москва, Замоскворецкая линия, метро Речной вокзал '
                    },
                    {
                        from: 'Россия, Владимирская область, Гусь-Хрустальный',
                        to: 'Россия, Республика Марий Эл, Йошкар-Ола'
                    },
                    {
                        from: 'Россия, Москва, Таганско-Краснопресненская линия, метро Улица 1905 года',
                        to: 'Россия, Московская область, Подольск'
                    },
                ],
                hasTrip: true
            }
        }
    }
</script>

<style scoped lang="scss">
    ::-webkit-scrollbar {
        width: 5px;
        height: 5px;
        display: block;
    }

    ::-webkit-scrollbar-thumb {
        background: #e4eaf5;
        border-radius: 5px;
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

    .trip-list-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        height: 52vh;
        overflow-x: hidden;
        overflow: auto;

        h3 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .con-vs-card {
            width: 90%;
            margin-bottom: 10px;
        }
    }
</style>
