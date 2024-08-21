import './bootstrap';
import '../css/app.css'
import { createApp, h } from 'vue';
import { createPinia } from 'pinia'
import { createInertiaApp, Link, Head } from '@inertiajs/vue3'
import { CkeditorPlugin } from '@ckeditor/ckeditor5-vue';
import Layout from './Layouts/Layout.vue'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';
createInertiaApp({
  title: (title) => ` ${title} | ${appName}`,
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
    pages.default.layout = page.default.layout || Layout
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .use(createPinia())
      .use( CkeditorPlugin )
      .component('Link', Link)
      .component('Head', Head)
      .mount(el)
  },
})