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
        <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
            <div class="col-span-12">
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

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Geral</h1>
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.general_title"
                    :value="form.colors.general_title"
                    :error="errors?.colors?.general_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="general_title"
                    name="general_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.general_txt"
                    :value="form.colors.general_txt"
                    :error="errors?.colors?.general_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="general_txt"
                    name="general_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.general_bg"
                    :value="form.colors.general_bg"
                    :error="errors?.colors?.general_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="general_bg"
                    name="general_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.general_icon"
                    :value="form.colors.general_icon"
                    :error="errors?.colors?.general_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="general_icon"
                    name="general_icon"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Cabeçalho</h1>
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.header_title"
                    :value="form.colors.header_title"
                    :error="errors?.colors?.header_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="header_title"
                    name="header_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.header_txt"
                    :value="form.colors.header_txt"
                    :error="errors?.colors?.header_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="header_txt"
                    name="header_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.header_bg"
                    :value="form.colors.header_bg"
                    :error="errors?.colors?.header_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="header_bg"
                    name="header_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.header_icon"
                    :value="form.colors.header_icon"
                    :error="errors?.colors?.header_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="header_icon"
                    name="header_icon"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Área de Informações</h1>
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.info_title"
                    :value="form.colors.info_title"
                    :error="errors?.colors?.info_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="info_title"
                    name="info_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.info_txt"
                    :value="form.colors.info_txt"
                    :error="errors?.colors?.info_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="info_txt"
                    name="info_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.info_bg"
                    :value="form.colors.info_bg"
                    :error="errors?.colors?.info_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="info_bg"
                    name="info_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.info_icon"
                    :value="form.colors.info_icon"
                    :error="errors?.colors?.info_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="info_icon"
                    name="info_icon"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.info_separator"
                    :value="form.colors.info_separator"
                    :error="errors?.colors?.info_separator"
                    class="mt-10"
                    :label="labels.separator"
                    type="text"
                    id="info_separator"
                    name="info_separator"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Exibição do Produto</h1>
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.product_title"
                    :value="form.colors.product_title"
                    :error="errors?.colors?.product_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="product_title"
                    name="product_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.product_txt"
                    :value="form.colors.product_txt"
                    :error="errors?.colors?.product_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="product_txt"
                    name="product_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.product_bg"
                    :value="form.colors.product_bg"
                    :error="errors?.colors?.product_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="product_bg"
                    name="product_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.product_icon"
                    :value="form.colors.product_icon"
                    :error="errors?.colors?.product_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="product_icon"
                    name="product_icon"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.product_separator"
                    :value="form.colors.product_separator"
                    :error="errors?.colors?.product_separator"
                    class="mt-10"
                    :label="labels.separator"
                    type="text"
                    id="product_separator"
                    name="product_separator"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Rodapé</h1>
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.footer_title"
                    :value="form.colors.footer_title"
                    :error="errors?.colors?.footer_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="footer_title"
                    name="footer_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.footer_txt"
                    :value="form.colors.footer_txt"
                    :error="errors?.colors?.footer_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="footer_txt"
                    name="footer_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.footer_bg"
                    :value="form.colors.footer_bg"
                    :error="errors?.colors?.footer_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="footer_bg"
                    name="footer_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-3 col-span-12">
                  <text-input-color
                    v-model="form.colors.footer_icon"
                    :value="form.colors.footer_icon"
                    :error="errors?.colors?.footer_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="footer_icon"
                    name="footer_icon"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Horário de Funcionamento</h1>
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="form.colors.time_txt"
                    :value="form.colors.time_txt"
                    :error="errors?.colors?.time_txt"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="time_txt"
                    name="time_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="form.colors.time_bg"
                    :value="form.colors.time_bg"
                    :error="errors?.colors?.time_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="time_bg"
                    name="time_bg"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Contador de Produtos</h1>
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="form.colors.counter_txt"
                    :value="form.colors.counter_txt"
                    :error="errors?.colors?.counter_txt"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="counter_txt"
                    name="counter_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="form.colors.counter_bg"
                    :value="form.colors.counter_bg"
                    :error="errors?.colors?.counter_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="counter_bg"
                    name="counter_bg"
                    :required="false"
                />
            </div>

             <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Preço</h1>
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="form.colors.price_txt"
                    :value="form.colors.price_txt"
                    :error="errors?.colors?.price_txt"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="price_txt"
                    name="price_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="form.colors.price_bg"
                    :value="form.colors.price_bg"
                    :error="errors?.colors?.price_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="price_bg"
                    name="price_bg"
                    :required="false"
                />
            </div>

            <div class="col-span-12">
                <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Button</h1>
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.button_txt"
                    :value="form.colors.button_txt"
                    :error="errors?.colors?.button_txt"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="button_txt"
                    name="button_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.button_bg"
                    :value="form.colors.button_bg"
                    :error="errors?.colors?.button_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="button_bg"
                    name="button_bg"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="form.colors.button_hover"
                    :value="form.colors.button_hover"
                    :error="errors?.colors?.button_hover"
                    class="mt-10"
                    :label="labels.hover"
                    type="text"
                    id="button_hover"
                    name="button_hover"
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
        colors: {
            general_title       : "#1ca4e6",
            general_txt         : "#162FA1",
            general_bg          : "#111827",
            general_icon        : "#111827",

            header_title  : "#6600cc",
            header_txt    : "#9f74c9",
            header_bg     : "#F3F4F6",
            header_icon   : "#50ed17",

            info_title       : "#F9FAFB",
            info_txt         : "#111827",
            info_bg          : "#111827",
            info_icon        : "#111827",
            info_separator   : "#111827",

            product_title                 : "#F9FAFB",
            product_txt                   : "#111827",
            product_bg                    : "#111827",
            product_icon                  : "#111827",
            product_separator             : "#111827",

            footer_title                  : "#F9FAFB",
            footer_txt                    : "#111827",
            footer_bg                     : "#111827",
            footer_icon                   : "#111827",

            time_txt                        : "#F9FAFB",
            time_bg                         : "#111827",

            button_txt                         : "#111827",
            button_bg                          : "#111827",
            button_hover                       : "#111827",

            counter_txt                           : "#111827",
            counter_bg                            : "#111827",

            price_txt                           : "#111827",
            price_bg                            : "#111827",
        }
      },
      labels: {
        title: "Titulo",
        text: "Texto",
        bg: "Fundo",
        icon: "Icones",
        separator: "Linha divisoria",
        hover: "Sobrepor",
      },
    }
  },
  created() {
    if(this.theme) this.form = this.theme.data
  },
  methods: {
    submit() {
      if (this.theme) {
          console.log("FORM ", this.form)
        this.$inertia.post(route('themeUpdate', this.theme.data.id), this.form)
        return
      }
      this.$inertia.post(route('themeStore'), this.form)
    },
  },
}
</script>
