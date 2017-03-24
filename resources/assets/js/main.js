import Vue from 'vue'
import ElementUI from 'element-ui'
import 'element-ui/lib/theme-default/index.css'
import App from './App'
import Bus from './plugins/bus.js'
import ConfigPlugin from './plugins/config'
import Config from './config'
import router from './router'

Vue.config.productionTip = false

Vue.use(ElementUI)
Vue.use(Bus)
Vue.use(ConfigPlugin, Config)

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  render: h => h(App)
})
