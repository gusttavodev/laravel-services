<template>
      <form @submit.prevent="submit" class="px-4 mt-6 sm:px-6 lg:px-8">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Informações de acesso</h3>
            <p class="mt-1 text-sm text-gray-500">Configure suas informações de acesso</p>
          </div>
          <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="formInfo.name"
                    :value="formInfo.name"
                    :error="errors.name"
                    class="mt-10"
                    label="Nome"
                    type="text"
                    :required="true"
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="formInfo.email"
                    :value="formInfo.email"
                    :error="errors.email"
                    class="mt-10"
                    label="Email"
                    type="email"
                    :required="true"
                />
              </div>

                <div class="col-span-6 sm:col-span-3">
                    <basic-input
                    v-model="formInfo.phone"
                    :value="formInfo.phone"
                    :error="errors.phone"
                    class="mt-10"
                    label="Telefone"
                    type="text"
                    :required="true"
                    />
                </div>
          </div>
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
    <form @submit.prevent="submit" class="px-4 mt-6 sm:px-6 lg:px-8">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Endereço de entrega</h3>
            <p class="mt-1 text-sm text-gray-500">Configure o endereço para entrega</p>
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

</template>

<script>
import Layout from '@/Shared/Layout'

import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

export default {
  metaInfo: { title: 'Users' },
  layout: Layout,
  components: {
    BasicInput,
    BasicButton
  },
  props: {
    user: Object,
    errors: Object,
  },
  created() {
    console.log("this.user ", this.user.data)
    if (this.user) this.form = this.user.data
    console.log("this.user ", this.form)
  },
  data() {
    return {
        formInfo: {
            name: '',
            email: '',
            phone: ''
        },
        formAddress: {
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
    submit() {
      this.$inertia.post(route('userStore'), form)
    },
  },
}
</script>
