<template>
    <div class="pt-5">
        <h2 class="text-lg font-medium text-gray-900">Informações de Contato</h2>

        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
            <basic-input
                v-model="Order.contact_name"
                :value="Order.contact_name"
                :error="errors.contact_name"

                label="Nome para contato"

                name="contact-name"
                autocomplete="contact-name"
            />

            <basic-input
                v-model="Order.contact_phone"
                :value="Order.contact_phone"
                :error="errors.contact_phone"

                label="Telefone para contato"

                name="contact-phone"
                autocomplete="contact-phone"
            />
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
