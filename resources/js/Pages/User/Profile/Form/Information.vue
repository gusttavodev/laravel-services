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
                    v-model="form.name"
                    :value="form.name"
                    :error="errors.name"
                    class="mt-10"
                    label="Nome"
                    type="text"
                    :required="true"
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.email"
                    :value="form.email"
                    :error="errors.email"
                    class="mt-10"
                    label="Email"
                    type="email"
                    :required="true"
                />
              </div>

                <div class="col-span-6 sm:col-span-3">
                    <basic-input
                    v-model="form.phone"
                    :value="form.phone"
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
</template>

<script>
import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

export default {
  components: {
    BasicInput,
    BasicButton
  },
  props: {
    user: Object,
    errors: Object,
  },
  created() {
    if (this.user) this.form = this.user.data
  },
  data() {
    return {
        form: {
            name: '',
            email: '',
            phone: ''
        }
    }
  },
  methods: {
    submit() {
      this.$inertia.put(route('profileUpdateInformation'), this.form)
    },
  },
}
</script>
