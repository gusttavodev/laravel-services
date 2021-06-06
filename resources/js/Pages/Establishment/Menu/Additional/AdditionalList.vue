<template>
  <nav class="block overflow-y-auto h-80 md:max-h-screen md:h-80 lg:h-80" aria-label="Directory">
    <div class="relative">
      <div
        class="sticky top-0 z-10 px-6 py-1 text-sm font-medium text-gray-500 border-t border-b border-gray-200 bg-gray-50"
      >
        <h3>Adicionais</h3>
      </div>
      <ul class="relative z-0 divide-y divide-gray-200">
        <li v-for="additional in additionals" :key="additional.id" class="bg-white">
          <div
            class="grid grid-cols-3 gap-4 px-6 py-5 space-x-3 align-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500"
          >
            <div>
              <span class="px-2 py-1 text-sm font-medium">
                {{ additional.name }}
              </span>
            </div>

            <div>
              <InputCounter
                :minValue="0"
                :maxValue="additional.quantity_limit"
                v-model="additional.quantity"
              />
            </div>

            <div>
              <span class="px-2 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                R$ {{ additional.price }}
              </span>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import InputCounter from '@/Shared/InputCounter'

export default {
  name: 'AdditionalList',
  components: {
    InputCounter,
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
