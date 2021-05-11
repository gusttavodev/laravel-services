<template>
  <div
    class="sm:grid sm:grid-cols-4 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
  >
    <label
      v-if="days_of_week.label"
      :for="`${id}-not_open-time`"
      class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
    >
      {{ days_of_week.label }}
    </label>
    <div class="block mt-4">
      <label class="flex items-center">
        <label class="block pr-4 text-sm font-medium text-gray-700 sm:mt-px"> Não funciona </label>
        <InputCheckBox
          :id="`${id}-not_open-time`"
          :name="`${name}-not_open-time`"
          v-model:checked="days_of_week.not_open"
          @onChangeInput="changeInputValue"
        />
      </label>
    </div>

    <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
      INICIO
      <input
        v-model="days_of_week.start_time"
        :disabled="days_of_week.not_open"
        class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm disabled:opacity-50 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"
        :id="`${id}-start-time`"
        :name="`${name}-start-time`"
        type="time"
        @input="changeInputValue"
      />
      <div v-if="days_of_week.start_time_error" class="mt-2 text-sm text-sys_error-700">{{ days_of_week.start_time_error }}</div>
    </div>

    <div class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
      FIM
      <input
        v-model="days_of_week.end_time"
        :disabled="days_of_week.not_open"
        class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm disabled:opacity-50 focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"
        :id="`${id}-end-time`"
        :name="`${name}-end-time`"
        type="time"
        @input="changeInputValue"
      />
      <div v-if="days_of_week.end_time_error" class="mt-2 text-sm text-sys_error-700">{{ days_of_week.end_time_error }}</div>
    </div>
  </div>
</template>

<script>
import InputCheckBox from '@/Components/Checkbox'
export default {
  name: 'OpeningTimeInput',
  inheritAttrs: false,
  components: {
    InputCheckBox,
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
    days_of_week: {
      type: Object,
      default() {
        return {
            day: null,
            end_time: null,
            end_time_error: null,
            label: null,
            not_open: false,
            start_time: null,
            start_time_error: null
        }
      },
    }
  },
  methods: {
    changeInputValue() {
      this.$emit('update:modelValue', this.days_of_week)
      this.$emit('onChangeInputs', this.days_of_week)
    },
  },
}
</script>
