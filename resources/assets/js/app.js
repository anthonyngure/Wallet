// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.


import Vue from 'vue'
import VueAxios from 'vue-axios'
import axios from 'axios'
import App from './App.vue'
import router from './router'
import Vuetify from 'vuetify'
import VueTimeago from 'vue-timeago'
import formatCurrency from 'format-currency'

const DEBUG = true

const GOOGLE_MAPS_KEY = 'AIzaSyAS_9BsQpqTP8EVuMZ7rQ9gMCl0wmqhm7k'
const PRIMARY_COLOR = '#486b00'
const ACCENT_COLOR = '#F50057'


Vue.router = router


Vue.use(VueAxios, axios)
Vue.axios.defaults.baseURL = DEBUG ? 'http://localhost:3000/api/v1' : 'https://epay.toshngure.co.ke/api/v1'
Vue.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
Vue.axios.defaults.headers.common['Accept'] = 'application/json'
Vue.axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded'

// Add a request interceptor
Vue.axios.interceptors.request.use(function (config) {
    // Do something before request is sent
    //console.info(`REQUEST INTERCEPTOR - CONFIG \n ${JSON.stringify(config)}`)
    return config
}, function (error) {
    // Do something with request error
    //console.error(`REQUEST INTERCEPTOR - ERROR \n ${JSON.stringify(error)}`)
    return Promise.reject(error)
})

// Add a response interceptor
Vue.axios.interceptors.response.use(function (response) {
    // Do something with response data
    // let token = this.axios._getHeaders.call(this, response).Authorization
    // console.info(`RESPONSE INTERCEPTOR - TOKEN \n ${token}`)
    // console.info(`RESPONSE INTERCEPTOR - RESPONSE \n ${JSON.stringify(response.data)}`)
    return response
}, function (error) {
    // Do something with response error
    // alert(error)
    console.error(`RESPONSE INTERCEPTOR - ERROR \n`)
    if (error.response) {
        console.info(error.response.status)
        console.info(error.response.data)
        console.info(error.response.headers)
    } else if (error.request) {
        console.info(`REQUEST: ${JSON.stringify(error.request)}`)
    } else {
        console.info(`MESSAGE: ${JSON.stringify(error.message)}`)
    }
    return Promise.reject(error)
})

Vue.use(require('@websanova/vue-auth'), {
    auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
    http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
    router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
    fetchData: {url: 'auth/user', method: 'GET', enabled: true},
    registerData: {url: 'auth/signUp', method: 'POST', redirect: '/dashboard'},
    loginData: {url: 'auth/webSignIn', method: 'POST', redirect: '/dashboard', fetchUser: true},
    logoutData: {url: 'auth/signOut', method: 'POST', redirect: '/auth/signIn', makeRequest: true},
    refreshData: {url: 'auth/refresh', method: 'GET', enabled: false, interval: 0},
    authRedirect: {path: 'auth/signIn'}
})

require('vuetify/dist/vuetify.min.css')
Vue.use(Vuetify, {
    theme: {
        primary: PRIMARY_COLOR,
        secondary: '#424242',
        accent: ACCENT_COLOR,
        error: '#FF5252',
        info: '#2196F3',
        success: '#4CAF50',
        warning: '#FFC107'
    }
})

Vue.use(VueTimeago, {
    name: 'timeago', // component name, `timeago` by default
    locale: 'en-US',
    locales: {
        // you will need json-loader in webpack 1
        'en-US': require('vue-timeago/locales/en-US.json')
    }
})

Vue.config.productionTip = true

Vue.prototype.$appName = 'Wallet'
Vue.prototype.$utils = {
    url: DEBUG ? 'http://localhost:3000' : 'https://epay.toshngure.co.ke',
    googleMapsKey: GOOGLE_MAPS_KEY,
    googleGeocodeUrl: 'https://maps.googleapis.com/maps/api/geocode/json',
    googleDirectionsUrl: 'https://maps.googleapis.com/maps/api/directions/json',
    log: function (logData) {
        console.info(logData)
    },

    formatMoney: function (estimatedCost) {
        let opts = {format: '%s%v', symbol: 'KES '}
        return formatCurrency(estimatedCost, opts)
    },
    primaryColor: PRIMARY_COLOR,
    accentColor: ACCENT_COLOR,
    getRandomInt (max) {
        return Math.floor(Math.random() * ((max - 5) + 1)) + 5
    },
    getRandomColor () {
        return `#${((0x1000000 + (Math.random())) * 0xffffff).toString(16).substr(1, 6)}`
    },
}

/* eslint-disable no-new */
new Vue({
    el: '#app',
    router,
    http: {
        emulateJSON: true,
        emulateHTTP: true
    },
    template: '<App></App>',
    components: {App}
})
