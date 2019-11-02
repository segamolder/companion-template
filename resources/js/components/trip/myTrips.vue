<template>
  <div class="my-trips-container">
    <div class="reserved-trips">
      <vs-card class="reserved-trips__card">
        <div slot="header">
          <h3>Запланированная поездка</h3>
        </div>
        <div class="reserved-trips__tripInfo">
          <vs-list>
            <vs-list-item title="Откуда" :subtitle="trip.whereFrom"></vs-list-item>
            <vs-list-item title="Куда" :subtitle="trip.whereTo"></vs-list-item>
            <vs-list-item title="Когда" :subtitle="trip.dateTime"></vs-list-item>
            <vs-list-item title="Цена" :subtitle="trip.cost.toString()"></vs-list-item>
          </vs-list>
        </div>
        <div slot="footer" class="reserved-trips__card-footer">
          <vs-row vs-justify="flex-end">
            <vs-button color="primary" type="gradient">Профиль водителя</vs-button>
            <vs-button color="danger" type="gradient" style="margin-left:5px;">Отменить бронь</vs-button>
          </vs-row>
        </div>
      </vs-card>
    </div>
    <div class="last-trips">
      <div class="last-trips__trip" v-for="(lastTrip, index) in lastTrips" :key="index">
        <vs-card class="last-trips__card">
          <div slot="header">
            <h3>Поездка от {{lastTrip.dateTime}}</h3>
          </div>
          <div class="last-trips__tripInfo">
            <vs-list>
              <vs-list-item title="Откуда" :subtitle="lastTrip.whereFrom"></vs-list-item>
              <vs-list-item title="Куда" :subtitle="lastTrip.whereTo"></vs-list-item>
              <vs-list-item title="Цена" :subtitle="lastTrip.cost.toString()"></vs-list-item>
            </vs-list>
          </div>
        </vs-card>
        <div class="last-trips__comment">
          <vs-tabs>
            <vs-tab label="Поздка">
              <vs-card>
                <div slot="header">
                  <h3>Ваш комментарий</h3>
                </div>
                <div>
                  <vs-textarea label="Впечатления о поездке и водителе" v-model="textarea" />
                  <rating :value="0" size="1.2rem"></rating>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="primary" type="gradient">Сохранить</vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-tab>
            <vs-tab label="Автомобиль">
              <vs-card>
                <div slot="header">
                  <h3>Ваш комментарий</h3>
                </div>
                <div>
                  <vs-textarea label="Состояние автомобиля" v-model="textarea" />
                  <rating :value="0" size="1.2rem"></rating>
                </div>
                <div slot="footer">
                  <vs-row vs-justify="flex-end">
                    <vs-button color="primary" type="gradient">Сохранить</vs-button>
                  </vs-row>
                </div>
              </vs-card>
            </vs-tab>
          </vs-tabs>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import rating from "../plugins/RatingComponent";
export default {
  components: {
    rating
  },
  data() {
    return {
      trip: {
        whereFrom: "Россия, Чувашская Республика, Чебоксары",
        whereTo: "Россия, Московская область, Подольск",
        dateTime: "26 октября 2019 г., 13:54",
        cost: 567
      },
      lastTrips: [
        {
          whereFrom: "Россия, Чувашская Республика, Чебоксары",
          whereTo: "Россия, Московская область, Подольск",
          dateTime: "26 октября 2019 г., 13:54",
          cost: 567
        },
        {
          whereFrom: "Россия, Чувашская Республика, Чебоксары",
          whereTo: "Россия, Московская область, Подольск",
          dateTime: "26 октября 2019 г., 13:54",
          cost: 567
        },
        {
          whereFrom: "Россия, Чувашская Республика, Чебоксары",
          whereTo: "Россия, Московская область, Подольск",
          dateTime: "26 октября 2019 г., 13:54",
          cost: 567
        }
      ]
    };
  }
};
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
.my-trips-container {
  height: 95vh;
  display: flex;
  .reserved-trips {
    width: 40%;
    padding: 20px;
    &__card {
    }
  }

  .last-trips {
    overflow: auto;
    box-shadow: inset 6px 7px 7px #bbb;
    width: 60%;
    padding: 10px;
    &__trip {
      padding: 10px;
      display: flex;
      width: 100%;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }
    &__card {
      width: 50%;
    }
    &__comment {
      padding: 0 10px;
      width: 50%;
    }
  }
}
</style>