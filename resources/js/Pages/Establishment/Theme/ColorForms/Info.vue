<template>
  <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.info_title"
                    :value="colors.info_title"
                    :error="errors?.colors?.info_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="info_title"
                    name="info_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.info_txt"
                    :value="colors.info_txt"
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
                    v-model="colors.info_bg"
                    :value="colors.info_bg"
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
                    v-model="colors.info_icon"
                    :value="colors.info_icon"
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
                    v-model="colors.product_separator"
                    :value="colors.product_separator"
                    :error="errors?.colors?.product_separator"
                    class="mt-10"
                    :label="labels.separator"
                    type="text"
                    id="product_separator"
                    name="product_separator"
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
                info_title       : "#1ca4e6",
                info_txt         : "#162FA1",
                info_bg          : "#111827",
                info_icon        : "#111827",
                info_separator   : "#111827",
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
            info_title       : this.theme.info_title,
            info_txt         : this.theme.info_txt,
            info_bg          : this.theme.info_bg,
            info_icon        : this.theme.info_icon,
            info_separator   : this.theme.info_separator,
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
