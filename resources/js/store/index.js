import { createStore } from 'vuex'

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
})

export default store
