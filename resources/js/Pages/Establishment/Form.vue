<template>
  <Header title="Produtos" buttonText="Voltar" :buttonAction="route('establishmentIndex')" />
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Criar Produtos</h3>
            <p class="mt-1 text-sm text-gray-500">Crie um produto</p>
          </div>
            <div
            class="sm:grid sm:grid-cols-2 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
            >
                <image-input
                v-model="form.picture"
                :errors="errors.picture"
                label="Foto"
                :isEdit="establishment"
                :defaultImageUrl="form.picture"
                />

                <image-input
                v-model="form.background_picture"
                :errors="errors.background_picture"
                label="Foto de Fundo"
                :isEdit="establishment"
                :defaultImageUrl="form.background_picture"
                />
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

           <text-input
            v-model="form.phone"
            :value="form.phone"
            :error="errors.phone"
            class="mt-10"
            label="Telefone"
            type="text"
            :required="true"
          />

           <text-input
            v-model="form.delivery_time"
            :value="form.delivery_time"
            :error="errors.delivery_time"
            class="mt-10"
            label="Tempo médio de entrega"
            type="number"
            id="delivery_time"
            name="delivery_time"
            :required="true"
          />

          <text-input
            v-model="form.min_value"
            :value="form.min_value"
            :error="errors.min_value"
            class="mt-10"
            label="Preço"
            type="number"
            id="min_value"
            name="min_value"
            :required="true"
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
            :required="true"
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
            :required="true"
          />

          <div class="block mt-4">
            <label class="flex items-center">
              <label class="block pr-4 text-sm font-medium text-gray-700 sm:mt-px">
                Precisa confirmar o pedido ?
              </label>
              <breeze-checkbox name="need_confirm_order" v-model:checked="form.need_confirm_order" />
            </label>
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

export default {
  metaInfo: { title: 'establishment' },
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
  },
  props: {
    errors: Object,
    establishment: Object
  },
  data() {
    return {
      form: {
        name: null,
        description: null,
        phone: null,
        picture: null,
        background_picture: null,
        delivery_time: null,
        min_value: null,
        need_confirm_order: null
      },
    }
  },
  created() {
    if(this.establishment) this.form = this.establishment.data
  },
  methods: {
    submit() {
      const form = this.mountForm(this.form)

      if (this.establishment) {
        this.$inertia.post(route('establishmentUpdate', this.establishment.data.id), form)
        return
      }
      this.$inertia.post(route('establishmentStore'), form)
    },
    selectPicture() {
      const reader = new FileReader()

      reader.onload = (e) => {
        this.photoPreview = e.target.result
      }
      reader.readAsDataURL(this.$refs.photo.files[0])
    },
    mountForm(form) {
      let picture = false
      let background_picture = false

      if (typeof this.form.picture === 'object') {
        picture = this.form.picture
      }
       if (typeof this.form.background_picture === 'object') {
        background_picture = this.form.background_picture
      }

      let data = new FormData()
      data.append('name', form.name)
      data.append('min_value', form.min_value)
      data.append('delivery_time', form.delivery_time)
      data.append('phone', form.phone)
      data.append('description', form.description)
      data.append('picture', picture)
      data.append('background_picture', background_picture)
      data.append('need_confirm_order', form.need_confirm_order ? '1' : '0')


      return data
    },
  },
}
</script>
