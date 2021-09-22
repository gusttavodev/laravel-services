<template>
    <div>
        <ContactInformation
            :errors="errors"
        />

        <AddressInformation
            :errors="errors"
        />

        <DeliveryInformation
            :errors="errors"
            :delivery_mode_options="delivery_mode_options"
            :establishment="establishment"
        />

        <PaymentInformation
            :errors="errors"
            :payment_mode_options="payment_mode_options"
            :establishment="establishment"
        />
    </div>
</template>

<script>

import ContactInformation from '@Establishment/Menu/Order/Forms/ContactInformation.vue'
import AddressInformation from '@Establishment/Menu/Order/Forms/AddressInformation.vue'
import DeliveryInformation from '@Establishment/Menu/Order/Forms/DeliveryInformation.vue'
import PaymentInformation from '@Establishment/Menu/Order/Forms/PaymentInformation.vue'

export default {
  components: {
    ContactInformation,
    AddressInformation,
    DeliveryInformation,
    PaymentInformation
  },
  props: {
    errors: Object,
    delivery_mode_options: Array,
    payment_mode_options: Array,
    establishment: Array
  }
}
</script>
