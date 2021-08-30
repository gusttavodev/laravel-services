<template>
<div v-if="additionals.length" class="pb-5">
    <div
        class="
            text-button-txt
            bg-button-bg hover:bg-button-hover
            rounded-t-lg sticky top-0 z-10 px-8 py-2 text-sm
            font-medium border-t border-b cursor-pointer
        "
        @click="toggleAdditionalsList"
    >
    <div class="flex justify-center items-center">
        <h3 class="px-2">Adicionais</h3>
        <ChevronDoubleDownIcon v-if="!showAdditionalsList" class="w-10 h-10 text-button-text" aria-hidden="true" />
        <ChevronDoubleUpIcon   v-else class="w-10 h-10 text-button-text" aria-hidden="true"/>
    </div>
   </div>
    <nav class="block overflow-y-auto h-80 md:max-h-screen md:h-80 lg:h-80" aria-label="Directory" v-if="showAdditionalsList">
        <div class="relative">
            <div class="relative z-0 divide-y divide-gray-300 bg-gray-100">
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
  ChevronDoubleDownIcon,
  ChevronDoubleUpIcon
} from '@heroicons/vue/solid'

export default {
  name: 'AdditionalList',
  components: {
    InputCounter,
    AdditionalItem,
    ChevronDoubleDownIcon,
    ChevronDoubleUpIcon
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
