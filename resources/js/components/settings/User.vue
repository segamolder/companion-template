<template>
  <div class="user-settings-container">
    <vs-row class="user-settings-container__upload-photo">
      <vs-col vs-w="6" class="user-settings-container__upload-photo__result">
        <vs-avatar size="150px" :src="data.user_image" />
      </vs-col>
      <vs-col vs-w="6" class="user-settings-container__upload-photo__upload">
        <vs-upload style="width: auto;" :action="'/api/image/user'" fileName="user" :headers="token" @on-success="successUpload" />
      </vs-col>
    </vs-row>
    <vs-row class="user-settings-container__inputs-container">
      <vs-col vs-w="6" class="user-settings-container__inputs-container__first-block">
        <vs-input label="Фамилия" v-model="data.surname" />
        <vs-input label="Имя" v-model="data.name" />
        <vs-input label="Отчество" v-model="data.lastname" />
      </vs-col>
      <vs-col vs-w="6" class="user-settings-container__inputs-container__second-block">
        <vs-input id="phone" label="Телефон" v-model="data.phone_number" />
        <vs-input
          v-if="data.is_email_verified"
          :success="true"
          success-text="E-mail подтвержден"
          id="email"
          label="E-mail"
          v-model="data.email"
        />
        <vs-input
          v-else
          :danger="true"
          danger-text="E-mail не подтвержден"
          id="email"
          label="E-mail"
          v-model="data.email"
        />
        <vs-row class="user-settings-container__inputs-container__second-block__buttons">
          <vs-button v-if="!data.is_email_verified" type="line">Отправить подтверждение на почту</vs-button>
          <vs-button class="vs-con-loading__container" id="save" @click="save" color="primary" type="filled">Сохранить</vs-button>
        </vs-row>
      </vs-col>
    </vs-row>
  </div>
</template>

<script>
import Inputmask from "inputmask";
export default {
  data() {
    return {
      currentUrl: window.location.host,
      data: auth.user,
      token: {
        "Authorization":"Bearer "+window.localStorage.getItem("token")
      }
    };
  },
  methods: {
    save() {
      this.$vs.loading({
        background: 'primary',
        color: '#fff',
        container: '#save',
        scale: 0.45
      });
      api.call('put', '/api/user', this.data).then((response) => {
        auth.setUserInfo(this.data);
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
      })
    },
    successUpload() {
      api.call('get', '/api/image/user').then((response) => {
        this.data.user_image = response.data;
        this.$vs.notify({
          color: "success",
          title: "Успешно загружено",
          text: ""
        });
        auth.setUserInfo(this.data);
      });
    },

  },
  mounted() {
    let phone = new Inputmask("+7(999)999-99-99");
    phone.mask(document.getElementById("phone"));

    let email = new Inputmask(
      "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]"
    );
    email.mask(document.getElementById("email"));
  }
};
</script>

<style scoped lang="scss">
.user-settings-container {
  &__upload-photo {
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
    &__first-block {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-evenly;
      div {
        width: 70%;
      }
    }
    &__second-block {
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
@media screen and (max-width: 800px) {
  .user-settings-container {
    &__upload-photo {
      &__result {
        width: 45% !important;
      }
    }
  }
}
</style>
