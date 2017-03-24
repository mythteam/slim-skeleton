import Vue from 'vue'

export default function (_Vue, options) {
  let bus = new Vue()

  Object.defineProperties(bus, {
    on: {
      get () {
        return this.$on
      }
    },
    emit: {
      get () {
        return this.$emit
      }
    },
    off: {
      get () {
        return this.$off
      }
    },
    once: {
      get () {
        return this.$once
      }
    }
  })

  _Vue.prototype.$bus = bus
}
