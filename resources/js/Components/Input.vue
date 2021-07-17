<template>
    <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700">
        {{ label }}
    </label>
    <div class="mt-1 relative rounded-md shadow-sm">
      <input
        :class="[error ?
            'border-red-300 text-red-900 placeholder-red-300  focus:ring-red-500 focus:border-red-500' :
            'border-indigo-300 text-indigo-900 placeholder-indigo-300  focus:ring-indigo-500 focus:border-indigo-500'
        ]"
        class="block w-full pr-10 focus:outline-none sm:text-sm rounded-md"
        :id="id"
        :name="name"
        :type="type"
        :value="value"
        :required="required"
        ref="input"
         @input="$emit('update:modelValue', $event.target.value)"
      />
      <div v-if="error" class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <ExclamationCircleIcon class="h-5 w-5 text-red-500" aria-hidden="true" />
      </div>
    </div>
    <p v-if="error" class="mt-2 text-sm text-red-600" :id="`${id}-error`">{{ error }}</p>

</template>


<script>
import { ExclamationCircleIcon } from '@heroicons/vue/solid'
export default {
  inheritAttrs: false,
  components: {ExclamationCircleIcon},
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


