<template>
    <div class="mt-10 border-t border-gray-200 pt-10">
        <h2 class="text-lg font-medium text-gray-900">Forma de pagamento</h2>

        <fieldset class="mt-4">
            <legend class="sr-only">Forma de pagamento type</legend>
            <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
                <div
                    v-for="(paymentMethod, paymentMethodIdx) in formatedPaymentMode"
                    :key="paymentMethodIdx"
                    class="flex items-center"
                >
                    <input
                        @change="setPaymentMode(paymentMethod.index)"
                        :id="paymentMethod.index"
                        name="payment-type"
                        type="radio"
                        class="focus:ring-indigo-500 h-7 w-7 text-indigo-600 border-gray-300"
                    />

                    <label :for="paymentMethod.id" class="ml-3 block text-sm font-medium text-gray-700">
                        {{ paymentMethod.label }}
                    </label>

                </div>
            </div>
            <p v-if="errors.payment_mode" class="mt-2 text-sm text-red-600" >{{ errors.payment_mode }}</p>
        </fieldset>
    </div>
</template>

<script>
import {
    SET_PAYMENT_MODE
} from '@/store/mutationsTypes/Order'


export default {
  props: {
    errors: Object,
    payment_mode_options: Array,
    establishment: Array
  },
  computed: {
    formatedPaymentMode(){
        return this.payment_mode_options.map((item, index) => {
            return {
                index: index,
                label: item,
                selected: false
            }
        });
    }
  },
  methods: {
    setPaymentMode(index){
        this.$store.dispatch(SET_PAYMENT_MODE, index)
    }
  },
}
</script>
