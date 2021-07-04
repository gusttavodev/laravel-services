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

import MenuHeader from '@/Pages/Establishment/Menu/MenuHeader'
import InfoCard from '@/Pages/Establishment/Menu/InfoCard'
import Products from '@/Pages/Establishment/Menu/Product/Index'
import ProductModal from '@/Pages/Establishment/Menu/Product/Modal'
import ShoppingCart from '@/Pages/Establishment/Menu/ShoppingCart/Index'

import { HAS_PRODUCT } from '@/store/mutationsTypes/Product'


export default {
  name: 'EstablishmentScreen',
  metaInfo: { title: 'establishment' },
  components: {
    MenuHeader,
    InfoCard,
    Products,
    ShoppingCart,
    ProductModal
  },
  props: {
    establishment: Object,
    categories: Object,
  },
  computed: {
    hasProduct() {
      return this.$store.getters[HAS_PRODUCT]
    },
  },
  data() {
    return {

    }
  },
  methods: {
  },
}
</script>
