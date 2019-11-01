<template>
  <div>
    <vs-tabs>
      <vs-tab label="Пользователь" @click="$router.push('/settings/'+id+'/user');">
      </vs-tab>
      <vs-tab label="Водитель" @click="$router.push('/settings/'+id+'/driver');">
      </vs-tab>
      <vs-tab label="Предпочтения" @click="$router.push('/settings/'+id+'/preferences');">
      </vs-tab>
      <vs-tab label="Пароль" @click="$router.push('/settings/'+id+'/password');">
      </vs-tab>
    </vs-tabs>
    <router-view></router-view>
  </div>
</template>
<script>
export default {
  props: ['id'],
  data() {
    return {};
  }
};
</script>
<style lang="scss">
</style>