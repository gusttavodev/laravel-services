<template>
<div v-if="additionals.length" class="pb-5">
    <div
        class="
            rounded-t-lg
            sticky top-0 z-10 px-8 py-2 text-sm font-medium text-gray-500 border-t border-b
            border-gray-200 bg-gray-50 hover:bg-gray-400 hover:text-gray-50  cursor-pointer
        "
        @click="toggleAdditionalsList"
    >
   <h3>Adicionais</h3>

    </div>
    <nav class="block overflow-y-auto h-80 md:max-h-screen md:h-80 lg:h-80" aria-label="Directory" v-if="showAdditionalsList">
        <div class="relative">
        <div class="relative z-0 divide-y divide-gray-200">
            <AdditionalItem
            v-for="additional in additionals"
            :key="additional.id"
            :additional="additional"
            />
        </div>
        </div>
    </nav>
</div>
</template>

<script>
import InputCounter from '@/Shared/InputCounter'
import AdditionalItem from './AdditionalItem'

import {
  ArrowCircleDownIcon
} from '@heroicons/vue/solid'

export default {
  name: 'AdditionalList',
  components: {
    InputCounter,
    AdditionalItem,
    ArrowCircleDownIcon
  },
  props: {
    additionals: Array,
  },
  data() {
    return {
        showAdditionalsList: false
    }
  },
  methods: {
    toggleAdditionalsList(){
      this.showAdditionalsList = !this.showAdditionalsList
    }
  },
}
</script>
