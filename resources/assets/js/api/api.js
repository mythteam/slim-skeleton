import axios from 'axios'

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

let base = ''

export const doLogin = params => {
  return axios.post(`${base}/login`, params).then(respond => respond.data)
}
