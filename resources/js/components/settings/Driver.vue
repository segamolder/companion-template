<template>
  <div class="driver-settings-container">
    <vs-row class="driver-settings-container__car-image-container">
      <vs-col vs-w="6" class="driver-settings-container__car-image-container__result">
        <img src="/images/profile/car_template.jpg" class="car-template" alt />
      </vs-col>
      <vs-col vs-w="6" class="driver-settings-container__car-image-container__upload">
        <vs-upload style="width: auto;" action="#" @on-success="successUpload" />
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
            :value="item.value"
            :text="item.text"
            v-for="(item,index) in carBodyTypeOptions"
          />
        </vs-select>

        <vs-select
          autocomplete
          @input-change="autoCompleteFunc"
          class="selectExample"
          label="Марка автомобиля"
          v-model="carMarkSelected"
        >
          <vs-select-item
            :key="index"
            :value="item.value"
            :text="item.text"
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
            :value="item.value"
            :text="item.text"
            v-for="(item,index) in carModelOptions"
          />
        </vs-select>
      </vs-col>
      <vs-col vs-w="6" class="driver-settings-container__inputs-container__second-col">
        <vs-input
          label="Опыт вождения"
          placeholder="Введите ваш стаж вождения"
          v-model="drivingExperience"
        />
        <vs-input
          id="carRegNumber"
          label="Номер автомобиля"
          placeholder="Номер автомобиля формата А000АА00"
          v-model="carNumber"
        />
        <vs-button color="primary" type="filled">Сохранить</vs-button>
      </vs-col>
    </vs-row>
  </div>
</template>

<script>
import Inputmask from "inputmask";
export default {
  data() {
    return {
      carBodyTypeSelected: 3,
      carBodyTypeOptions: [
        { text: "IT", value: 0 },
        { text: "Blade Runner", value: 2 },
        { text: "Thor Ragnarok", value: 3 }
      ],
      carMarkSelected: 3,
      carMarkOptions: [
        { text: "IT", value: 0 },
        { text: "Blade Runner", value: 2 },
        { text: "Thor Ragnarok", value: 3 }
      ],
      carModelSelected: 3,
      carModelOptions: [
        { text: "IT", value: 0 },
        { text: "Blade Runner", value: 2 },
        { text: "Thor Ragnarok", value: 3 }
      ],
      drivingExperience: "",
      carNumber: ""
    };
  },
  methods: {
    autoCompleteFunc(event) {
      console.log(event);
    },
    successUpload() {
      this.$vs.notify({
        color: "success",
        title: "Upload Success",
        text: "Lorem ipsum dolor sit amet, consectetur"
      });
    }
  },
  mounted() {
    let carRegNum = new Inputmask("*{8,9}");
    carRegNum.mask(document.getElementById("carRegNumber"));
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
  object-fit: contain;
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