<template>
  <div>
    <h1>{{ msg }}</h1>
    <el-button @click.native="startHacking">Let's do it!</el-button>
  </div>
</template>

<script>
export default {
  data () {
    return {
      msg: 'Use Vue 2.0 Today!'
    }
  },
  created () {
    this.$bus.on('hello', (msg) => {
      console.log(msg)
    })
  },
  methods: {
    startHacking () {
      this.$notify({
        title: 'It Works',
        message: 'We have laid the groundwork for you. Now it\'s your time to build something epic!',
        duration: 6000
      })

      this.$bus.emit('hello', this.$config.name + ' by light')
    }
  }
}
</script>

<style scoped>
.h1 {
  font-style: italic;
}
</style>
