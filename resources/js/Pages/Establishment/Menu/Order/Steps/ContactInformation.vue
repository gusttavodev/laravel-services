<template>
      <form @submit.prevent="submit" class="px-4 mt-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <p class="mt-1 text-sm text-gray-500">Confirme suas informações de contato</p>
          <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.contact_name"
                    :value="form.contact_name"
                    :error="errors.contact_name"
                    class="mt-10"
                    label="Nome"
                    type="text"
                    :required="true"
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.contact_phone"
                    :value="form.contact_phone"
                    :error="errors.contact_phone"
                    class="mt-10"
                    label="Telefone"
                    type="text"
                    :required="true"
                />
              </div>

          </div>
        </div>
         <div class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <a
                class="cursor-not-allowed inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
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

import {
    GET_CONTACT_INFORMATION,
    SET_CONTACT_INFORMATION,
    NEXT_STEP
} from '@/store/mutationsTypes/Order'

export default {
  components: {
    BasicInput,
    BasicButton
  },
  props: {
    user: Object,
    errors: Object,
    step: Object
  },
  computed: {
    form() {
      return this.$store.getters[GET_CONTACT_INFORMATION]
    }
  },
  created() {
    if (this.user) {
        this.$store.dispatch(SET_CONTACT_INFORMATION, {
            contact_name: this.user.name,
            contact_phone: this.user.phone
        })
    }
  },
  data() {
    return {

    }
  },
  methods: {
    submit() {
        this.$store.dispatch(SET_CONTACT_INFORMATION, this.form)

        this.$store.dispatch(NEXT_STEP, this.step)
    }
  },
}
</script>
