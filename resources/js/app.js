require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuesax from 'vuesax'
import 'vuesax/dist/vuesax.css'
import 'material-icons/iconfont/material-icons.css';
import '@fortawesome/fontawesome-free/css/fontawesome.min.css'
import '@fortawesome/fontawesome-free/css/all.min.css'
import { TooltipPlugin } from 'bootstrap-vue'
Vue.use(TooltipPlugin)
Vue.use(Vuesax);
Vue.use(VueRouter);


import App from './components/App';
import Account from './components/account/Layout';
import Welcome from './components/Welcome';
import AccountUser from './components/account/User'
import AccountCar from './components/account/Car'
import AccountStatistic from './components/account/Statistic'

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: Welcome },
        { path: '/account/:id',
            component: Account,
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
                {
                    path: 'statistic',
                    component: AccountStatistic,
                    props: true
                },
            ]
        }
    ]
});


const app = new Vue({
    components: {App},
    router,
    render: h => h(App)
}).$mount('#app');
