<template>
      <form @submit.prevent="submit" class="px-4 mt-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <p class="mt-1 text-sm text-gray-500">Confirme suas informações para entrega</p>
          <h3 v-if="delivery_mode == 1">Taxa de Entrega: R$ {{ establishment.data.default_delivery_tax  }}</h3>
           <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <select-input-basic
                    v-model="delivery_mode"
                    :value="1"
                    :options="delivery_mode_options"
                    :error="errors.delivery_mode"
                    class="mt-10"
                    labelName="name"
                    valueName="id"
                    label="Forma de Entrega"
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.zip_code"
                    :value="form.zip_code"
                    :error="errors.zip_code"
                    class="mt-10"
                    label="CEP"
                    type="text"
                    :required="true"
                />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.street"
                    :value="form.street"
                    :error="errors.street"
                    class="mt-10"
                    label="Rua"
                    type="text"
                    :required="true"
                />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.district"
                    :value="form.district"
                    :error="errors.district"
                    class="mt-10"
                    label="Bairro"
                    type="text"
                    :required="true"
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.city"
                    :value="form.city"
                    :error="errors.city"
                    class="mt-10"
                    label="Cidade"
                    type="text"
                    :required="true"
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.state"
                    :value="form.state"
                    :error="errors.state"
                    class="mt-10"
                    label="Estado"
                    type="text"
                    :required="true"
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.country"
                    :value="form.country"
                    :error="errors.country"
                    class="mt-10"
                    label="País"
                    type="text"
                    :required="true"
                />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.number"
                    :value="form.number"
                    :error="errors.number"
                    class="mt-10"
                    label="Numero"
                    type="number"
                    :required="true"
                />
           </div>

           <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.complement"
                    :value="form.complement"
                    :error="errors.complement"
                    class="mt-10"
                    label="Complemento"
                    type="text"
                    :required="false"
                />
            </div>

          </div>
        </div>
        <div class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <a
                @click="goPrevious"
                class="cursor-pointer inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
            >
            Voltar
          </a>
          <button
            type="submit"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
          >
            Próxima
          </button>
        </div>
    </form>
</template>

<script>
import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

import SelectInputBasic from '@/Shared/SelectInputBasic'

import {
    GET_ADDRESS_INFORMATION,

    SET_ADDRESS_INFORMATION,
    SET_DELIVERY_MODE,

    NEXT_STEP,
    PREVIOUS_STEP
} from '@/store/mutationsTypes/Order'

export default {
  components: {
    BasicInput,
    BasicButton,
    SelectInputBasic
  },
  props: {
    user: Object,
    errors: Object,
    step: Object,
    delivery_mode_options: Array,
    establishment: Array
  },
  computed: {
    form() {
        return this.$store.getters[GET_ADDRESS_INFORMATION]
    }
  },
  created() {
    if (this.user) {
        this.$store.dispatch(SET_ADDRESS_INFORMATION, this.user.address)
    }
  },
  data() {
     return {
        delivery_mode: 1
     }
  },
  methods: {
    goPrevious() {
        this.$store.dispatch(PREVIOUS_STEP, this.step)
    },
    submit() {
        this.$store.dispatch(SET_ADDRESS_INFORMATION, this.form)
        this.$store.dispatch(SET_DELIVERY_MODE, {delivery_mode: this.delivery_mode, delivery_tax: this.establishment.data.default_delivery_tax})
        this.$store.dispatch(NEXT_STEP, this.step)

    }
  },
}
</script>
