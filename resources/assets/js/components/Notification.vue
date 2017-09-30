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
                          color: 'green',
                          theme: 'light',
                          message: noty.message
                        })
            console.log(noty)
          })
    }
  }
}
</script>
