<template>
  <Header title="Produtos" buttonText="Voltar" :buttonAction="route('productIndex')" />
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Criar Produtos</h3>
            <p class="mt-1 text-sm text-gray-500">Crie um produto</p>
          </div>

          <image-input
            v-model="form.picture"
            :errors="errors.picture"
            label="Foto"
            :isEdit="product"
            :defaultImageUrl="form.picture"
          />

          <text-input
            v-model="form.name"
            :value="form.name"
            :error="errors.name"
            class="mt-10"
            label="Nome"
            type="text"
            :required="false"
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

          <v-h-select
            v-model="form.categories"
            :value="form.categories"
            :options="categories.data"
            :error="errors.categories"
            class="mt-10"
            :selectedValues="form.categories"
            labelName="name"
            valueName="id"
            label="Categorias"
          />

          <v-h-select
            v-model="form.additionals"
            :value="form.additionals"
            :options="additionals.data"
            :error="errors.additionals"
            class="mt-10"
            :selectedValues="form.additionals"
            labelName="name"
            valueName="id"
            label="Adicionais"
          />

          <text-input
            v-model="form.priority"
            :value="form.priority"
            :error="errors.priority"
            class="mt-10"
            label="Prioridade"
            type="number"
            id="priority"
            name="priority"
            :required="false"
          />

          <text-area-input
            v-model="form.description"
            :value="form.description"
            :error="errors.description"
            class="mt-10"
            label="Descrição"
            type="number"
            id="description"
            name="description"
            :required="false"
          />

          <div class="block mt-4">
            <label class="flex items-center">
              <label class="block pr-4 text-sm font-medium text-gray-700 sm:mt-px">
                Habilitado
              </label>
              <v-checkbox name="enable" v-model:checked="form.enable" />
            </label>
          </div>
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
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

export default {
  metaInfo: { title: 'product' },
  layout: Layout,
  components: {
    TextInput,
    ImageInput,
    ChevronLeftIcon,
    ChevronRightIcon,
    Header,
    TextAreaInput,
  },
  props: {
    errors: Object,
    product: Object,
    categories: Object,
    additionals: Object,
  },
  data() {
    return {
      form: {
        name: null,
        priority: null,
        enable: null,
        picture: null,
        description: null,
        price: null,
        categories: null,
        additionals: null,
      },
    }
  },
  created() {
    if (this.product) {
      this.form = this.product.data
      if (this.product.data.categories) {
        this.form.categories = this.product.data.categories.map(({ id }) => id)
      }
      if (this.product.data.additionals) {
        this.form.additionals = this.product.data.additionals.map(({ id }) => id)
      }
    }
  },
  methods: {
    submit() {
      const form = this.mountForm(this.form)

      if (this.product) {
        this.$inertia.post(route('productUpdate', this.product.data.id), form)
        return
      }
      this.$inertia.post(route('productStore'), form)
    },
    selectPicture() {
      const reader = new FileReader()

      reader.onload = (e) => {
        this.photoPreview = e.target.result
      }
      reader.readAsDataURL(this.$refs.photo.files[0])
    },
    mountForm(form) {
      let picture = 0
      if (typeof this.form.picture === 'object') {
        picture = this.form.picture
      }
      let data = new FormData()
      data.append('name', form.name)
      data.append('priority', form.priority)
      data.append('price', form.price)
      data.append('description', form.description)
      data.append('enable', form.enable ? '1' : '0')
      data.append('categories', JSON.stringify(form.categories))
      data.append('additionals', JSON.stringify(form.additionals))
      data.append('picture', picture)

      return data
    },
  },
}
</script>
