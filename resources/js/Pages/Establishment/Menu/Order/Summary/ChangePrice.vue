<template>
    <dl v-if="Order.payment_mode == 0"  class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">
        <div class="flex items-center justify-between">
            <dt class="text-sm">
                Precisa de troco ?
            </dt>
            <dd class="text-sm font-medium text-gray-900">
                <Switch
                    v-model="Order.need_change"
                    :class="Order.need_change ? 'bg-indigo-600' : 'bg-gray-300'"
                    class="relative inline-flex items-center h-6 rounded-full w-11"
                >
                <span class="sr-only">Precisa de troco ?</span>
                <span
                    :class="Order.need_change ? 'translate-x-6' : 'translate-x-1'"
                    class="inline-block w-4 h-4 transform bg-white rounded-full"
                />
            </Switch>
            </dd>
        </div>

        <div v-if="Order.need_change" class="flex items-center justify-between">
            <dt class="text-sm">
                Quanto vai pagar em dinheiro ?
            </dt>
            <dd class="text-sm font-medium text-gray-900">
                <MoneyInput
                    v-model="Order.value_paid_cash"
                    :value="Order.value_paid_cash"
                    :error="errors.value_paid_cash"
                    type="number"
                />
            </dd>
        </div>
    </dl>
</template>

<script>
import { Switch } from '@headlessui/vue'
import MoneyInput from '@/Components/MoneyInput'

import { GET_ORDER } from '@/store/mutationsTypes/Order'

export default {
  computed: {
    Order() {
        return this.$store.getters[GET_ORDER]
    },
  },
  components: {
    Switch,
    MoneyInput
  },
  props: {
    errors: Object
  }
}
</script>
