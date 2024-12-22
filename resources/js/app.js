import './bootstrap';
import {createApp} from 'vue'
import App from './App.vue'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura'
import Calendar from 'primevue/calendar'
import Card from 'primevue/card'
import Menubar from 'primevue/menubar'


const app = createApp(App)
app.use(PrimeVue, {
    theme: {
        preset: Aura
    }
});
app.component('Calendar', Calendar)
app.component('Card', Card)
app.component('Menubar', Menubar)
app.mount("#app")