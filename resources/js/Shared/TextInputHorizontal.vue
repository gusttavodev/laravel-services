<template>
    <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700">
       {{ label }}
    </label>
    <div class="mt-1">
        <input
            :id="id"
            :name="name"
            :type="type"
            :value="value"
            :required="required"
            ref="input"
            @input="$emit('update:modelValue', $event.target.value)"
            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        />
    </div>
    <div v-if="error" class="mt-2 text-sm text-sys_error-700">{{ error }}</div>
</template>

<script>
export default {
  name: 'TextInputHorizontal',
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
