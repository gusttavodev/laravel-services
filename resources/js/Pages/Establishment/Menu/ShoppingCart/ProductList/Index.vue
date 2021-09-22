<template>
<div v-if="cartProducts.length" class="pb-5">
    <div
        class="
            rounded-t-lg
            sticky top-0 z-10 px-8 py-2 text-sm font-medium text-gray-500 border-t border-b
            border-gray-200 bg-gray-50 hover:bg-gray-400 hover:text-gray-50  cursor-pointer
        "
        @click="toggleCartProductsList"
    >
   <div class="flex items-center justify-center">
        <h3>Produtos No Carrinho </h3>
        <establishment-price> {{ totalPrice }}</establishment-price>
   </div>

    </div>
    <nav class="block overflow-y-auto h-80 md:max-h-screen md:h-80 lg:h-80" aria-label="Directory" v-if="showProductdList">
        <div class="relative">
        <div class="relative z-0 divide-y divide-gray-200">
            <ProductItem
                v-for="(product, index) in cartProducts"
                :key="index"
                :index="index"
                :product="product"
            />
        </div>
        </div>
    </nav>
</div>
</template>

<script>
import ProductItem from '@Establishment/Menu/ShoppingCart/ProductList/Item'

import { HAS_PRODUCT } from '@/store/mutationsTypes/Product'
import { GET_CART, GET_CART_TOTAL_PRICE } from '@/store/mutationsTypes/StoreCart'

export default {
  name: 'ProductList',
  components: {
    ProductItem
  },
  props: {
    additionals: Array,
  },
   computed: {
    totalPrice() {
      return this.$store.getters[GET_CART_TOTAL_PRICE]
    },
    hasProduct() {
      return this.$store.getters[HAS_PRODUCT]
    },
    cartProducts() {
      return this.$store.getters[GET_CART]
    },
  },
  data() {
    return {
        showProductdList: true
    }
  },
  methods: {
    toggleCartProductsList(){
      this.showProductdList = !this.showProductdList
    }
  },
}
</script>
