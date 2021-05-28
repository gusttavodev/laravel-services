<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div>
    <MenuHeader
        :establishment="establishment.data"
    />

    <InfoCard
        :establishment="establishment.data"
    />

    <Products
        :categories="categories.data"
    />

  </div>
</template>

<script>

import MenuHeader from '@/Pages/Establishment/Menu/MenuHeader'
import InfoCard from '@/Pages/Establishment/Menu/InfoCard'
import Products from '@/Pages/Establishment/Menu/Product/Index'

export default {
  name: 'EstablishmentScreen',
  metaInfo: { title: 'establishment' },
  components: {
    MenuHeader,
    InfoCard,
    Products
  },
  props: {
    establishment: Object,
    categories: Object
  },
  data() {
    return {

    }
  },
  created() {
  },
  methods: {
  },
}
</script>
