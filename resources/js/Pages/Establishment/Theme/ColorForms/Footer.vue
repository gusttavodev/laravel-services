<template>
  <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.footer_title"
                    :value="colors.footer_title"
                    :error="errors?.colors?.footer_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="footer_title"
                    name="footer_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.footer_txt"
                    :value="colors.footer_txt"
                    :error="errors?.colors?.footer_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="footer_txt"
                    name="footer_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="colors.footer_bg"
                    :value="colors.footer_bg"
                    :error="errors?.colors?.footer_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="footer_bg"
                    name="footer_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-4 col-span-12">
                  <text-input-color
                    v-model="colors.footer_icon"
                    :value="colors.footer_icon"
                    :error="errors?.colors?.footer_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="footer_icon"
                    name="footer_icon"
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
                footer_title       : "#1ca4e6",
                footer_txt         : "#162FA1",
                footer_bg          : "#111827",
                footer_icon        : "#111827",
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
            footer_title       : this.theme.footer_title,
            footer_txt           : this.theme.footer_txt,
            footer_bg          : this.theme.footer_bg,
            footer_icon        : this.theme.footer_icon,
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
