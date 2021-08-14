<template>
  <Header title="Produtos" buttonText="Voltar" :buttonAction="route('productIndex')" />
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Editar Pedido</h3>
            <p class="mt-1 text-sm text-gray-500">Altere o Status do pedido</p>
          </div>

            <select-input-basic
                v-model="form.status"
                :value="form.status"
                :options="statusOptions"
                :error="errors.status"
                class="mt-10"
                labelName="name"
                valueName="id"
                label="Status do Pedido"
            />
        <p class="px-2 py-2 mt-1 text-sm text-gray-500">Atenção! ao alterar o status do pedido isso será informao ao cliente</p>
        </div>

        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
          <button
            type="submit"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm  bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
          >
            Salvar
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import ImageInput from '@/Shared/ImageInput'
import TextInput from '@/Shared/TextInput'
import TextAreaInput from '@/Shared/TextAreaInput'
import Header from '@/Layouts/Header'
import SelectInput from '@/Shared/SelectInput'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'
import BreezeCheckbox from '@/Components/Checkbox'
import SelectInputBasic from '@/Shared/SelectInputBasic'
export default {
  metaInfo: { title: 'product' },
  layout: Layout,
  components: {
    BreezeCheckbox,
    TextInput,
    ImageInput,
    ChevronLeftIcon,
    ChevronRightIcon,
    SelectInput,
    Header,
    TextAreaInput,
    SelectInputBasic
  },
  props: {
    errors: Object,
    order: Object,
    statusOptions: Array
  },
  data() {
    return {
      form: {
        status: null
      },
    }
  },
  created() {
    if (this.order) {
      this.form = this.order.data
    }
  },
  methods: {
    submit() {
      if(this.order) this.$inertia.post(route('orderUpdate', this.order.data.id), this.form)
    },
  },
}
</script>
