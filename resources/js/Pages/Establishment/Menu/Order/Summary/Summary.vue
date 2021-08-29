<template>
<div class="mt-10 lg:mt-0">
    <h2 class="text-lg font-medium text-gray-900">Resumo de Pedido</h2>

    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h3 class="sr-only">Items in your cart</h3>
        <ul role="list" class="divide-y divide-gray-200">
            <SummaryItem
                v-for="(product, index) in cartProducts"
                :key="product.id"
                :productIndex="index"
                :product="product"
            />
        </ul>

        <SummaryInvoice/>

        <ChangePrice :errors="errors" />

        <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
            <establishment-button
                @click="$emit('finishOrder')"
                class="w-full"
            >
                Finalizar Compra
            </establishment-button>
        </div>
    </div>
</div>
</template>

<script>
import {
  RadioGroup,
  RadioGroupDescription,
  RadioGroupLabel,
  RadioGroupOption,
  Switch
} from '@headlessui/vue'

import { MenuIcon, QuestionMarkCircleIcon, SearchIcon, ShoppingBagIcon, XIcon } from '@heroicons/vue/outline'
import { CheckCircleIcon, TrashIcon } from '@heroicons/vue/solid'

import { HAS_PRODUCT } from '@/store/mutationsTypes/Product'
import { GET_CART, GET_CART_TOTAL_PRICE } from '@/store/mutationsTypes/StoreCart'

import SummaryItem from '@Establishment/Menu/Order/Summary/SummaryItem'
import SummaryInvoice from '@Establishment/Menu/Order/Summary/SummaryInvoice'
import ChangePrice from '@Establishment/Menu/Order/Summary/ChangePrice'

export default {
  computed: {
        totalPrice() {
            return this.$store.getters[GET_CART_TOTAL_PRICE]
        },
        hasProduct() {
            return this.$store.getters[HAS_PRODUCT]
        },
        cartProducts() {
            return this.$store.getters[GET_CART]
        },
  },
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    Switch,

    MenuIcon, QuestionMarkCircleIcon,
    CheckCircleIcon, TrashIcon,
    SearchIcon, ShoppingBagIcon, XIcon,

    SummaryItem,
    SummaryInvoice,
    ChangePrice
  },
  props: {
    errors: Object
  },
  data() {
    return {
        form: {
            contact_phone: "",
            contact_name: "",

            address: {
                zip_code: "",
                street: "",
                city: "",
                country: "",
                district: "",
                state: "",
                number: "",
                complement: "",
                latitude: "",
                longitude: ""
            },

            delivery_tax: "0.00",

            delivery_mode: null,
            payment_mode: null,

            need_change: false,
            change_price: "0.00",
            value_paid_cash: "0.00"
        },
    }
  },
}
</script>
