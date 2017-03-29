export default function (Vue, options) {
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

  Vue.prototype.$bus = bus
}
