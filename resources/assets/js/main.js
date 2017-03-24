import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
import App from './App'
import Bus from './plugins/bus.js'
import Config from './plugins/config'
import router from './router'

let _config = {
  name: 'slim-application'
}

Vue.config.productionTip = false

Vue.use(ElementUI)
Vue.use(Bus)
Vue.use(Config, _config)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
