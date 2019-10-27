<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                    <div class="modal-header">
                        <slot name="header">
                            default header
                        </slot>
                    </div>

                    <div class="modal-body">
                        <slot name="body">
                            <vs-input label="Откуда" class="inputx" id="suggestWhereFrom" @focus="getSuggestion('suggestWhereFrom')"/>
                            <vs-input label="Куда" type="text" class="inputx" id="suggestWhereTo" @focus="getSuggestion('suggestWhereTo')"/>
                            <vs-input label="Когда" v-model="trip.date" type="text" class="inputx" id="date"/>
                            <vs-input label="Во сколько" v-model="trip.time" type="text" class="inputx" id="time"/>
                            <vs-input-number v-model="trip.passengerCount" label="Количество свободных мест:" class="toLeft" />
                            <vs-input-number v-model="trip.cost" label="Стоимость за место" :step="50" class="toLeft" />
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">
                            default footer
                            <button class="modal-default-button" @click="$emit('close')">
                                OK
                            </button>
                            <button class="modal-default-button" @click="save">
                                Save
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    import Inputmask from 'inputmask';
    export default {
        name: "TripEditModal",
        data() {
            return {
                showModal: false,
                yaMap: null,
                trip: {
                    date: '',
                    time: '',
                    passengerCount: '',
                    cost: ''
                }
            }
        },
        props: ['whereFrom', 'whereTo'],
        methods: {
          save() {
              let data = {
                  whereFrom: $('#suggestWhereFrom').val(),
                  whereTo: $('#suggestWhereTo').val()
              };

              this.$emit('setAddress', data);
          },
            getSuggestion(attr) {
              if(this.yaMap !== null) {
                  this.yaMap.destroy();
              }
                this.yaMap = new ymaps.SuggestView(attr);
            }
        },
        mounted() {
            $('#suggestWhereFrom').val(this.whereFrom);
            $('#suggestWhereTo').val(this.whereTo);

            var date = new Inputmask("День-Месяц-Год: 99-99-9999");
            date.mask(document.getElementById('date'));

            var time = new Inputmask("Часы:Минуты: 99:99");
            time.mask(document.getElementById('time'));
        }
    }
</script>

<style scoped lang="scss">
    .toLeft {
        align-self: left;
    }

    .inputx {
        width: 40vw !important;
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

</style>
