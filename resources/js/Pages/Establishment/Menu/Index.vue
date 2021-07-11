<template>
    <InfoCard :establishment="establishment.data" />

    <Products :categories="categories.data" />

    <ProductModal/>

    <ShoppingCart v-if="!hasProduct" />
</template>

<script>

import MenuHeader from '@/Pages/Establishment/Menu/MenuHeader'
import InfoCard from '@/Pages/Establishment/Menu/InfoCard'
import Products from '@/Pages/Establishment/Menu/Product/Index'
import ProductModal from '@/Pages/Establishment/Menu/Product/Modal'
import ShoppingCart from '@/Pages/Establishment/Menu/ShoppingCart/Index'

import { HAS_PRODUCT } from '@/store/mutationsTypes/Product'

import MenuLayout from '@/Shared/MenuLayout'

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
  layout: MenuLayout,
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
