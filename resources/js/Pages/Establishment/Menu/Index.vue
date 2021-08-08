<template>
    <InfoCard :establishment="establishment.data" />

    <Products :categories="categories.data" />

    <ProductModal/>

    <ShoppingCart v-if="!hasProduct" />
</template>

<script>

import MenuHeader from '@Establishment/Menu/MenuHeader'
import InfoCard from '@Establishment/Menu/InfoCard'
import Products from '@Establishment/Menu/Product/Index'
import ProductModal from '@Establishment/Menu/Product/Modal'
import ShoppingCart from '@Establishment/Menu/ShoppingCart/Index'

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
