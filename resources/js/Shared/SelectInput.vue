<template>
  <div
    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
  >
    <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
      {{ label }}
    </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
      <Multiselect
        class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"
        mode="tags"
        noResultsText="Nenhum item encontrado"
        v-model="selectedValues"
        :label="labelName"
        :valueProp="valueName"
        :options="options"
        @change="(value) => $emit('update:modelValue', value)"
      />
      <div v-if="error" class="mt-2 text-sm text-sys_error-700">{{ error }}</div>
    </div>
  </div>
</template>

<script>
import Multiselect from '@vueform/multiselect'

export default {
  components: {
    Multiselect,
  },
  props: {
    options: {
      type: Array,
      required: true,
    },
    labelName: {
      type: String,
      default() {
        return 'name'
      },
    },
    valueName: {
      type: Array,
      default() {
        return 'id'
      },
    },
    label: {
      type: String,
      default() {
        return ''
      },
    },
    error: {
      type: String,
      default() {
        return ''
      },
    },
  },
  data() {
    return {
      selectedValues: null,
    }
  },
  methods: {},
}
</script>
<style>
.multiselect {
  margin: 0 !important;
}
</style>
<style src="@vueform/multiselect/themes/default.css"></style>
