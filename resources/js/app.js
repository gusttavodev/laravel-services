require('./bootstrap')
import store from './store'

// Import modules...
import { createApp, h } from 'vue'
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'

const el = document.getElementById('app')

const app = createApp({
  render: () =>
    h(InertiaApp, {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: (name) => require(`./Pages/${name}`).default,
    }),
})
app.use(store)

// import '../../node_modulesvueform/multiselect/themes/default.css'
import Multiselect from '@vueform/multiselect'
app.component('v-select', Multiselect)

import colorPicker from 'vue3-colorpicker'
import 'vue3-colorpicker/bundle.css'
app.use(colorPicker)

app.mixin({ methods: { route } }).use(InertiaPlugin).mount(el)

InertiaProgress.init({ color: '#4B5563' })

import EstablishmentButton from "./Establishment/Button.vue"
app.component('establishment-button', EstablishmentButton)

import EstablishmentPrice from "./Establishment/Price.vue"
app.component('establishment-price', EstablishmentPrice)


