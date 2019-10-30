<template>
    <div class="car-block">
        <div class="car-block__first">
            <!--<vs-avatar class="profile" size="100px"-->
                       <!--:src="car.photo"/>-->
            <img :src="car.photo" class="profile" alt="">
            <div>
                <h3 class="pb-3">{{car.name}}</h3>
                <p>
                    <rating :value="car.rating"></rating>
                </p>
            </div>
        </div>
        <div class="car-block__second">
            <statistic carStat="true"></statistic>
        </div>
        <div class="car-block__third">
            <trip></trip>
        </div>
        <div class="car-block__fourth">
            <comment :carId="id"></comment>
        </div>
    </div>
</template>

<script>
    import rating from '../plugins/RatingComponent'
    import statistic from './components/AccountStatistic'
    import trip from './components/LastTripsList'
    import comment from './components/AccountComment'

    export default {
        name: "car",
        props: ['id'],
        components: {
            rating,
            statistic,
            trip,
            comment
        },
        data() {
            return {
                car: {
                    name: 'Lada Vesta',
                    photo: 'https://s.auto.drom.ru/i24223/c/photos/fullsize/lada/vesta_sport/lada_vesta_sport_825755.jpg',
                    rating: "3",
                }
            }
        },
        methods: {
            getData() {
                this.$vs.loading();
                //Заглушка под получение данных
                setTimeout( ()=> {
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

    .car-block {
        box-shadow: inset 0px 0px 10px 0px rgba(0,0,0,1);
        display: flex;
        width: 100%;
        height: 52vh;

        &__first {
            width: 25%;
            padding: 5%;
            display: flex;
            flex-direction: column;
            align-items: center;

            .profile {
                margin: 0;
                height: 100px;
                width: 100px;
                object-fit: cover;
                border-radius: 100%;
                object-position: center;
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
            box-shadow: inset 0px 0px 10px 0px rgba(0,0,0,1);

        }

        &__third {
            width: 25%;
        }

        &__fourth {
            width: 25%;
            box-shadow: inset 0px 0px 10px 0px rgba(0,0,0,1);
        }
    }

    @media screen and (max-width: 800px) {
        .pb-3 {
            padding-bottom: 3%
        }

        .car-block {
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
        text-align: center;
    }

    p {
        font-family: 'Montserrat', sans-serif;
    }

    .pb-3 {
        padding-bottom: 5%;
        padding-top: 10%;
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
