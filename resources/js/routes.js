import AllUser from './components/AllUser.vue';
import CreateUser from './components/CreateUser.vue';
import EditUser from './components/EditUser.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllUser
    },
    {
        name: 'create',
        path: '/create',
        component: CreateUser
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditUser
    }
];