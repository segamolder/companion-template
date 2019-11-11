<template>
    <div class="driver-settings-container">
        <vs-row class="driver-settings-container__car-image-container">
            <vs-col vs-w="6" class="driver-settings-container__car-image-container__result">
                <img :src="data.image" class="car-template" alt/>
            </vs-col>
            <vs-col vs-w="6" class="driver-settings-container__car-image-container__upload">
                <vs-upload style="width: auto;" :action="'/api/image/car'" fileName="car" :headers="token"
                           @on-success="successUpload"/>
            </vs-col>
        </vs-row>
        <vs-row class="driver-settings-container__inputs-container">
            <vs-col vs-w="6" class="driver-settings-container__inputs-container__first-col">
                <vs-select
                        autocomplete
                        @input-change="autoCompleteFunc"
                        class="selectExample"
                        label="Тип кузова"
                        v-model="carBodyTypeSelected"
                >
                    <vs-select-item
                            :key="index"
                            :value="item.id"
                            :text="item.body_type"
                            v-for="(item,index) in carBodyTypeOptions"
                    />
                </vs-select>

                <vs-input
                        label="Опыт вождения"
                        placeholder="Введите ваш стаж вождения"
                        v-model="data.driving_experience"
                />
                <vs-input
                        id="carRegNumber"
                        label="Номер автомобиля"
                        placeholder="Номер автомобиля формата А000АА00"
                        v-model="data.car_number"
                />
            </vs-col>
            <vs-col vs-w="6" class="driver-settings-container__inputs-container__second-col">
                <vs-select
                        autocomplete
                        @input-change="autoCompleteFunc"
                        class="selectExample"
                        label="Марка автомобиля"
                        v-model="carMarkSelected"
                        @change="getCarModels(carMarkSelected); clearModelSelected"
                >
                    <vs-select-item
                            :key="index"
                            :value="item.id"
                            :text="item.mark_name"
                            v-for="(item,index) in carMarkOptions"
                    />
                </vs-select>

                <vs-select
                        autocomplete
                        @input-change="autoCompleteFunc"
                        class="selectExample"
                        label="Модель автомобиля"
                        v-model="carModelSelected"
                >
                    <vs-select-item
                            :key="index"
                            :value="item.id"
                            :text="item.model_name"
                            v-for="(item,index) in carModelOptions"
                    />
                </vs-select>
                <vs-button class="vs-con-loading__container" id="save" @click="save" color="primary" type="filled">Сохранить</vs-button>
            </vs-col>
        </vs-row>
    </div>
</template>

<script>
    import Inputmask from "inputmask";

    export default {
        data() {
            return {
                token: {
                    "Authorization": "Bearer " + window.localStorage.getItem("token")
                },
                carBodyTypeSelected: 3,
                carBodyTypeOptions: [
                    {text: "IT", value: 0},
                    {text: "Blade Runner", value: 2},
                    {text: "Thor Ragnarok", value: 3}
                ],
                carMarkSelected: 3,
                carMarkOptions: [
                    {text: "IT", value: 0},
                    {text: "Blade Runner", value: 2},
                    {text: "Thor Ragnarok", value: 3}
                ],
                carModelSelected: 3,
                carModelOptions: "",
                drivingExperience: "",
                carNumber: "",
                data: '',
                user_id: window.localStorage.getItem("id")
            };
        },
        methods: {
            save() {
                let data = {
                    "car_body_type_id": this.carBodyTypeSelected,
                    "car_model_id": this.carModelSelected,
                    "car_mark_id": this.carMarkSelected,
                    "driving_experience": this.data.driving_experience,
                    "car_number": this.data.car_number
                };
                this.$vs.loading({
                    background: 'primary',
                    color: '#fff',
                    container: '#save',
                    scale: 0.45
                });
                api.call('put', '/api/car/update/'+this.user_id, data).then((response)=>{
                    this.$vs.loading.close('#save > .con-vs-loading');
                    this.$vs.notify({
                        color: "success",
                        title: "Успешно обновлено",
                        text: ""
                    });
                }).catch((ex)=> {
                    this.$vs.loading.close('#save > .con-vs-loading');
                    this.$vs.notify({
                        color: "danger",
                        title: "Не удалось обновить",
                        text: ""
                    });
                    console.log(ex);
                });
            },
            autoCompleteFunc(event) {
                console.log(event);
            },
            successUpload() {
                api.call('get', '/api/image/car').then((response) => {
                    this.data.image = response.data;
                    this.$vs.notify({
                        color: "success",
                        title: "Успешно загружено",
                        text: ""
                    });
                });
            },
            getCarInfo() {
                this.$vs.loading();
                api.call('get', '/api/car/info/' + this.user_id).then((response) => {
                    this.data = response.data;
                    this.carBodyTypeSelected = response.data.car_body_type_id;
                    this.carMarkSelected = response.data.car_mark_id;
                    this.carModelSelected = response.data.car_model_id;
                    this.$vs.loading.close();
                })
            },
            getCarBodyTypes() {
                api.call('get', '/api/car/bodyTypes').then((response) => {
                    this.carBodyTypeOptions = response.data;
                })
            },
            getCarMarks() {
                api.call('get', '/api/car/marks').then((response) => {
                    this.carMarkOptions = response.data;
                })
            },
            getCarModels(id) {
                this.$vs.loading();
                api.call('get', '/api/car/models/' + id).then((response) => {
                    this.carModelOptions = response.data;
                    this.$vs.loading.close();

                });
            },
            clearModelSelected() {
                this.carModelSelected = '';
            }
        },
        mounted() {
            let carRegNum = new Inputmask("*{8,9}");
            carRegNum.mask(document.getElementById("carRegNumber"));
        },
        created() {
            this.getCarInfo();
            this.getCarMarks();
            this.getCarModels(this.carMarkSelected);
            this.getCarBodyTypes();
        }
    };
</script>

<style scoped lang="scss">
    .driver-settings-container {
        &__car-image-container {
            &__result {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            &__upload {
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        &__inputs-container {
            height: 52vh;
            box-shadow: inset -6px 7px 7px #bbb;
            background-color: aliceblue;

            &__first-col {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-evenly;

                div {
                    width: 70%;
                }
            }

            &__second-col {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: space-evenly;

                div {
                    width: 70%;
                }

                &__buttons {
                    justify-content: space-evenly;
                }
            }
        }
    }

    .car-template {
        height: 150px;
        width: 150px;
        object-fit: cover;
        border-radius: 100%;
        object-position: center;
    }

    @media screen and (max-width: 800px) {
        .driver-settings-container {
            &__car-image-container {
                &__result {
                    width: 45% !important;
                }
            }
        }
    }
</style>
