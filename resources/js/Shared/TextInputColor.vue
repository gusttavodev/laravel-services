<template>
    <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700">
       {{ label }}
    </label>
    <div class="mt-1 row">
        <div class="flex mt-1 rounded-md shadow-sm">
            <input
                :class="{ 'opacity-50': true }"
                :disabled="true"
                class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-sys_primary-500 focus:border-sys_primary-500 sm:max-w-xs sm:text-sm"
                :id="id"
                :name="name"
                :type="type"
                :value="selectedColorHex"
                v-model="selectedColorHex"
                :required="required"
                ref="input"
            />
            <span class="relative inline-flex items-center px-4 py-2 -ml-px space-x-2 text-sm font-medium text-gray-700 border border-sys_primary-300 rounded-r-md bg-sys_primary-50 hover:bg-sys_primary-100 focus:outline-none focus:ring-1 focus:ring-sys_primary-500 focus:border-sys_primary-500">
                <popu-color-picker
                    v-model:color="selectedColor"
                />
            </span>
        </div>
    </div>
    <div v-if="error" class="mt-2 text-sm text-sys_error-700">{{ error }}</div>
</template>

<script>
export default {
  name: "TextInputColor",
  inheritAttrs: false,
   data() {
    return {
        selectedColor: {
            hex: this.value
        },
        selectedColorHex: this.value
      }
    },
    watch: {
        selectedColor: function (value) {
            this.$emit('update:modelValue', this.selectedColorHex)
            this.selectedColorHex = value.hex
        },
        selectedColorHex: function (value) {
            this.$emit('update:modelValue', this.selectedColorHex)
            this.selectedColor.hex = value
        }
    },
  props: {
    id: {
      type: String,
      default() {
        return `text-input-id`
      },
    },
    name: {
      type: String,
      default() {
        return `text-input-name`
      },
    },
    type: {
      type: String,
      default: 'text',
    },
    value: String,
    label: String,
    error: String,
    required: {
      type: Boolean,
      default() {
        return false
      },
    },
  },
  methods: {
      onChangeColor(value){
          console.log("GUSTAVO VALUE ", value);
      },
    focus() {
      this.$refs.input.focus()
    },
    select() {
      this.$refs.input.select()
    },
    setSelectionRange(start, end) {
      this.$refs.input.setSelectionRange(start, end)
    },
  },
}
</script>
