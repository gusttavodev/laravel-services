<template>
    <Modal v-if="showModal && cartCount > 0" :open="showModal" @onCloseModal="closeModal">
      <template v-slot:title>
       <div class="py-2">
            <span class="px-2 py-1 text-lg font-medium">
          Finalize Sua Compra
        </span>

       </div>
      </template>
      <template v-slot:body>
        <div class="flex flex-wrap justify-center">

          <div class="w-full p-1">
            <ProductsList/>
          </div>

           <div class="w-full ">
          <span class="px-2 py-1 text-lg font-medium">
          Preço Total
        </span>
        <span class="px-2 py-1 text-lg font-medium text-green-800 bg-green-100 rounded-full">
            {{ totalPrice.toFormat() }}
        </span>
          </div>
        </div>
      </template>
      <template v-slot:footer>
        <button
          type="button"
          class="flex items-center justify-center w-full h-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
            <inertia-link :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Finalizar Compra
            </inertia-link>

        </button>
      </template>
    </Modal>
</template>

<script>
import Modal from '@/Shared/Modal'
import ProductsList from '@/Pages/Establishment/Menu/ShoppingCart/ProductList/Index'

import { CART_COUNT, GET_CART_TOTAL_PRICE } from '@/store/mutationsTypes/StoreCart'

export default {
  name: 'ShoppingCartModal',
  components: {
    Modal,
    ProductsList
  },
  computed: {
    totalPrice() {
      return this.$store.getters[GET_CART_TOTAL_PRICE]
    },
    cartCount() {
      return this.$store.getters[CART_COUNT]
    }
  },
  data() {
    return {
        showModal: false
    }
  },
  methods: {
    openModal(){
       this.showModal = true
    },
    closeModal() {
      this.showModal = false
    },
    finishSell() {
        console.log("VENDA FINALIZADA");
    }
  },
}
</script>

