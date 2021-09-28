<template>
  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Tema</h3>
            <p class="mt-1 text-sm text-gray-500">Escolha o tema para seu estabelecimento</p>
          </div>



        <label for="quantity" class="sr-only">Quantidade</label>
        <select
            @change="changeTheme"
            class="
                w-full rounded-md border border-gray-300 text-base font-medium text-gray-700
                text-left shadow-sm focus:outline-none focus:ring-1
                focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
            ">
            <option
                :value="theme.id"
                v-for="theme in themesOptions"
                :key="theme.id"
            >
                {{ theme.name }}
            </option>

        </select>



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
export default {
  name: 'ThemeSelect',
  props: {
    errors: Object,
    establishment: Object,
    establishmentTheme: Object,
    themesOptions: Array
  },
  data() {
    return {
      form: {
        theme_id: null,
        establishment_id: null,
      },
    }
  },
  created() {
    if (this.establishmentTheme) this.form.theme_id = this.establishmentTheme.id
    if (this.establishment) this.form.establishment_id = this.establishment.data.id
  },
  methods: {
    changeTheme(event){
        this.form.theme_id = event.target.value
    },
    submit() {
        this.$inertia.post(route('establishmentThemeStore'), this.form)
    },
  },
}
</script>
