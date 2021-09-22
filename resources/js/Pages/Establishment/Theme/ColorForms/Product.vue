<template>
  <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.product_title"
                    :value="colors.product_title"
                    :error="errors?.colors?.product_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="product_title"
                    name="product_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.product_txt"
                    :value="colors.product_txt"
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
                    v-model="colors.product_bg"
                    :value="colors.product_bg"
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
                    v-model="colors.product_icon"
                    :value="colors.product_icon"
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
                product_title       : "#1ca4e6",
                product_txt         : "#162FA1",
                product_bg          : "#111827",
                product_icon        : "#111827",
                product_separator   : "#111827",
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
            product_title       : this.theme.product_title,
            product_txt         : this.theme.product_txt,
            product_bg          : this.theme.product_bg,
            product_icon        : this.theme.product_icon,
            product_separator   : this.theme.product_separator
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
