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
          <div class="bg-blue-800">
              <img
              class="block rounded-md h-80 md:max-h-screen md:h-80 lg:h-80"
              :src="selectedProduct.picture"
              alt=""
            />
            <div class="flex items-center justify-center bg-purple-500 align-center">
              <button
                class="relative inline-flex items-center px-4 py-2 space-x-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-l-lg bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
              >
                <MinusCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              </button>
              <div class="text-center pt-3.5 pb-5 pl-2 mr-2 sm:text-sm">Quantidade: 5</div>
              <button
                class="relative inline-flex items-center px-4 py-2 space-x-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
              >
                <PlusCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              </button>
            </div>

          </div>

          <div class="flex items-center bg-red-500 align-center">
            <h1>Escolha seus adicionar</h1>
            <button
              class="relative inline-flex items-center px-4 py-2 space-x-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-l-lg bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
            >
              <MinusCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
            </button>
            <div class="text-center pt-3.5 pb-5 pl-2 mr-2 sm:text-sm">Quantidade: 5</div>
            <button
              class="relative inline-flex items-center px-4 py-2 space-x-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-r-lg bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
            >
              <PlusCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
            </button>
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
import MenuHeader from '@/Pages/Establishment/Menu/MenuHeader'
import InfoCard from '@/Pages/Establishment/Menu/InfoCard'
import Products from '@/Pages/Establishment/Menu/Product/Index'

import ProductCard from '@/Pages/Establishment/Menu/Product/Card'

import { GET_PRODUCT, DELETE_PRODUCT, HAS_PRODUCT } from '@/store/mutationsTypes/Product'

import { MinusCircleIcon, PlusCircleIcon, ChevronDoubleDownIcon } from '@heroicons/vue/solid'

export default {
  name: 'EstablishmentScreen',
  metaInfo: { title: 'establishment' },
  components: {
    MenuHeader,
    InfoCard,
    Products,
    Modal,
    ProductCard,
    MinusCircleIcon,
    PlusCircleIcon,
    ChevronDoubleDownIcon,
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
    return {}
  },
  created() {},
  methods: {
    confirmModal() {
      //    this.$store.dispatch(ADD_ITEM, this.selectedProduct)
      //         this.closeModal()
    },
    closeModal() {
      console.log('CHAMOU O CLOSE ')
      this.selectedAdditionals = []
      this.$store.dispatch(DELETE_PRODUCT)
    },
  },
}
</script>
