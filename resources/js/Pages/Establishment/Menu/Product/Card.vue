<template>
  <li
    @click="onSelectProduct(product)"
    class="
        flex flex-col col-span-1 text-center
        transform divide-y divide-gray-200
        rounded-lg shadow-xl hover:scale-110
        motion-reduce:transform-none
        bg-product-bg
        text-product-txt
    "
  >
    <div class="flex flex-col flex-1 p-8">
      <img
        class="block w-full max-h-full rounded h-80 md:max-h-screen md:h-40 lg:h-40"
        :src="product.picture"
        alt=""
      />

      <h3 class="mt-6 text-sm font-medium text-product-title">{{ product.name }}</h3>
      <dl class="flex flex-col justify-between flex-grow mt-1">
        <dd class="mt-3">
            <establishment-price>R$ {{ product.price }}</establishment-price>
        </dd>
      </dl>
    </div>
    <div>
      <div class="flex -mt-px divide-x border-t border-product-separator">
        <button
          class=" bg-product-bg-button relative inline-flex items-center justify-center flex-1 w-0 py-4 -mr-px text-sm font-medium border border-transparent rounded-b-lg"
        >
          <ShoppingCartIcon class="w-5 h-5" aria-hidden="true" />
          <span class="ml-3">Adicionar ao carrinho</span>
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
