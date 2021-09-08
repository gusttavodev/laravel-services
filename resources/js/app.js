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

import Tabs from '@/Layouts/Tabs'
app.component('v-tabs', Tabs)

import SelectInput from '@/Shared/SelectInput'
app.component('v-select', SelectInput)

import HorizontalSelectInput from '@/Shared/HorizontalSelectInput'
app.component('v-h-select', HorizontalSelectInput)

import MoneyInput from '@/Shared/MoneyInput'
app.component('v-money', MoneyInput)

import SearchCard from '@/Shared/SearchCard'
app.component('v-search-card', SearchCard)

import VueCheckbox from '@/Components/VueCheckbox'
app.component('v-checkbox', VueCheckbox)

import BasicInput from '@/Components/Input'
app.component('v-input', BasicInput)

import TextAreaInput from '@/Shared/TextAreaInput'
app.component('v-text-area', TextAreaInput)

import colorPicker from 'vue3-colorpicker'
import 'vue3-colorpicker/bundle.css'
app.use(colorPicker)

app.mixin({ methods: { route } }).use(InertiaPlugin).mount(el)

InertiaProgress.init({ color: '#4B5563' })

import EstablishmentButton from "./Establishment/Button.vue"
app.component('establishment-button', EstablishmentButton)

import EstablishmentPrice from "./Establishment/Price.vue"
app.component('establishment-price', EstablishmentPrice)


