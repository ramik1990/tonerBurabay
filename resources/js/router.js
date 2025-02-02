import { createRouter, createWebHistory} from 'vue-router';
import Home from './Components/Home.vue';
import About from './Components/About.vue';
import RecordPage from './Components/RecordPage.vue';

const routes = [
    {path: '/', component: Home},
    {path: '/about', component: About},
    {path: '/record', component: RecordPage}
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;