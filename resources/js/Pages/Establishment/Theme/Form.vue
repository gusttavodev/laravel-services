<template>
  <Header title="Produtos" buttonText="Voltar" :buttonAction="route('themeIndex')" />
  <div class="px-4 mt-4 sm:px-4 lg:px-6">
    <form @submit.prevent="submit" class="px-4 py-4 space-y-4 bg-white shadow sm:rounded-md sm:overflow-hidden sm:p-4">
      <div class="pt-8">
        <div>
          <h3 class="text-lg font-medium leading-6 text-gray-900">
            Crie seu tema
          </h3>
          <p class="mt-1 text-sm text-gray-500">
            Crie temas para serem usados nos seus estabelecimentos
          </p>
        </div>
        <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-2">
                <text-input-horizontal
                    v-model="form.name"
                    :value="form.name"
                    :error="errors.name"
                    class="mt-10"
                    label="Nome do Tema"
                    type="text"
                    id="name"
                    name="name"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.primary_color"
                    :value="form.primary_color"
                    :error="errors.primary_color"
                    class="mt-10"
                    label="Cor Primaria"
                    type="text"
                    id="primary_color"
                    name="primary_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
            <text-input-color
                    v-model="form.secondary_color"
                    :value="form.secondary_color"
                    :error="errors.secondary_color"
                    class="mt-10"
                    label="Cor Secundaria"
                    type="text"
                    id="secondary_color"
                    name="secondary_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.background_color"
                    :value="form.background_color"
                    :error="errors.background_color"
                    class="mt-10"
                    label="Cor de Fundo"
                    type="text"
                    id="background_color"
                    name="background_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.text_color"
                    :value="form.text_color"
                    :error="errors.text_color"
                    class="mt-10"
                    label="Cor do Texto"
                    type="text"
                    id="text_color"
                    name="text_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.title_text_color"
                    :value="form.title_text_color"
                    :error="errors.title_text_color"
                    class="mt-10"
                    label="Cor do Titulo"
                    type="text"
                    id="title_text_color"
                    name="title_text_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.title_text_hover_color"
                    :value="form.title_text_hover_color"
                    :error="errors.title_text_hover_color"
                    class="mt-10"
                    label="Cor Sobrepor Texto"
                    type="text"
                    id="title_text_hover_color"
                    name="title_text_hover_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.button_background_color"
                    :value="form.button_background_color"
                    :error="errors.button_background_color"
                    class="mt-10"
                    label="Cor de Fundo do Botão"
                    type="text"
                    id="button_background_color"
                    name="button_background_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.button_hover_color"
                    :value="form.button_hover_color"
                    :error="errors.button_hover_color"
                    class="mt-10"
                    label="Cor ao Sobrepor Botão"
                    type="text"
                    id="button_hover_color"
                    name="button_hover_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.button_text_color"
                    :value="form.button_text_color"
                    :error="errors.button_text_color"
                    class="mt-10"
                    label="Cor do Texto do Botão"
                    type="text"
                    id="button_text_color"
                    name="button_text_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.button_count_color"
                    :value="form.button_count_color"
                    :error="errors.button_count_color"
                    class="mt-10"
                    label="Cor do Contador de Produtos"
                    type="text"
                    id="button_count_color"
                    name="button_count_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.card_background_color"
                    :value="form.card_background_color"
                    :error="errors.card_background_color"
                    class="mt-10"
                    label="Cor de Fundo do Produto"
                    type="text"
                    id="card_background_color"
                    name="card_background_color"
                    :required="false"
                />
            </div>

            <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.card_text_color"
                    :value="form.card_text_color"
                    :error="errors.card_text_color"
                    class="mt-10"
                    label="Cor do Texto do Produto"
                    type="text"
                    id="card_text_color"
                    name="card_text_color"
                    :required="false"
                />
            </div>

              <div class="sm:col-span-2">
                <text-input-color
                    v-model="form.card_price_color"
                    :value="form.card_price_color"
                    :error="errors.card_price_color"
                    class="mt-10"
                    label="Cor do Texto do Preço"
                    type="text"
                    id="card_price_color"
                    name="card_price_color"
                    :required="false"
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
import TextAreaInput from '@/Shared/TextAreaInput'
import Header from '@/Layouts/Header'
import SelectInput from '@/Shared/SelectInput'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'
import BreezeCheckbox from '@/Components/Checkbox'

import TextInputColor from '@/Shared/TextInputColor'
import TextInputHorizontal from '@/Shared/TextInputHorizontal'


export default {
  metaInfo: { title: 'tema' },
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
    TextInputColor,
    TextInputHorizontal
  },
  props: {
    errors: Object,
    theme: Object
  },
  data() {
    return {
      form: {
        name: "",
        primary_color: "#1ca4e6",
        secondary_color: "#162FA1",
        text_color: "#111827",
        title_text_color: "#111827",
        title_text_hover_color: "#F9FAFB",
        background_color: "#F3F4F6",

        button_background_color: "#6600cc",
        button_hover_color: "#9f74c9",
        button_text_color: "#F3F4F6",
        button_count_color: "#50ed17",

        card_background_color: "#F9FAFB",
        card_text_color: "#111827",
        card_price_color: "#111827",
      },
    }
  },
  created() {
    if(this.theme) this.form = this.theme.data
  },
  methods: {
    submit() {
      if (this.theme) {
        this.$inertia.post(route('themeUpdate', this.theme.data.id), this.form)
        return
      }
      this.$inertia.post(route('themeStore'), this.form)
    },
  },
}
</script>
