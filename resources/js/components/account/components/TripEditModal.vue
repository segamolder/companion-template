<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            Редактирование текущей поездки
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            <vs-input @blur="updateTripModel('suggestWhereFrom')" v-model="trip.from" label="Откуда" class="inputx" id="suggestWhereFrom"
                                      @focus="getSuggestion('suggestWhereFrom')"/>
                            <vs-input @blur="updateTripModel('suggestWhereTo')" v-model="trip.to" label="Куда" type="text" class="inputx" id="suggestWhereTo"
                                      @focus="getSuggestion('suggestWhereTo')"/>
                            <vs-input label="Когда" v-model="trip.date" type="text" class="inputx" id="date"/>
                            <vs-input label="Во сколько" v-model="trip.time" type="text" class="inputx" id="time"/>
                            <vs-input-number v-model="trip.freePlaces" label="Количество свободных мест:"
                                             class="toLeft"/>
                            <vs-input-number v-model="trip.cost" label="Стоимость за место" :step="50" class="toLeft"/>
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            <vs-alert :active.sync="alert.active" closable close-icon="close" :title="alert.title"
                                      color="danger">
                                {{alert.text}}
                            </vs-alert>
                            <vs-button class="modal-default-button ml" @click="$emit('close')" color="primary" type="border" icon="close">Закрыть</vs-button>
                            <vs-button class="modal-default-button" @click="save" color="success" type="border" icon="save">Сохранить</vs-button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import Inputmask from 'inputmask';
    import moment from 'moment';

    export default {
        name: "TripEditModal",
        data() {
            return {
                yaMap: null,
                trip: {
                    from: '',
                    to: '',
                    date: '',
                    time: '',
                    freePlaces: '',
                    cost: ''
                },
                regexp: {
                    date: /[0-9]{2}[-]{1}[0-9]{2}[-]{1}[0-9]{4}/gm,
                    time: /[0-9]{2}[:]{1}[0-9]{2}/gm
                },
                alert: {
                    active: false,
                    title: "",
                    text: '',
                }
            }
        },
        props: ['whereFrom', 'whereTo', 'dateTime', 'freePlaces', 'cost'],
        methods: {
            //Обновяем данные в data при потере фокуса, т.к. они не всегда обновляются с помощью v-model
            updateTripModel(attr) {
                switch (attr) {
                    case 'suggestWhereFrom':
                        this.trip.from = $('#'+attr).val();
                        break;
                    case 'suggestWhereTo':
                        this.trip.to = $('#'+attr).val();
                        break;
                }
            },
            save() {
                //Получаем дату
                let parsedDate = this.trip.date.match(this.regexp.date);
                //Получаем время
                let parsedTime = this.trip.time.match(this.regexp.time);
                //Получаем форматированные дату и время
                let momentDateTime = moment(parsedDate[0] + ' ' + parsedTime[0], "DD-MM-YYYY hh:mm");
                //Если дата введена правильно
                if (momentDateTime.isValid()) {
                    //Выключаем уведоление о  не правильной дате (Если есть ничего не произойдет)
                    this.alert.active = false;
                    //Формируем данные для отправки в родительский компонент
                    let data = {
                        whereFrom: $('#suggestWhereFrom').val(),
                        whereTo: $('#suggestWhereTo').val(),
                        dateTime: momentDateTime.lang("ru").format('LLL'),
                        freePlaces: this.trip.freePlaces,
                        cost: this.trip.cost
                    };
                    //Сохраняем на сервер
                    this.saveToServer();
                    //Отправляем в родительский компонент
                    this.$emit('getChildData', data);

                } else {
                    //Формируем уведомление
                    this.alert.title = "Ошибка!";
                    this.alert.text = "Дата введена не правильно.";
                    //Выводим уведомление
                    this.alert.active = true;
                }
            },
            //Сохраняем на сервер
            saveToServer() {

            },
            //Получаем подсказки с яндекс карт при фокусе
            getSuggestion(attr) {
                //Обновляем v-model, при фокусе, т.к. они не всегда обновляются
                this.trip.from = $('#suggestWhereFrom').val();
                this.trip.to = $('#suggestWhereTo').val();
                //Если карты созданы, то удаляем, чтобы не дублировались подсказки в инпутах
                if (this.yaMap !== null) {
                    this.yaMap.destroy();
                }
                //Получаем подсказки
                this.yaMap = new ymaps.SuggestView(attr);
            }
        },
        mounted() {
            //Записываем данные пришедшие с родительского компонента
            this.trip.from = this.whereFrom;
            this.trip.to = this.whereTo;
            this.trip.freePlaces = this.freePlaces;
            this.trip.cost = this.cost;

            //Создаем маски ввода для даты и времени
            var date = new Inputmask("День-Месяц-Год: 99-99-9999");
            date.mask(document.getElementById('date'));

            var time = new Inputmask("Часы:Минуты: 99:99");
            time.mask(document.getElementById('time'));

            //Разбиваем пришедшую дату на дату и время
            let parsedDate = moment(this.dateTime, 'LLL', 'ru').toObject();
            //Прибавляем к месяцу 1, т.к. не правильно парсит месяц
            let months = parsedDate.months + 1 < 10 ? '0' + parsedDate.months : parsedDate.months + 1;
            this.trip.date = parsedDate.date + '-' + months + '-' + parsedDate.years;
            let hours = parsedDate.hours < 10 ? '0' + parsedDate.hours : parsedDate.hours;
            this.trip.time = hours + ':' + parsedDate.minutes;
        }
    }
</script>

<style scoped lang="scss">
    @media screen and (max-width: 800px) {
        .modal-container {
            width: 95vw !important;

            .inputx {
                width: 90vw !important;
            }
        }
    }

        .toLeft {
        align-self: left;
    }

    .inputx {
        width: 40vw !important;
        margin-bottom: 10px;
    }

    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
    }

    .modal-container {
        width: 50vw;
        margin: 0px auto;
        padding: 20px 30px;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    .modal-header h3 {
        margin-top: 0;
        color: #42b983;
    }

    .modal-body {
        margin: 20px 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    .modal-footer {
        height: 50px;
    }

    .ml {
        margin-left: 10px;
    }
</style>
