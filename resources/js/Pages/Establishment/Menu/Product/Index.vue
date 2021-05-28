<template>
  <div class="flex items-stretch flex-1 overflow-hidden bg-gray-100">
    <main class="flex-1 overflow-y-auto">
      <div class="px-4 pt-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex">
          <h1 class="flex-1 text-2xl font-bold text-gray-900">Produtos</h1>
        </div>

        <div class="mt-3 sm:mt-2">
            <ProductTab
                :categories="categories"
                @onChangeTab="changeCategory"
            />
        </div>


        <!-- Gallery -->
        <section class="pb-16 mt-8" aria-labelledby="gallery-heading">
          <h2 id="gallery-heading" class="sr-only">Recently viewed</h2>
          <ul
            role="list"
            class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-1 sm:gap-x-6 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 xl:gap-x-8"
          >
            <ProductCard
                v-for="product in selectedProducts"
                :key="product.id"
                :product="product"
            />

          </ul>
        </section>
      </div>
    </main>
  </div>
</template>

<script>
import { ShoppingCartIcon } from '@heroicons/vue/solid'
import ProductCard from '@/Pages/Establishment/Menu/Product/Card'
import ProductTab from '@/Pages/Establishment/Menu/Product/Tab'

export default {
  name: 'MenuHeader',
  components: {
    ShoppingCartIcon,
    ProductCard,
    ProductTab
  },
  props: {
    categories: Object
  },
  data() {
    return {
      selectedCategory: {},
      selectedProducts: {},
      tabs: [
        { name: 'Açai', href: '#', current: true },
        { name: 'Pizza', href: '#', current: false },
        { name: 'Cervejas', href: '#', current: false },
      ],
    }
  },
  methods: {
    // selectChangeCategory(event) {
    //   const category = event.target.value
    //   console.log("SELECTED PRODUCT ", category);
    //   console.log("SELECTED PRODUCT ", category.id);
    //   this.selectedCategory = category
    //   this.selectedProducts = category.products
    // },
    changeCategory(category) {
      this.selectedCategory = category
      this.selectedProducts = category.products
    },
    onSelectProduct(product) {
        onsole.log("SELECTED PRODUCT ", product);
    },
  }
}
</script>
