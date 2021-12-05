<template>
<div class="mt-10 lg:mt-0 pt-5">
    <h2 class="text-lg font-medium text-gray-900">Resumo de Pedido</h2>

    <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
        <h3 class="sr-only">Produtos</h3>
        <ul role="list" class="divide-y divide-gray-200">
           <OrderItem
                v-for="(product,) in products"
                :key="product.id"
                :product="product"
            />
        </ul>

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

import OrderItem from '@/Pages/Order/OrderItem'

export default {
  props: {
    products: Array,
  },
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    Switch,
    OrderItem,
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
