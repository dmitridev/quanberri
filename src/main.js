import { createApp } from 'vue'
import App from './App.vue'
import VueSplide from '@splidejs/vue-splide'
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll';
import '@splidejs/vue-splide/css';
const app = createApp(App);
app.use(VueSplide,{AutoScroll});
app.mount('#app')