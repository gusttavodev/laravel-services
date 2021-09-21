<template>
    <dl class="text-gray-800 border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
        <div class="flex items-center justify-between">
            <dt class="text-sm">
                Produtos
            </dt>
            <dd class="text-sm font-medium text-gray-900">
                {{ cartInvoice.productTotal }}
            </dd>
        </div>
        <div class="flex items-center justify-between">
            <dt class="text-sm">
                Adicionais
            </dt>
            <dd class="text-sm font-medium text-gray-900">
                {{ cartInvoice.additionalTotal }}
            </dd>
        </div>
        <div class="flex items-center justify-between">
            <dt class="text-sm">
                Taxa de Entrega
            </dt>
            <dd class="text-sm font-medium text-gray-900">
                {{ deliveryTax.toFormat() }}
            </dd>
        </div>
        <div class="flex items-center justify-between border-t border-gray-200 pt-6">
            <dt class="text-base font-medium">
                Total
            </dt>
            <dd class="text-base font-medium text-gray-900">
                {{ totalWithDeliveryTax }}
            </dd>
        </div>
    </dl>
</template>

<script>

import {
    GET_DELIVERY_TAX
} from '@/store/mutationsTypes/Order'
import {
    GET_CART_TOTAL_MONEY,
    GET_INVOICE
} from '@/store/mutationsTypes/StoreCart'

export default {
  computed: {
        deliveryTax() {
        return this.$store.getters[GET_DELIVERY_TAX]
        },
        totalWithDeliveryTax() {
            let total = this.$store.getters[GET_CART_TOTAL_MONEY]
            let deliveryTax = this.$store.getters[GET_DELIVERY_TAX]
            return total.add(deliveryTax).toFormat()
        },
        cartInvoice() {
            return this.$store.getters[GET_INVOICE]
        },
  },
  components: {
  },
  data() {
    return {

    }
  },
}
</script>
