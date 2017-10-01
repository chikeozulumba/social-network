<template>
  <li>
    <a href="/notifications">
      Notifications
      <span class="badge">{{ all_nots_count }}</span>
    </a>
  </li>
</template>
<script>
export default {
  mounted () {
    this.get_unread()
  },
  methods: {
    get_unread () {
      axios.get('/get_unread')
          .then((nots) => {
            nots.data.forEach(function(not) {
              this.$store.commit('add_nots', not)
              console.log(not.data)
            }, this);
          })
    }
  },
  computed: {
    all_nots_count () {
      return this.$store.getters.all_nots_count
    }
  }
}
</script>
