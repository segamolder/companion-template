<template>
  <div class="preferences-container">
    <div class="preferences">
      <!-- Первая строка (Диалог) -->
      <div v-on:click="setPreference('comments', 'low')" id="comments-low">
        <i class="fas fa-comments low"></i>
        <p>Люблю помолчать</p>
      </div>
      <div v-on:click="setPreference('comments', 'medium')" id="comments-medium">
        <i class="fas fa-comments medium"></i>
        <p>По-настроению могу поговорить</p>
      </div>
      <div v-on:click="setPreference('comments', 'height')" id="comments-height">
        <i class="fas fa-comments height"></i>
        <p>Люблю поболтать</p>
      </div>
      <!-- Вторая строка (Курение) -->
      <div v-on:click="setPreference('smoking', 'low')" id="smoking-low">
        <i class="fas fa-smoking low"></i>
        <p>В машине не курить</p>
      </div>
      <div v-on:click="setPreference('smoking', 'medium')" id="smoking-medium">
        <i class="fas fa-smoking medium"></i>
        <p>Иногда разрешаю покурить</p>
      </div>
      <div v-on:click="setPreference('smoking', 'height')" id="smoking-height">
        <i class="fas fa-smoking height"></i>
        <p>Курю в машине и вам не запрещаю</p>
      </div>
      <!-- Третья строка (Животные) -->
      <div v-on:click="setPreference('paw', 'low')" id="paw-low">
        <i class="fas fa-paw low"></i>
        <p>Без животных</p>
      </div>
      <div v-on:click="setPreference('paw', 'medium')" id="paw-medium">
        <i class="fas fa-paw medium"></i>
        <p>Зависит от животного</p>
      </div>
      <div v-on:click="setPreference('paw', 'height')" id="paw-height">
        <i class="fas fa-paw height"></i>
        <p>Можно с животными</p>
      </div>
      <!-- Четвертая строка (Музыка) -->
      <div v-on:click="setPreference('music', 'low')" id="music-low">
        <i class="fas fa-music low"></i>
        <p>Люблю тишину</p>
      </div>
      <div v-on:click="setPreference('music', 'medium')" id="music-medium">
        <i class="fas fa-music medium"></i>
        <p>Слушаю по-настроению</p>
      </div>
      <div v-on:click="setPreference('music', 'height')" id="music-height">
        <i class="fas fa-music height"></i>
        <p>Слушаю всё подряд</p>
      </div>
    </div>
    <vs-button class="save-button" color="primary" type="border">Сохранить</vs-button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      talkPreferenceType: "",
      smokePreferenceType: "",
      animalPreferenceType: "",
      musicPreferenceType: ""
    };
  },
  methods: {
    setPreference(icon, type) {
      this.disableBorderRow(icon);
      let id = "#" + icon + "-" + type;
      $(id).css({ border: "1px solid darkcyan" });
      switch (icon) {
        case "comments":
          this.talkPreferenceType = type;
          break;
        case "smoking":
          this.smokePreferenceType = type;
          break;
        case "paw":
          this.animalPreferenceType = type;
          break;
        case "music":
          this.musicPreferenceType = type;
          break;
      }
    },
    disableBorderRow(icon) {
      $("#" + icon + "-low").css({ border: "none" });
      $("#" + icon + "-medium").css({ border: "none" });
      $("#" + icon + "-height").css({ border: "none" });
    }
  }
};
</script>

<style scoped lang="scss">
.preferences-container {
  font-family: "Montserrat", sans-serif;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 85vh;
  .preferences {
    width: 70%;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr 1fr;
    grid-gap: 10px;
    div {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      padding: 5px;
      margin: 5px;
      p {
        text-align: center;
        margin-top: 5px;
      }
    }
  }
}
.low {
  color: #ff4757;
}
.medium {
  color: #ffba00;
}
.height {
  color: #41c149;
}

.talk {
  margin: 10px;
}

.smoke {
  margin: 10px;
}

.save-button {
  position: absolute;
  margin: 30px;
  bottom: 0;
}
</style>