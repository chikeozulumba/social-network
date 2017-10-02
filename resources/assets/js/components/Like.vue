<template>
  <div>
    <p class="text-left" v-for="like in post.likes">
      <img :src="like.user.avatar" class="user-feed" alt="">
    </p>
    <hr>
    <button class="btn btn-primary btn-xs">Like</button>
    <button class="btn btn-danger btn-xs">Unlike</button>
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
    post () {
      return this.$store.state.posts.find( (post) => {
        return post.id === this.id
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
