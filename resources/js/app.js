require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'
import 'material-icons/iconfont/material-icons.css';
import '@fortawesome/fontawesome-free/css/fontawesome.min.css'
import '@fortawesome/fontawesome-free/css/all.min.css'
import '@chenfengyuan/datepicker/dist/datepicker.min.css'
import '@chenfengyuan/datepicker/dist/datepicker.min'
import {TooltipPlugin} from 'bootstrap-vue'

Vue.use(TooltipPlugin)
Vue.use(Vuesax);
Vue.use(VueRouter);

import App from './components/App';
import Account from './components/account/Layout';
import Welcome from './components/Welcome';
import AccountUser from './components/account/User';
import AccountCar from './components/account/Car';
import TripSearch from './components/trip/search/Layout';
import TripCreate from './components/trip/create/Layout';
//#region Settings
import AccountSettings from './components/settings/Layout';
import AccountDriverSettings from './components/settings/Driver';
import AccountPasswordSettings from './components/settings/Password';
import AccountPreferencesSettings from './components/settings/Preferences';
import AccountUserSettings from './components/settings/User';
import MyTrips from './components/trip/myTrips';
//#endregion
//#region Auth
import Login from './components/auth/Login';
import Register from './components/auth/Register';
//#endregion

const router = new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Welcome},
        {path: '/trip/search', component: TripSearch},
        {path: '/trip/create', component: TripCreate, meta: { middlewareAuth: true }},
        {path: '/trip/my-trips', component: MyTrips, meta: { middlewareAuth: true }},
        {path: '/login', component: Login},
        {path: '/register', component: Register},
        {
            path: '/account/:id',
            component: Account,
            meta: { middlewareAuth: true },
            props: true,
            children: [
                {
                    path: '',
                    component: AccountUser,
                    props: true
                },
                {
                    path: 'user',
                    component: AccountUser,
                    props: true
                },
                {
                    path: 'car',
                    component: AccountCar,
                    props: true
                },
            ]
        },
        {
            path: '/settings/:id',
            component: AccountSettings,
            meta: { middlewareAuth: true },
            props: true,
            children: [
                {
                    path: '',
                    component: AccountUserSettings,
                    props: true
                },
                {
                    path: 'user',
                    component: AccountUserSettings,
                    props: true
                },
                {
                    path: 'driver',
                    component: AccountDriverSettings,
                    props: true
                },
                {
                    path: 'preferences',
                    component: AccountPreferencesSettings,
                    props: true
                },
                {
                    path: 'password',
                    component: AccountPasswordSettings,
                    props: true
                },
            ]
        }
    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.middlewareAuth)) {
        if (!auth.check()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            });

            return;
        }
    }

    next();
})

window.Event = new Vue;
import Auth from './auth';
window.auth = new Auth();

import Api from './api.js';
window.api = new Api();

const app = new Vue({
    components: {App},
    router,
    render: h => h(App)
}).$mount('#app');
