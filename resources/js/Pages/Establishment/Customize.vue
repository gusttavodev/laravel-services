<template>
  <Header title="Produtos" buttonText="Voltar" :buttonAction="route('establishmentIndex')" />
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
      <OpeningHourForm
        :errors="errors"
        :establishment="establishment"
        :establishmentOpeningHours="establishment.data.opening_hours"
        :daysOfWeek="daysOfWeek"
      />
  </div>

  <div class="px-4 mt-6 sm:px-6 lg:px-8">
      <AddressForm
        :errors="errors"
        :establishment="establishment"
        :establishmentAddress="establishment.data.address"
      />
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import Header from '@/Layouts/Header'
import OpeningHourForm from '@Establishment/OpeningHour/Form'
import AddressForm from '@Establishment/Address/Form'

export default {
  metaInfo: { title: 'establishment' },
  layout: Layout,
  components: {
    Header,
    OpeningHourForm,
    AddressForm
  },
  props: {
    errors: Object,
    establishment: Object,
    daysOfWeek: Object,
    establishmentAddress: Object
  },
  data() {
    return {
      form: {
        name: null,
        description: null,
        phone: null,
        picture: null,
        background_picture: null,
        delivery_time: null,
        min_value: null,
        need_confirm_order: null
      },
    }
  },
  created() {
    if(this.establishment) this.form = this.establishment.data
  },
  methods: {

  },
}
</script>
