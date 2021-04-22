<template>
  <div
    class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
  >
    <div class="flex-1 min-w-0">
      <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Criar Usuário</h1>
    </div>
    <div class="flex mt-4 sm:mt-0 sm:ml-4">
      <inertia-link
        :href="route('userIndex')"
        type="button"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
        >Voltar
      </inertia-link>
    </div>
  </div>

  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Infromações básicas</h3>
            <p class="mt-1 text-sm text-gray-500">Cadastre um novo usuário no sistema.</p>
          </div>
          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
          >
            <image-input
              v-model="form.picture"
              :errors="errors.picture"
              label="Foto"
              :isEdit="false"
              :defaultImageUrl="form.picture"
            />
          </div>

          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
          >
            <text-input
              v-model="form.name"
              :value="form.name"
              :error="errors.name"
              class="mt-10"
              label="Nome"
              type="text"
              :required="false"
            />
          </div>
          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
          >
            <text-input
              v-model="form.email"
              :value="form.email"
              :error="errors.email"
              class="mt-10"
              label="Email"
              type="text"
              id="email"
              name="email"
              :required="false"
            />
          </div>
          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
          >
            <text-input
              v-model="form.password"
              :value="form.password"
              :error="errors.password"
              class="mt-10"
              label="Senha"
              type="password"
              id="password"
              name="password"
              :required="false"
            />
          </div>
          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
          >
            <text-input
              v-model="form.confirm_password"
              :value="form.confirm_password"
              :error="errors.confirm_password"
              class="mt-10"
              label="Confirmar senha"
              type="password"
              id="confirm_password"
              name="confirm_password"
              :required="false"
            />
          </div>
          <div
            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
          >
            <select-input
              v-model="form.roles"
              :options="roles"
              :error="errors.roles"
              class="mt-10"
              labelName="name"
              valueName="id"
              label="Função"
            />
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
import SelectInput from '@/Shared/SelectInput'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

export default {
  metaInfo: { title: 'Users' },
  layout: Layout,
  components: {
    TextInput,
    ImageInput,
    ChevronLeftIcon,
    ChevronRightIcon,
    SelectInput,
  },
  props: {
    errors: Object,
    roles: Array,
  },
  data() {
    return {
      isEdit: false,
      form: {
        roles: null,
        name: null,
        email: null,
        password: null,
        picture: null,
        confirm_password: null,
      },
    }
  },
  methods: {
    submit() {
      const form = this.mountForm(this.form)

      this.$inertia.post(route('userStore'), form)
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
      console.log('mountForm picture ', picture)
      let data = new FormData()
      data.append('name', form.name || '')
      data.append('email', form.email || '')
      data.append('password', form.password || '')
      data.append('confirm_password', form.confirm_password || '')
      data.append('picture', picture || '')

      return data
    },
  },
}
</script>
