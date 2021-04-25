<template>
  <Header title="Usuários" buttonText="Voltar" :buttonAction="route('userIndex')" />
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Infromações básicas</h3>
            <p class="mt-1 text-sm text-gray-500">Cadastre um novo usuário no sistema.</p>
          </div>

          <image-input
            v-model="form.picture"
            :errors="errors.picture"
            label="Foto"
            :isEdit="user"
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
          <div class="block mt-4">
            <label class="flex items-center">
              <label class="block pr-4 text-sm font-medium text-gray-700 sm:mt-px">
                Habilitado
              </label>
              <breeze-checkbox name="enable" v-model:checked="form.enable" />
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
import Header from '@/Layouts/Header'
import SelectInput from '@/Shared/SelectInput'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'
import BreezeCheckbox from '@/Components/Checkbox'

export default {
  metaInfo: { title: 'Users' },
  layout: Layout,
  components: {
    BreezeCheckbox,
    TextInput,
    ImageInput,
    ChevronLeftIcon,
    ChevronRightIcon,
    SelectInput,
    Header,
  },
  props: {
    errors: Object,
    user: Object,
  },
  data() {
    return {
      form: {
        name: null,
        priority: null,
        enable: null,
        picture: null,
      },
    }
  },
  created() {
    if (this.user) this.form = this.user.data
  },
  methods: {
    submit() {
      const form = this.mountForm(this.form)

      this.$inertia.post(route('categoryStore'), form)
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
      if (typeof this.form.picture === 'object') {
        picture = this.form.picture
      }

      let data = new FormData()
      data.append('name', form.name || '')
      data.append('priority', form.priority || '')
      data.append('enable', form.enable ? '1' : '0')
      data.append('picture', picture || '')

      return data
    },
  },
}
</script>
