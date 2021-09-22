<template>
    <div class="mt-10 border-t border-gray-200 pt-10">
        <RadioGroup v-model="Order.delivery_mode">
        <RadioGroupLabel class="text-lg font-medium text-gray-900">
            Forma de Entrega
        </RadioGroupLabel>

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <RadioGroupOption
                as="template"
                v-for="deliveryMethod in formatedDeliveryMode"
                :key="deliveryMethod.index"
                :value="deliveryMethod.index"
                v-slot="{ checked, active }"
            >
            <div
                :class="[checked ?
                 'border-transparent' :
                 'border-gray-300', active ?
                 'ring-2 ring-indigo-500' :
                 '', 'relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none'
                ]">
                <div class="flex-1 flex">
                <div class="flex flex-col">
                    <RadioGroupLabel as="span" class="block text-sm font-medium text-gray-900">
                        {{ deliveryMethod.label }}
                    </RadioGroupLabel>
                    <RadioGroupDescription as="span" class="mt-1 flex items-center text-sm text-gray-500">
                        {{ deliveryMethod.delivery_time }}
                    </RadioGroupDescription>
                    <RadioGroupDescription as="span" class="mt-6 text-sm font-medium text-gray-900">
                        R$ {{ deliveryMethod.delivery_tax }}
                    </RadioGroupDescription>
                </div>
                </div>
                <CheckCircleIcon v-if="checked" class="h-5 w-5 text-indigo-600" aria-hidden="true" />
                <div :class="[active ? 'border' : 'border-2', checked ? 'border-indigo-500' : 'border-transparent', 'absolute -inset-px rounded-lg pointer-events-none']" aria-hidden="true" />
            </div>
            </RadioGroupOption>
            <p v-if="errors.delivery_mode" class="mt-2 text-sm text-red-600" >{{ errors.delivery_mode }}</p>
        </div>
        </RadioGroup>
    </div>
</template>

<script>
import {
  RadioGroup,
  RadioGroupDescription,
  RadioGroupLabel,
  RadioGroupOption,
} from '@headlessui/vue'

import { CheckCircleIcon } from '@heroicons/vue/solid'
import { GET_ORDER } from '@/store/mutationsTypes/Order'

import {
    SET_DELIVERY_MODE
} from '@/store/mutationsTypes/Order'
export default {
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,

    CheckCircleIcon
  },
  props: {
    errors: Object,
    delivery_mode_options: Array,
    establishment: Array
  },
  watch: {
    'Order.delivery_mode': function (val) {
        this.$store.dispatch(SET_DELIVERY_MODE, {
            delivery_mode: val,
            delivery_tax: this.establishment.data.default_delivery_tax
        })
    },
  },
  computed: {
    Order() {
        return this.$store.getters[GET_ORDER]
    },
    formatedDeliveryMode(){
        return this.delivery_mode_options.map((item, index) => {
            let delivery_tax = "0.00"
            let delivery_time = ""

            if(item == this.ON_MY_ADDRESS){
                delivery_tax = this.establishment.data.default_delivery_tax
                delivery_time = this.establishment.data.delivery_time
            }

            return {
                index: index,
                label: item,
                selected: false,
                delivery_tax: delivery_tax,
                delivery_time: delivery_time
            }
        });
    },
    data() {
        return {
            ON_ESTABLISHMENT: "Retirar No Local",
            ON_MY_ADDRESS:    "Receber No Meu Endereço"
        }
    },
  }
}
</script>
