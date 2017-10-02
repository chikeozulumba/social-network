<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body" >
            <textarea rows="5" class="form-control" v-model="content"></textarea> <br>
            <button class="btn btn-success pull-right" :disabled="not_working" @click.prevent="create_post">Talk</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted () {

  },
  data () {
    return {
      content: '',
      not_working: true
    }
  },
  watch: {
    content () {
      if (this.content.length > 10) {
        this.not_working = false
      } else {
        this.not_working = true
      }
    }
  },
  methods: {
    create_post () {
      axios.post('/create/post', {content: this.content})
          .then((res) => {
            this.content = ''
            iziToast.show({
                          position: 'topRight',
                          color: 'green',
                          theme: 'light',
                          message: 'Post created',
                          transitionIn: 'fadeInDown',
                          animateInside: true,
                          timeout:2000
                        })
            console.log(res)
          })
    }
  }
}
</script>
