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
        <div class="">
            <div class="grid grid-cols-12 gap-4 w-full py-5">
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
            </div>

            <v-tabs
                title="Editar informações do perfil"
                :tabs="tabs"
                @onChangeTab="changeTab"
            />

            <ColorsGeneral v-show="currentTab == 0" :errors="errors" :theme="form.colors" @onChange="setColors"/>
            <ColorsHeader v-show="currentTab == 1" :errors="errors" :theme="form.colors"  @onChange="setColors"/>
            <ColorsInfo v-show="currentTab == 2" :errors="errors" :theme="form.colors"  @onChange="setColors"/>
            <ColorsProduct v-show="currentTab == 3" :errors="errors" :theme="form.colors"  @onChange="setColors"/>
            <ColorsFooter v-show="currentTab == 4" :errors="errors" :theme="form.colors"  @onChange="setColors"/>
            <ColorsOther v-show="currentTab == 5" :errors="errors" :theme="form.colors"  @onChange="setColors"/>

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

import ColorsGeneral from './ColorForms/General.vue'
import ColorsHeader from './ColorForms/Header.vue'
import ColorsInfo from './ColorForms/Info.vue'
import ColorsProduct from './ColorForms/Product.vue'
import ColorsFooter from './ColorForms/Footer.vue'
import ColorsOther from './ColorForms/Other.vue'

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
    TextInputHorizontal,

    ColorsGeneral,
    ColorsHeader,
    ColorsInfo,
    ColorsProduct,
    ColorsFooter,
    ColorsOther
  },
  props: {
    errors: Object,
    theme: Object
  },
  data() {
    return {
      currentTab: 0,
      tabs: [
        { name: 'Geral', href: '#', current: true },
        { name: 'Cabeçalho', href: '#', current: false },
        { name: 'Informações', href: '#', current: false },
        { name: 'Produtos', href: '#', current: false },
        { name: 'Rodapé', href: '#', current: false },
        { name: 'Outros', href: '#', current: false },
      ],
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
        this.$inertia.post(route('themeUpdate', this.theme.data.id), this.form)
        return
      }
      this.$inertia.post(route('themeStore'), this.form)
    },
    changeTab(tab) {
      this.currentTab = tab
    },
    setColors(values){
        this.form.colors = Object.assign(this.form.colors, values);
    }
  },
}
</script>
