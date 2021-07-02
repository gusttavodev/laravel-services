<template>
  <div class="flex mt-1 rounded-md shadow-sm">
    <button
      @click="downCounter"
      class="px-2 py-2 -ml-px space-x-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-l-md bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
    >
      <MinusCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
    </button>

    <input
        :disabled="true"
        :value="counter"
        class="w-full text-lg text-center border-gray-300 rounded-none focus:ring-indigo-500 focus:border-indigo-500"
    />

    <button
      @click="upCounter"
      class="px-2 py-2 -ml-px space-x-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-r-md bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500"
    >
      <PlusCircleIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
    </button>
  </div>
</template>

<script>
import { MinusCircleIcon, PlusCircleIcon } from '@heroicons/vue/solid'

export default {
  name: 'InputCounter',
  components: {
    MinusCircleIcon,
    PlusCircleIcon,
  },
  data() {
    return {
      counter: 0,
    }
  },
  props: {
    minValue: {
      type: Number,
    },
    maxValue: {
      type: Number,
    },
  },
  methods: {
    upCounter() {
      if (this.counter + 1 <= this.maxValue) {
        this.counter++
        this.$emit('update:modelValue', this.counter)
      }
    },
    downCounter() {
      if (this.counter - 1 >= this.minValue) {
        this.$emit('update:modelValue', this.counter)
        this.counter--
      }
    },
  },
}
</script>

<style></style>
