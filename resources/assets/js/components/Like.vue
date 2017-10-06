<template>
  <div>
    <p class="text-left" v-for="like in post.likes">
      <img :src="like.user.avatar" class="user-feed" alt="">
    </p>
    <hr>
    <button class="btn btn-primary btn-xs" v-if="!auth_user_likes_post" @click.prevent="like">Like</button>
    <button class="btn btn-danger btn-xs" v-else @click.prevent="unlike">Unlike</button>
  </div>
</template>

<script>
export default {
  mounted () {

  },
  props: [
    'id'
  ],
  computed: {
    likers () {
      var likers = []

      this.post.likes.forEach((like) => {
        likers.push(like.user.id) 
      })
      return likers
    },
    auth_user_likes_post () {
      var check_index = this.likers.indexOf(
        this.$store.state.auth_user.id
      )
      if (check_index === -1) {
        return false
      } else {
        return true
      }
    },
    post () {
      return this.$store.state.posts.find( (post) => {
        return post.id === this.id
      })
    }
  },
  methods: {
    like () {
      axios.get('/like/' + this.id)
          .then((res) => {
            this.$store.commit('update_post_likes', {
              id: this.id,
              like: res.data
            })

            iziToast.show({
                          position: 'topRight',
                          color: 'green',
                          theme: 'light',
                          message: 'Post liked',
                          transitionIn: 'fadeInDown',
                          animateInside: true,
                          timeout:2000
                        })
          })
    },
    unlike  () {
      axios.get('/unlike/' + this.id)
            .then((res) => {
              this.$store.commit('unlike_post', {
                post_id: this.id,
                like_id: res.data
              })
              iziToast.show({
                          position: 'topLeft',
                          color: 'yellow',
                          theme: 'light',
                          message: 'Removed Like',
                          transitionIn: 'fadeInDown',
                          animateInside: true,
                          timeout:2000
                        })
            })
    }
  }
}
</script>

<style scoped>
.user-feed {
  border-radius:50%;
  margin-right:5px;
  width: 20px;
  height: 20px;
}
p {
  margin: 0;
  padding: 0;
}
</style>
