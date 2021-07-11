import { createStore } from 'vuex'
import VuexPersistence from 'vuex-persist'
import Product from '@/store/modules/Product'
import StoreCart from '@/store/modules/StoreCart'
import Order from '@/store/modules/Order'

const store = createStore({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    StoreCart,
    Product,
    Order,
  },
  plugins: [
    new VuexPersistence({
        storage: window.localStorage, // or window.sessionStorage or localForage instance.
        reducer: state => ({
            StoreCart: state.StoreCart
        })
    }).plugin
  ]
})

export default store
