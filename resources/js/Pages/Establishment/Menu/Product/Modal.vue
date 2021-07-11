<template>
    <Modal v-if="hasProduct" :open="hasProduct" @onCloseModal="closeModal">
      <template v-slot:title>
       <div class="py-2">
            <span class="px-2 py-1 text-lg font-medium">
          {{ selectedProduct.name }}
        </span>
        <span class="px-2 py-1 text-lg font-medium text-green-800 bg-green-100 rounded-full">
        {{ selectedProduct.formatted_price}}
        </span>
       </div>
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
                    :minValue="1"
                    :maxValue="50"
                    v-model="selectedProduct.quantity"
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
            {{ totalPrice.total }}
        </span>
          </div>
        </div>
      </template>
      <template v-slot:footer>
        <button
          @click="addToCart()"
          type="button"
          class="flex items-center justify-center w-full h-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Adicionar Ao Carrinho
        </button>
      </template>
    </Modal>
</template>

<script>
import Modal from '@/Shared/Modal'
import InputCounter from '@/Shared/InputCounter'

import AdditionalList from '@/Pages/Establishment/Menu/Additional/AdditionalList'

import { GET_PRODUCT, DELETE_PRODUCT, HAS_PRODUCT, GET_TOTAL_PRICE } from '@/store/mutationsTypes/Product'

import {
    ADD_ITEM
} from "@/store/mutationsTypes/StoreCart";


export default {
  name: 'ProductModal',
  components: {
    AdditionalList,
    Modal,
    InputCounter
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
      this.$store.dispatch(DELETE_PRODUCT)
    },
    addToCart() {
        this.$store.dispatch(ADD_ITEM, this.selectedProduct);
        this.closeModal()
    }
  },
}
</script>

