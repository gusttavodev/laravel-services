<template>
<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Informações Para Entrega</h3>
            <p class="mt-1 text-sm text-gray-500">Esse é o endereço informado para entrega</p>
        </div>
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.zip_code"
                    :value="form.zip_code"
                    :error="errors.zip_code"
                    class="mt-10"
                    label="CEP"
                    type="text"
                    :disabled="true"
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
                    :disabled="true"
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
                   :disabled="true"
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
                    :disabled="true"
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
                    :disabled="true"
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
                   :disabled="true"
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
                    :disabled="true"
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
                    :disabled="true"
                />
            </div>

        </div>
    </div>
</div>
</template>

<script>
import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

import SelectInputBasic from '@/Shared/SelectInputBasic'

export default {
  components: {
    BasicInput,
    BasicButton,
    SelectInputBasic
  },
  props: {
    address: Object,
    errors: Object,
  },
  created() {
    if (this.address) this.form = this.address
  },
  data() {
     return {
        form: {
            zip_code: null,
            street: null,
            city: null,
            country: null,
            district: null,
            state: null,
            number: null,
            complement: null
        },
     }
  },
  methods: {
  },
}
</script>
