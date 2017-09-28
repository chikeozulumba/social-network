<template>
  <div>
      <div class="content" style="min-height:50px; padding:10px">
        <p class="text-center" v-if="loading">
          Loading...
        </p>
        <p class="text-center" v-if="!loading">
          <button class="btn btn-primary btn-md" v-if="status === 0" @click="add_friend">Add Friend</button>
          <button class="btn btn-success btn-md" v-if="status === 'pending'" @click="accept_friend">Accept Friend</button>
          <span class="text-warning" v-if="status === 'waiting'">Waiting for response</span>
          <span class="text-success" v-if="status === 'friends'">You are friends. </span>
        </p>
      </div>
  </div>
</template>

<script>
import iziToast from 'izitoast'
export default {
  props: [
    'profile_user_id'
  ],
  mounted() {
   axios.get('/check_relationship_status/' + this.profile_user_id)
                  .then( (res) => {
                    console.log(res)
                    this.status = res.data.status
                    this.loading = false
                  })
  },
  data () {
    return {
      status: '',
      loading: true
    }
  },
  methods: {
    add_friend () {
      this.loading = true
      axios.get('/add_friend/' + this.profile_user_id)
                    .then( (res) => {
                      if(res.data === 1) {
                        this.status = 'waiting'
                        iziToast.show({
                          title: 'Success',
                          position: 'bottomLeft',
                          color: 'blue',
                          theme: 'light',
                          message: 'Friend request sent!'
                        })
                        this.loading = false
                      }
                    })
    },
    accept_friend () {
      this.loading = true
      axios.get('/accept_friend/' + this.profile_user_id)
                    .then( (res) => {
                      if(res.data === 1) {
                        this.status = 'friends'
                        iziToast.show({
                          title: 'Success',
                          position: 'bottomLeft',
                          color: 'green',
                          theme: 'light',
                          message: 'You are now friends!'
                        })
                        this.loading = false
                      }
                    })
    }
  }
}
</script>
