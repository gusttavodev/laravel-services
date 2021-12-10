<template>
     <main class="max-w-7xl mx-auto pt-16 pb-24 px-4 sm:px-6 lg:px-8">
      <div class="max-w-2xl mx-auto lg:max-w-none">
        <h1 class="sr-only">Finalize sua compra</h1>

        <form @submit.prevent="submit" class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">

          <Form
            :errors="errors"
            :delivery_mode_options="delivery_mode_options"
            :payment_mode_options="payment_mode_options"
            :establishment="establishment"
          />

          <Summary
            @finishOrder="submit"
            :errors="errors"
          />

        </form>

      </div>
    </main>
</template>

<script>
import MenuLayout from '@/Shared/MenuLayout'

import Summary from '@Establishment/Menu/Order/Summary/Summary'
import Form from '@Establishment/Menu/Order/Form'

import { GET_CART_PRODUCTS_LIST, GET_CART_TOTAL_MONEY } from '@/store/mutationsTypes/StoreCart'
import { GET_ORDER, GET_VALUE_PAID_CASH, SET_ADDRESS_INFORMATION, SET_CONTACT_INFORMATION } from '@/store/mutationsTypes/Order'

export default {
  name: 'EstablishmentOrder',
  metaInfo: { title: 'establishment' },
  layout: MenuLayout,
  components: {
    Summary, Form
  },
  props: {
    user: Object,
    errors: Object,
    delivery_mode_options: Array,
    payment_mode_options: Array,
    establishment: Array
  },
  computed: {
    valuePaidCash() {
        return this.$store.getters[GET_VALUE_PAID_CASH]
    },
    totalPrice() {
        return this.$store.getters[GET_CART_TOTAL_MONEY]
    },
    Order() {
      return this.$store.getters[GET_ORDER]
    },
    cartProducts() {
      return this.$store.getters[GET_CART_PRODUCTS_LIST]
    },
  },
  created(){
    this.$store.dispatch(SET_CONTACT_INFORMATION, {
        contact_name: this.user.data.name, contact_phone: this.user.data.phone
    })
    this.$store.dispatch(SET_ADDRESS_INFORMATION, this.user.data.address)
  },
  methods: {
    submit() {
        this.$inertia.post(route('orderStore'), {
            ...this.Order,
            products: this.cartProducts,
            establishment_id: this.establishment.data.id,

            amount_total_price: this.totalPrice.getAmount(),
            amount_value_paid_cash: this.valuePaidCash.getAmount()
        })
    }
  },
}
</script>
