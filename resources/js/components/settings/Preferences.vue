<template>
  <div class="preferences-container">
    <div class="preferences">
      <vs-row class="talk">
        <vs-col vs-w="4" class="preference-col">
          <div v-on:click="setPreference('comments', 'low')" id="comments-low">
            <i class="fas fa-comments low"></i>
            <p>Люблю помолчать</p>
          </div>
        </vs-col>
        <vs-col vs-w="4" class="preference-col">
          <div v-on:click="setPreference('comments', 'medium')" id="comments-medium">
            <i class="fas fa-comments medium"></i>
            <p>По-настроению могу поговорить</p>
          </div>
        </vs-col>
        <vs-col vs-w="4" class="preference-col">
          <div v-on:click="setPreference('comments', 'height')" id="comments-height">
            <i class="fas fa-comments height"></i>
            <p>Люблю поболтать</p>
          </div>
        </vs-col>
      </vs-row>
      <vs-row class="smoke">
        <vs-col vs-w="4" class="preference-col">
          <div v-on:click="setPreference('smoking', 'low')" id="smoking-low">
            <i class="fas fa-smoking low"></i>
            <p>В машине не курить</p>
          </div>
        </vs-col>
        <vs-col vs-w="4" class="preference-col">
          <div v-on:click="setPreference('smoking', 'medium')" id="smoking-medium">
            <i class="fas fa-smoking medium"></i>
            <p>Иногда разрешаю покурить</p>
          </div>
        </vs-col>
        <vs-col vs-w="4" class="preference-col">
          <div v-on:click="setPreference('smoking', 'height')" id="smoking-height">
            <i class="fas fa-smoking height"></i>
            <p>Курю в машине и вам не запрещаю</p>
          </div>
        </vs-col>
      </vs-row>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      talkPreferenceType: "",
      smokePreferenceType: ""
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
    width: 50%;
    .preference-col {
      div {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        padding: 5px;
        p {
          text-align: center;
          margin-top: 5px;
        }
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
</style>