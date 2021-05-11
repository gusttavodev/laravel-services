<template>
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Endereço</h3>
            <p class="mt-1 text-sm text-gray-500">Configure Endereço do Estabelecimento</p>
          </div>

          <text-input
            v-model="form.zip_code"
            :value="form.zip_code"
            :error="errors.zip_code"
            class="mt-10"
            label="CEP"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.street"
            :value="form.street"
            :error="errors.street"
            class="mt-10"
            label="Rua"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.district"
            :value="form.district"
            :error="errors.district"
            class="mt-10"
            label="Bairro"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.city"
            :value="form.city"
            :error="errors.city"
            class="mt-10"
            label="Cidade"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.state"
            :value="form.state"
            :error="errors.state"
            class="mt-10"
            label="Estado"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.country"
            :value="form.country"
            :error="errors.country"
            class="mt-10"
            label="País"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.country"
            :value="form.country"
            :error="errors.country"
            class="mt-10"
            label="País"
            type="text"
            :required="true"
          />

          <text-input
            v-model="form.number"
            :value="form.number"
            :error="errors.number"
            class="mt-10"
            label="Numero"
            type="number"
            :required="true"
          />

          <text-input
            v-model="form.complement"
            :value="form.complement"
            :error="errors.complement"
            class="mt-10"
            label="Complemento"
            type="text"
            :required="false"
          />
        </div>
        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
          <button
            type="submit"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
          >
            Salvar
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker'
import TextInput from '@/Shared/TextInput'
import OpeningTimeInput from '@/Shared/OpeningTimeInput'

export default {
  name: 'OpeningHourForm',
  components: {
    Datepicker,
    TextInput,
    OpeningTimeInput,
  },
  props: {
    errors: Object,
    establishment: Object,
    establishmentAddress: Object,
  },
  data() {
    return {
      form: {
        establishment_id: this.establishment.data.id,
        zip_code: null,
        street: null,
        city: null,
        country: null,
        district: null,
        state: null,
        number: null,
        complement: null,
      },
    }
  },
  mounted() {
    console.log("establishmentAddress ", this.establishmentAddress);
    if (this.establishmentAddress.data) this.form = this.establishmentAddress.data
  },
  methods: {
    submit() {
        this.$inertia.post(route('establishmentAddressStore'), this.form)
    },
  },
}
</script>
