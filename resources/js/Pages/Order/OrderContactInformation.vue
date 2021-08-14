<template>
<div class="shadow sm:rounded-md sm:overflow-hidden">
    <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
        <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Informações Para Contato</h3>
            <p class="mt-1 text-sm text-gray-500">Essas são as informações para contato com o cliente</p>
        </div>
    <div class="grid grid-cols-6 gap-6">
           <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.contact_name"
                    :value="form.contact_name"
                    :error="errors.contact_name"
                    class="mt-10"
                    label="Nome de Contato"
                    type="text"
                    :disabled="true"
            />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <basic-input
                    v-model="form.contact_phone"
                    :value="form.contact_phone"
                    :error="errors.contact_phone"
                    class="mt-10"
                    label="Telefone de Contato"
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
    order: Object,
    errors: Object,
  },
  created() {
    if (this.order) this.form = this.order.data
  },
  data() {
     return {
        form: {
            contact_name: null,
            contact_phone: null
        },
     }
  },
  methods: {
  },
}
</script>
