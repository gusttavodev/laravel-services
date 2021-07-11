<template>
  <li
    @click="onSelectProduct(product)"
    class="flex flex-col col-span-1 text-center transform bg-white divide-y divide-gray-200 rounded-lg shadow-xl hover:scale-110 motion-reduce:transform-none"
  >
    <div class="flex flex-col flex-1 p-8">
      <img
        class="block w-full max-h-full rounded h-80 md:max-h-screen md:h-40 lg:h-40"
        :src="product.picture"
        alt=""
      />

      <h3 class="mt-6 text-sm font-medium text-gray-900">{{ product.name }}</h3>
      <dl class="flex flex-col justify-between flex-grow mt-1">
        <dt class="sr-only">Title</dt>
        <dt class="sr-only">Role</dt>
        <dd class="mt-3">
          <span class="px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full"
            >R$ {{ product.price }}</span
          >
        </dd>
      </dl>
    </div>
    <div>
      <div class="flex -mt-px divide-x divide-gray-200">
        <button
          class="relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium text-gray-700 border border-transparent rounded-bl-lg hover:text-gray-500"
        >
          <ShoppingCartIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
          <span class="ml-3">Adicionar ao Carrinho</span>
        </button>
      </div>
    </div>
  </li>
</template>

<script>
import { SET_PRODUCT } from '@/store/mutationsTypes/Product'

export default {
  name: 'ProductCard',
  components: {},
  props: {
    product: Object,
  },
  data() {
    return {}
  },
  created() {},
  methods: {
    onSelectProduct(product) {
      this.$store.dispatch(SET_PRODUCT, product)
    },
  },
}
</script>
