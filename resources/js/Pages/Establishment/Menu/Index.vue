<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div>
    <MenuHeader :establishment="establishment.data" />

    <InfoCard :establishment="establishment.data" />

    <Products :categories="categories.data" />

    <ProductModal/>

    <ShoppingCart v-if="!hasProduct" />
  </div>
</template>

<script>
import Modal from '@/Shared/Modal'
import InputCounter from '@/Shared/InputCounter'

import MenuHeader from '@/Pages/Establishment/Menu/MenuHeader'
import InfoCard from '@/Pages/Establishment/Menu/InfoCard'
import Products from '@/Pages/Establishment/Menu/Product/Index'
import ProductModal from '@/Pages/Establishment/Menu/Product/Modal'
import ShoppingCart from '@/Pages/Establishment/Menu/ShoppingCart/Index'

import { GET_PRODUCT, DELETE_PRODUCT, HAS_PRODUCT, GET_TOTAL_PRICE } from '@/store/mutationsTypes/Product'

import {
    ADD_ITEM
} from "@/store/mutationsTypes/StoreCart";


export default {
  name: 'EstablishmentScreen',
  metaInfo: { title: 'establishment' },
  components: {
    MenuHeader,
    InfoCard,
    Products,
    Modal,
    InputCounter,
    ProductModal,
    ShoppingCart
  },
  props: {
    establishment: Object,
    categories: Object,
  },
  computed: {
    selectedProduct() {
      return this.$store.getters[GET_PRODUCT]
    },
    hasProduct() {
      return this.$store.getters[HAS_PRODUCT]
    },
    totalPrice() {
      return this.$store.getters[GET_TOTAL_PRICE]
    },
  },
  data() {
    return {

    }
  },
  methods: {
    closeModal() {
      this.selectedAdditionals = []
      this.$store.dispatch(DELETE_PRODUCT)
    },
    addToCart() {
        this.$store.dispatch(ADD_ITEM, this.selectedProduct);
    }
  },
}
</script>
