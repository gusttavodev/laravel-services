<template>
  <Header title="Usuários" buttonText="Voltar" :buttonAction="route('additionalIndex')" />
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Criar um adicional</h3>
            <p class="mt-1 text-sm text-gray-500">Crie um adicional</p>
          </div>

          <text-input
            v-model="form.name"
            :value="form.name"
            :error="errors.name"
            class="mt-10"
            label="Nome"
            type="text"
            :required="true"
          />

          <v-money
            v-model="form.price"
            :value="form.price"
            :error="errors.price"
            class="mt-10"
            label="Preço"
            type="number"
            id="price"
            name="price"
            :required="false"
          />

          <text-input
            v-model="form.quantity_limit"
            :value="form.quantity_limit"
            :error="errors.quantity_limit"
            class="mt-10"
            label="Quantidade Limite"
            type="number"
            id="quantity_limit"
            name="quantity_limit"
            :required="true"
          />

          <v-h-select
            v-model="form.products"
            :value="form.products"
            :options="products.data"
            :error="errors.products"
            class="mt-10"
            :selectedValues="form.products"
            labelName="name"
            valueName="id"
            label="Produtos"
          />
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
import Header from '@/Layouts/Header'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

export default {
  metaInfo: { title: 'Adicionais' },
  layout: Layout,
  components: {
    TextInput,
    ImageInput,
    ChevronLeftIcon,
    ChevronRightIcon,
    Header,
  },
  props: {
    errors: Object,
    products: Array,
    additional: Object,
  },
  data() {
    return {
      form: {
        name: null,
        price: null,
        quantity_limit: null,
        products: null,
      },
    }
  },
  created() {
    if (this.additional) {
      this.form = this.additional.data
      if (this.additional.data.products) {
        this.form.products = this.additional.data.products.map(({ id }) => id)
      }
    }
  },
  methods: {
    submit() {
      if (this.additional) {
        this.$inertia.post(route('additionalUpdate', this.additional.data.id), this.form)
        return
      }
      this.$inertia.post(route('additionalStore'), this.form)
    },
  },
}
</script>
