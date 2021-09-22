<template>
    <div class="sm:hidden">
    <label for="tabs" class="sr-only">Selecinar Produto</label>
    <select
        @change="onChangeSelect"
        id="tabs"
        name="tabs"
        class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
    >
        <option :key="category.id" v-for="category in categories" :value="category.id" >{{category.name}}</option>
    </select>
    </div>
    <div class="hidden sm:block">
    <div class="flex items-center border-b border-gray-200">
        <nav
        class="flex items-center justify-between flex-1 -mb-px space-x-6 xl:space-x-8"
        aria-label="Tabs"
        >
        <a
            v-for="category in categories"
            :key="category.id"
            @click="onChangeTab(category)"
            :aria-current="category.id == selectedCategory?.id ? 'page' : undefined"
            :class="[
            category.id == selectedCategory?.id
                ? 'border-product-bg text-product-txt'
                : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300',
                  'py-4 px-1 border-b-2 font-medium text-2xl cursor-pointer',
            ]"
        >
            {{ category.name }}
        </a>
        </nav>
    </div>
    </div>
</template>

<script>
export default {
  name: 'ProductTab',
  components: {},
  props: {
    categories: Object
  },
  data() {
    return {
        selectedCategory: {}
    }
  },
  methods: {
    onChangeSelect(event) {
        const indexOfCategory = this.categories.findIndex(o => o.id == event.target.value);
        this.selectedCategory = this.categories[indexOfCategory]
        this.$emit("onChangeTab", this.selectedCategory);
    },
    onChangeTab(category) {
        this.selectedCategory = category
        this.$emit("onChangeTab", this.selectedCategory);
    },
  },
  created(){
    this.selectedCategory = [...this.categories].shift()
    this.onChangeTab(this.selectedCategory)
  },
}
</script>
