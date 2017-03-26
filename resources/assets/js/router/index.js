import Vue from 'vue'
import Router from 'vue-router'
import Hello from '@/components/Hello'
import Login from '@/views/Login'

Vue.use(Router)

let router = new Router({
  routes: [
    {
      path: '/',
      name: 'Hello',
      component: Hello,
      meta: {
        shouldAuth: true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    }
  ]
})

var logged = true;

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.shouldAuth)) {
    if (!logged) {
      next({
        path: '/login',
        query: {redirect: to.path}
      })
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router
