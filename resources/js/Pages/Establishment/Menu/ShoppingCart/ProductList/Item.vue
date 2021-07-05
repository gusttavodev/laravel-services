<template>
  <li
    class="grid grid-cols-5 gap-4 px-3 py-2 space-x-3 align-center hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500"
  >
    <div>
       <img class="h-16 w-16 rounded-md" :src="product.picture" alt="">
    </div>

    <div class="flex items-center justify-center">
        <div class="flex items-center">
            <div class="ml-3">
            <p class="text-center text-sm font-medium text-gray-700 group-hover:text-gray-900">
                {{ product.name }}
            </p>
            <p class="text-center text-xs font-medium text-gray-500 group-hover:text-gray-700">
                 {{ product.quantity }} X
            </p>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-center">
        <span class="text-center px-2 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
            R$ 10
        </span>
    </div>

    <div>
      <div
        v-for="additional in product.additionals"
        :key="additional.id"
        class="
            inline-flex
            items-center"
        >
        <span
        v-if="additional.quantity > 0"
        class="
            rounded-md
            text-sm
            font-medium
            bg-blue-100
            text-blue-800

            px-1
            py-0.5
            m-0.5
        "
        >
            {{ additional.quantity }}x {{ additional.name }}
        </span>
      </div>
    </div>

    <div class="flex items-center justify-center cursor-pointer" @click="removeItem">
        <XCircleIcon class="w-6 h-6 text-red-600" aria-hidden="true" />
    </div>

  </li>
</template>

<script>
import InputCounter from '@/Shared/InputCounter'
import { XCircleIcon } from '@heroicons/vue/outline'

import { REMOVE_ITEM } from '@/store/mutationsTypes/StoreCart'

export default {
  name: 'ProductListItem',
  components: {
    InputCounter,
    XCircleIcon
  },
  props: {
    product: Object,
  },
  data() {
    return {}
  },
  methods: {
      removeItem(){
        this.$store.dispatch(REMOVE_ITEM, this.product.id)
      }
  },
}
</script>
