<template>
  <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
    {{ label }}
  </label>
  <div class="mt-1 sm:mt-0 sm:col-span-2">
    <input
      class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"
      :id="id"
      :name="name"
      :type="type"
      :value="value"
      :required="required"
      ref="input"
      @input="$emit('update:modelValue', $event.target.value)"
    />
    <div v-if="error" class="mt-2 text-sm text-sys_error-700">{{ error }}</div>
  </div>
</template>

<script>
export default {
  inheritAttrs: false,
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
