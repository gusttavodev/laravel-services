<template>
    <Modal v-if="hasProduct" :open="hasProduct" @onCloseModal="closeModal">
      <template v-slot:title>
       <div class="py-2">
            <span class="px-2 py-1 text-lg font-medium">
          {{ selectedProduct.name }}
        </span>
        <establishment-price>{{ selectedProduct.formatted_price }}</establishment-price>
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
        <establishment-price> {{ totalPrice.total }}</establishment-price>
        </div>
        </div>
      </template>
      <template v-slot:footer>
        <establishment-button
            class="w-full"
            @click="addToCart()"
        >
            Adicionar Ao Carrinho
        </establishment-button>
      </template>
    </Modal>
</template>

<script>
import Modal from '@/Shared/Modal'
import InputCounter from '@/Shared/InputCounter'

import AdditionalList from '@Establishment/Menu/Additional/AdditionalList'

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

