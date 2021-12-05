<template>

    <Header title="Produtos" buttonText="Voltar" :buttonAction="route('productIndex')" />

    <OrderNextStatus
        v-if="order.data.status <  4"
        class="px-4 mt-6 sm:px-6 lg:px-8"
        :order="order"
        :orderStatusChanges="orderStatusChanges"
        :errors="errors"
    />

    <OrderContactInformation
        class="px-4 mt-6 sm:px-6 lg:px-8"
        :order="order"
        :errors="errors"
    />

    <OrderAddressInformation
        class="px-4 mt-6 sm:px-6 lg:px-8"
        v-if="order.data.delivery_mode == 1"
        :address="order.data.address"
        :errors="errors"
    />

    <OrderInvoice
        :products="order.data.invoice"
        class="px-4 mt-6 sm:px-6 lg:px-8"
    />

</template>

<script>
import Layout from '@/Shared/Layout'
import OrderNextStatus from '@/Pages/Order/OrderNextStatus'
import OrderAddressInformation from '@/Pages/Order/OrderAddressInformation'
import OrderContactInformation from '@/Pages/Order/OrderContactInformation'
import OrderInvoice from '@/Pages/Order/OrderInvoice'

export default {
  metaInfo: { title: 'product' },
  layout: Layout,
  components: {
    OrderNextStatus,
    OrderContactInformation,
    OrderAddressInformation,
    OrderInvoice
  },
  props: {
    errors: Object,
    order: Object,
    orderStatusChanges: Array
  },
  data() {
    return {

    }
  },
  created() {
    if (this.order) {
      this.form = this.order.data
    }
  },
  methods: {
    submit() {
      if(this.order) this.$inertia.post(route('orderUpdate', this.order.data.id), this.form)
    },
  },
}
</script>
