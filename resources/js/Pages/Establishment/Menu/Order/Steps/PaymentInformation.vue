<template>
      <form @submit.prevent="submit" class="px-4 mt-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
           <div class="flex flex-col items-center">

           <div  class="px-5 py-5 lg:w-1/2">
                <select-input-basic
                v-model="payment_mode"
                :value="0"
                :options="payment_mode_options"
                :error="errors.payment_mode"

                labelName="name"
                valueName="id"
                label="Forma de Pagamento"
            />
           </div>

            <ProductsList class="px-5 py-10 lg:w-1/2 "/>

            <span class="mx-2 my-2 px-2 py-2 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                Total no Carrinho {{ totalPrice }}
            </span>
               <span class="mx-2 my-2 px-2 py-2 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                Taxa de Entrega {{ deliveryTax }}
            </span>
               <span class="mx-2 my-2 px-2 py-2 text-sm font-medium text-green-800 bg-green-100 rounded-full">
               Valor Final {{ cartTotalPriceWithTax }}
            </span>

          </div>
        </div>

         <div class="px-4 py-4 border-b border-gray-200 flex items-center justify-center sm:px-6 lg:px-8">
           <button
            type="submit"
            class="px-2 py-2 w-3/4 text-center rounded-lg cursor-pointer lg:w-2/4 sm:w-2/4 md:w-2/4 bg-sys_primary-300 hover:bg-sys_primary-600"

          >
            Finalizar
          </button>
        </div>
        <div class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <a
                @click="goPrevious"
                class="cursor-pointer inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
            >
            Voltar
          </a>
        </div>
    </form>
</template>

<script>
import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

import SelectInputBasic from '@/Shared/SelectInputBasic'
import ProductsList from '@/Pages/Establishment/Menu/ShoppingCart/ProductList/Index'

import {
    SET_PAYMENT_MODE,
    PREVIOUS_STEP
} from '@/store/mutationsTypes/Order'

import { GET_CART_PRODUCTS_LIST, GET_CART_TOTAL_PRICE, GET_CART_TOTAL_MONEY } from '@/store/mutationsTypes/StoreCart'
import { GET_ORDER, GET_DELIVERY_MODE, GET_DELIVERY_TAX } from '@/store/mutationsTypes/Order'

export default {
  components: {
    BasicInput,
    BasicButton,
    SelectInputBasic,
    ProductsList
  },
  props: {
    user: Object,
    errors: Object,
    step: Object,
    payment_mode_options: Array
  },
  computed: {
    deliveryMode() {
      return this.$store.getters[GET_DELIVERY_MODE]
    },
    order() {
      return this.$store.getters[GET_ORDER]
    },
    cartProducts() {
      return this.$store.getters[GET_CART_PRODUCTS_LIST]
    },
    totalPrice() {
      return this.$store.getters[GET_CART_TOTAL_PRICE]
    },
    deliveryTax() {
      return this.$store.getters[GET_DELIVERY_TAX].toFormat()
    },
    cartTotalPriceWithTax() {
        let total = this.$store.getters[GET_CART_TOTAL_MONEY]
        let deliveryTax = this.$store.getters[GET_DELIVERY_TAX]
        return total.add(deliveryTax).toFormat()
    },
  },
  data() {
     return {
        payment_mode: 0
     }
  },
  methods: {
    goPrevious() {
        this.$store.dispatch(PREVIOUS_STEP, this.step)
    },
    submit() {
        this.$store.dispatch(SET_PAYMENT_MODE, this.payment_mode)

        this.$inertia.post(route('orderStore'), {...this.order, products: this.cartProducts})
    }
  },
}
</script>
