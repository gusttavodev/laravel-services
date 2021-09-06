<template>
  <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.general_title"
                    :value="colors.general_title"
                    :error="errors?.colors?.general_title"
                    class="mt-10"
                    :label="labels.title"
                    type="text"
                    id="general_title"
                    name="general_title"
                    :required="false"
                />
            </div>
             <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.general_txt"
                    :value="colors.general_txt"
                    :error="errors?.colors?.general_txt"
                    class="mt-10"
                    :label="labels.text"
                    type="text"
                    id="general_txt"
                    name="general_txt"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.general_bg"
                    :value="colors.general_bg"
                    :error="errors?.colors?.general_bg"
                    class="mt-10"
                    :label="labels.bg"
                    type="text"
                    id="general_bg"
                    name="general_bg"
                    :required="false"
                />
            </div>
            <div class="lg:col-span-6 col-span-12">
                  <text-input-color
                    v-model="colors.general_icon"
                    :value="colors.general_icon"
                    :error="errors?.colors?.general_icon"
                    class="mt-10"
                    :label="labels.icon"
                    type="text"
                    id="general_icon"
                    name="general_icon"
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
                general_title       : "#1ca4e6",
                general_txt         : "#162FA1",
                general_bg          : "#111827",
                general_icon        : "#111827",
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
            general_title       : this.theme.general_title,
            general_txt         : this.theme.general_txt,
            general_bg          : this.theme.general_bg,
            general_icon        : this.theme.general_icon,
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
