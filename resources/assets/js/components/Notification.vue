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
            alert('new notification')
            console.log(noty)
          })
    }
  }
}
</script>
