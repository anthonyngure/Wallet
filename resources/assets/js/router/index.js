import ComingSoon from '../components/ComingSoon.vue'
import SignIn from '../components/SignIn.vue'
import Dashboard from '../components/Dashboard.vue'
import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    hashbang: true,
    linkActiveClass: 'active',
    mode: 'hash',
    routes: [
        {
            path: '/',
            redirect: '/dashboard'
        },
        {
            meta: {auth: false},
            path: '/auth/signIn',
            name: 'signIn',
            component: SignIn
        },
        {
            meta: {auth: true},
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard
        },
        {
            meta: {auth: true},
            path: '/shopping',
            name: 'shopping',
            component: ComingSoon
        },
        {
            meta: {auth: true},
            path: '/appointments',
            name: 'appointments',
            component: ComingSoon
        },
        {
            meta: {auth: true},
            path: '/documents',
            name: 'documents',
            component: ComingSoon
        },
        {
            meta: {auth: true},
            path: '/invoices',
            name: 'invoices',
            component: ComingSoon
        },
        {
            meta: {auth: true},
            path: '/settings',
            name: 'settings',
            component: ComingSoon
        }, {
            meta: {auth: true},
            path: '/repairs',
            name: 'repairs',
            component: ComingSoon
        },
        {
            meta: {auth: true},
            path: '/it',
            name: 'it',
            component: ComingSoon
        }
    ]
})
