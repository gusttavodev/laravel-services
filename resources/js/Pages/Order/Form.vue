<template>

    <Header title="Produtos" buttonText="Voltar" :buttonAction="route('productIndex')" />

    <ChangeStatus
        class="px-4 mt-6 sm:px-6 lg:px-8"
        :order="order"
        :statusOptions="statusOptions"
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

</template>

<script>
import Layout from '@/Shared/Layout'
import ChangeStatus from '@/Pages/Order/ChangeStatus'
import OrderAddressInformation from '@/Pages/Order/OrderAddressInformation'
import OrderContactInformation from '@/Pages/Order/OrderContactInformation'

export default {
  metaInfo: { title: 'product' },
  layout: Layout,
  components: {
    ChangeStatus,
    OrderContactInformation,
    OrderAddressInformation
  },
  props: {
    errors: Object,
    order: Object,
    statusOptions: Array
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
