<template>
  <div class="grid grid-cols-12 gap-4 w-full px-5 py-5">
        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.time_txt"
                :value="colors.time_txt"
                :error="errors?.colors?.time_txt"
                class="mt-10"
                :label="`Tempo ${labels.title}`"
                type="text"
                id="time_txt"
                name="time_txt"
                :required="false"
            />
        </div>
        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.time_bg"
                :value="colors.time_bg"
                :error="errors?.colors?.time_bg"
                class="mt-10"
                :label="`Tempo ${labels.text}`"
                type="text"
                id="time_bg"
                name="time_bg"
                :required="false"
            />
        </div>

        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.price_txt"
                :value="colors.price_txt"
                :error="errors?.colors?.price_txt"
                class="mt-10"
                :label="`Preço ${labels.title}`"
                type="text"
                id="price_txt"
                name="price_txt"
                :required="false"
            />
        </div>
        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.price_bg"
                :value="colors.price_bg"
                :error="errors?.colors?.price_bg"
                class="mt-10"
                :label="`Preço ${labels.text}`"
                type="text"
                id="price_bg"
                name="price_bg"
                :required="false"
            />
        </div>

        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.counter_txt"
                :value="colors.counter_txt"
                :error="errors?.colors?.counter_txt"
                class="mt-10"
                :label="`Contador ${labels.title}`"
                type="text"
                id="counter_txt"
                name="counter_txt"
                :required="false"
            />
        </div>
        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.counter_bg"
                :value="colors.counter_bg"
                :error="errors?.colors?.counter_bg"
                class="mt-10"
                :label="`Contador ${labels.text}`"
                type="text"
                id="counter_bg"
                name="counter_bg"
                :required="false"
            />
        </div>

        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.button_txt"
                :value="colors.button_txt"
                :error="errors?.colors?.button_txt"
                class="mt-10"
                :label="`Botão ${labels.title}`"
                type="text"
                id="button_txt"
                name="button_txt"
                :required="false"
            />
        </div>
        <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.button_bg"
                :value="colors.button_bg"
                :error="errors?.colors?.button_bg"
                class="mt-10"
                :label="`Botão ${labels.text}`"
                type="text"
                id="button_bg"
                name="button_bg"
                :required="false"
            />
        </div>
         <div class="lg:col-span-6 col-span-12">
                <text-input-color
                v-model="colors.button_hover"
                :value="colors.button_hover"
                :error="errors?.colors?.button_hover"
                class="mt-10"
                :label="`Botão ${labels.hover}`"
                type="text"
                id="button_hover"
                name="button_hover"
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
                time_txt       : "#1ca4e6",
                time_bg         : "#162FA1",

                price_txt                           : "#111827",
                price_bg                            : "#111827",

                button_txt                         : "#111827",
                button_bg                          : "#111827",
                button_hover                       : "#111827",

                counter_txt                           : "#111827",
                counter_bg                            : "#111827",
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
            time_txt       : this.theme.time_txt,
            time_bg         : this.theme.time_bg,

            price_txt                           : this.theme.price_txt,
            price_bg                            : this.theme.price_bg,

            button_txt                         : this.theme.button_txt,
            button_bg                          : this.theme.button_bg,
            button_hover                       : this.theme.button_hover,

            counter_txt                           : this.theme.counter_txt,
            counter_bg                            : this.theme.counter_bg,
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
