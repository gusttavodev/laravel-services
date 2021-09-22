<template>
    <div class="flow-root">
        <ul role="list" class="-my-6 divide-y divide-product-separator">
            <Item
                v-for="product in cartProducts"
                :key="product.id"
                :product="product"
            />
        </ul>
    </div>
</template>

<script>

import { HAS_PRODUCT } from '@/store/mutationsTypes/Product'
import { GET_CART, GET_CART_TOTAL_PRICE } from '@/store/mutationsTypes/StoreCart'

import Item from '@Establishment/Menu/Product/Item'

export default {
  components: {
    Item
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
}
</script>
