<template>
  <div class="password-container">
    <div class="password">
      <vs-input class="input" type="password" label="Старый пароль" v-model="oldPassword" />
      <vs-input class="input" type="password" label="Новый пароль" v-model="newPassword" />
      <vs-input class="input" type="password" label="Новый пароль повторно" v-model="newPasswordDouble" />
      <vs-button class="button" color="primary" type="border">Сохранить</vs-button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      oldPassword: "",
      newPassword: "",
      newPasswordDouble: ""
    };
  }
};
</script>

<style scoped lang="scss">
.password-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 85vh;
  .password {
    width: 50%;
    height: 50%;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    align-items: center;
    .input {
      width: 50%;
    }
    .button {
      align-self: flex-end;
    }
  }
}
</style>