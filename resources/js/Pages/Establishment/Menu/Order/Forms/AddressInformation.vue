<template>
    <div class="mt-10 border-t border-gray-200 pt-10">
        <h2 class="text-lg font-medium text-gray-900">Endereço para entrega</h2>

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <div class="sm:col-span-2">
                <basic-input
                    v-model="Order.zip_code"
                    :value="Order.zip_code"
                    :error="errors.zip_code"
                    class="mt-10"
                    label="CEP"
                    type="text"

                />
            </div>

            <div class="sm:col-span-2">
                <basic-input
                    v-model="Order.street"
                    :value="Order.street"
                    :error="errors.street"
                    class="mt-10"
                    label="Rua"
                    type="text"

                />
            </div>

            <div class="sm:col-span-2">
                <basic-input
                    v-model="Order.district"
                    :value="Order.district"
                    :error="errors.district"
                    class="mt-10"
                    label="Bairro"
                    type="text"

                />
            </div>

            <div class="sm:col-span-2">
                <basic-input
                    v-model="Order.city"
                    :value="Order.city"
                    :error="errors.city"
                    class="mt-10"
                    label="Cidade"
                    type="text"

                />
            </div>

            <div >
                <basic-input
                    v-model="Order.state"
                    :value="Order.state"
                    :error="errors.state"
                    class="mt-10"
                    label="Estado"
                    type="text"

                />
            </div>

            <div>
                <basic-input
                    v-model="Order.country"
                    :value="Order.country"
                    :error="errors.country"
                    class="mt-10"
                    label="País"
                    type="text"

                />
            </div>

            <div>
                <basic-input
                    v-model="Order.number"
                    :value="Order.number"
                    :error="errors.number"
                    class="mt-10"
                    label="Numero"
                    type="number"

                />
            </div>

            <div>
                <basic-input
                    v-model="Order.complement"
                    :value="Order.complement"
                    :error="errors.complement"
                    class="mt-10"
                    label="Complemento"
                    type="text"
                    :required="false"
                />
            </div>

        </div>
    </div>
</template>

<script>

import { GET_ORDER } from '@/store/mutationsTypes/Order'

import BasicInput from '@/Components/Input'

export default {
  components: {
    BasicInput
  },
  props: {
    errors: Object
  },
  computed: {
    Order() {
        return this.$store.getters[GET_ORDER]
    },
  },
}
</script>
