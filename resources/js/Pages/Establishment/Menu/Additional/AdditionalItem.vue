<template>
  <li
    class="grid grid-cols-3 gap-4 px-6 py-5 space-x-3 align-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500"
  >
    <div>
      <span class="px-2 py-1 text-sm font-medium">
        {{ additional.name }}
      </span>
    </div>

    <div>
      <InputCounter
        :minValue="0"
        :maxValue="additional.quantity_limit"
        v-model="additional.quantity"
      />
    </div>

    <div>
      <span class="px-2 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
        {{ additionalPrice }}
      </span>
    </div>
  </li>
</template>

<script>
import InputCounter from '@/Shared/InputCounter'
import MoneyService from '@/Services/MoneyService'

export default {
  name: 'AdditionalItem',
  components: {
    InputCounter,
  },
  props: {
    additional: Object,
  },
  data() {
    return {}
  },
  methods: {},
  computed: {
    additionalPrice: function () {
        let additionalPrice =  MoneyService.convertFloatToMoney(this.additional.price)

        if(this.additional.quantity == 0 ||this.additional.quantity == null) return additionalPrice.multiply(1).toFormat()
        if(this.additional.quantity > 0) return additionalPrice.multiply(this.additional.quantity).toFormat()

        return MoneyService.convertFloatToMoney("0.00").toFormat()
    }
  }
}
</script>
