<template>
  <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.header_title"
                    :value="colors.header_title"
                    :error="errors?.colors?.header_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="header_title"
                    name="header_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.header_txt"
                    :value="colors.header_txt"
                    :error="errors?.colors?.header_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="header_txt"
                    name="header_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.header_bg"
                    :value="colors.header_bg"
                    :error="errors?.colors?.header_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="header_bg"
                    name="header_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.header_icon"
                    :value="colors.header_icon"
                    :error="errors?.colors?.header_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="header_icon"
                    name="header_icon"
                    :required="false"
                />
            </div>
        </div>
</template>

<script>

import TextInputColor from '@/Shared/TextInputColor'

export default {
  components: {
    TextInputColor
  },
  props: {
    errors: Object,
    theme: {
        type: Object,
        default: () =>  {
            return {
                header_title       : "#1ca4e6",
                header_txt         : "#162FA1",
                header_bg          : "#111827",
                header_icon        : "#111827",
            }
        }
    },
  },
  watch: {
        colors:{
            handler: function (val) {
                this.$emit('onChange', val)
            },
            deep: true
        }
  },
  data() {
    return {
        colors: {
            header_title       : this.theme.header_title,
            header_txt         : this.theme.header_txt,
            header_bg          : this.theme.header_bg,
            header_icon        : this.theme.header_icon,
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
  },
}
</script>
