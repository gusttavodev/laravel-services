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
        {{additional.quantity > 0 ? additional.formatted_price.multiply(additional.quantity).toFormat() : additional.formatted_price.toFormat() }}
      </span>
    </div>
  </li>
</template>

<script>
import InputCounter from '@/Shared/InputCounter'

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
}
</script>
