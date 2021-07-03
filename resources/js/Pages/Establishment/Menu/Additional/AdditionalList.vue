<template>
  <nav class="block overflow-y-auto h-80 md:max-h-screen md:h-80 lg:h-80" aria-label="Directory" v-if="additionals.length">
    <div class="relative">
      <div
        class="sticky top-0 z-10 px-6 py-1 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50"
      >
        <h3>Adicionais</h3>
      </div>
      <div class="relative z-0 divide-y divide-gray-200">
        <AdditionalItem
          v-for="additional in additionals"
          :key="additional.id"
          :additional="additional"
        />
      </div>
    </div>
  </nav>
</template>

<script>
import InputCounter from '@/Shared/InputCounter'
import AdditionalItem from './AdditionalItem'

export default {
  name: 'AdditionalList',
  components: {
    InputCounter,
    AdditionalItem,
  },
  props: {
    additionals: Array,
  },
  data() {
    return {}
  },
  methods: {},
}
</script>
