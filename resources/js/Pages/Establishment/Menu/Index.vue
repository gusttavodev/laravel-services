<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <div>
    <MenuHeader :establishment="establishment.data" />

    <InfoCard :establishment="establishment.data" />

    <Products v-if="!hasProduct" :categories="categories.data" />

    <Modal :open="hasProduct" @onCloseModal="closeModal">
      <template v-slot:title>
        <span class="px-2 py-1 text-lg font-medium">
          {{ selectedProduct.name }}
        </span>
        <span class="px-2 py-1 text-lg font-medium text-green-800 bg-green-100 rounded-full">
          R$ {{ selectedProduct.price }}
        </span>
      </template>
      <template v-slot:body>
        <div class="flex flex-wrap justify-center">
          <div class="">
            <img
              class="block rounded-md h-70 md:max-h-screen md:h-70 lg:h-70"
              :src="selectedProduct.picture"
              alt=""
            />
            <div class="py-5">
                <InputCounter
                    :minValue="0"
                    :maxValue="50"
                    v-model="productQuantity"
                />
            </div>
          </div>

          <div class="w-full p-1">
            <AdditionalList :additionals="selectedProduct.additionals" />
          </div>

           <div class="w-full ">
          <span class="px-2 py-1 text-lg font-medium">
          Preço Total
        </span>
        <span class="px-2 py-1 text-lg font-medium text-green-800 bg-green-100 rounded-full">
          R$ {{ selectedProduct.price }}
        </span>
          </div>
        </div>
      </template>
      <template v-slot:footer>
        <button
          type="button"
          class="flex items-center justify-center w-full h-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Adicionar Ao Carrinho
        </button>
      </template>
    </Modal>
  </div>
</template>

<script>
import Modal from '@/Shared/Modal'
import InputCounter from '@/Shared/InputCounter'

import MenuHeader from '@/Pages/Establishment/Menu/MenuHeader'
import InfoCard from '@/Pages/Establishment/Menu/InfoCard'
import Products from '@/Pages/Establishment/Menu/Product/Index'

import AdditionalList from '@/Pages/Establishment/Menu/Additional/AdditionalList'

import ProductCard from '@/Pages/Establishment/Menu/Product/Card'

import { GET_PRODUCT, DELETE_PRODUCT, HAS_PRODUCT } from '@/store/mutationsTypes/Product'

import { MinusCircleIcon, PlusCircleIcon, ChevronDoubleDownIcon } from '@heroicons/vue/solid'


export default {
  name: 'EstablishmentScreen',
  metaInfo: { title: 'establishment' },
  components: {
    AdditionalList,
    MenuHeader,
    InfoCard,
    Products,
    Modal,
    ProductCard,
    MinusCircleIcon,
    PlusCircleIcon,
    ChevronDoubleDownIcon,
    InputCounter
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
  },
  data() {
    return {
        productQuantity: 0
    }
  },
  created() {
    console.log('selectedProduct ', this.selectedProduct)
  },
  methods: {
    confirmModal() {
      //    this.$store.dispatch(ADD_ITEM, this.selectedProduct)
      //         this.closeModal()
    },
    closeModal() {
      this.selectedAdditionals = []
      this.$store.dispatch(DELETE_PRODUCT)
    },
  },
}
</script>
