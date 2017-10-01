<template>
  <div>

  </div>
</template>

<script>
export default {
  beforeMount () {
    this.listen()
  },
  props:[
    'id'
  ],
  methods: {
    listen () {
      Echo.private('App.User.' + this.id )
          .notification( (noty) => {
            iziToast.show({
                          title: noty.name,
                          position: 'bottomLeft',
                          color: 'yellow',
                          theme: 'light',
                          message: noty.message
                        })
            this.$store.commit('add_nots', noty)
            console.log(noty)
          })
    }
  }
}
</script>
