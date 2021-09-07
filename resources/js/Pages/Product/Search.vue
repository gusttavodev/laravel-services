<template>
<v-search-card>
    <template v-slot:body>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-6">
                <basic-input
                    :value="search.name"
                    v-model="search.name"
                    label="Nome"
                    type="text"
                />
            </div>

            <div class="col-span-12 sm:col-span-6">
                <v-select
                    v-model="search.categories"
                    :value="search.categories"
                    :options="categories.data"
                    labelName="name"
                    valueName="id"
                    label="Categorias"
                />
            </div>

            <div class="col-span-12 sm:col-span-6">
                <v-checkbox name="remember" v-model:checked="search.enable" label="Habilitado"/>
            </div>
        </div>
    </template>
    <template v-slot:footer>
        <div class="flex items-center justify-between">
            <basic-button
                className="text-white bg-sys_error-600 hover:bg-sys_error-700 focus:ring-sys_error-500"
                @click="clearSearchData"
            >
                <TrashIcon class="h-5 w-5" aria-hidden="true" />
            </basic-button>
            <basic-button
                className="text-white bg-sys_success-600 hover:bg-sys_success-700 focus:ring-sys_success-500"
                @click="searchData"
            >
                <SearchIcon class="h-5 w-5" aria-hidden="true" />
            </basic-button>
        </div>
    </template>
</v-search-card>

</template>

<script>
import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

import { SearchIcon } from '@heroicons/vue/outline'
import {  TrashIcon } from '@heroicons/vue/solid'

export default {
  components: {
    BasicInput,
    BasicButton,

    SearchIcon,
    TrashIcon
  },
  props: {
    categories: Array,
    users: Object,
  },
  data() {
    return {
      search: {
        name: "",
        enable: true,
        categories: []
      },
    }
  },
  computed: {
    queryBuilderString() {
     const qs = new URLSearchParams(this.search);
     return qs
    },
  },
  methods: {
    async searchData() {
      this.$inertia.get(location.pathname + `?${this.queryBuilderString}`, {}, { replace: true, preserveState: true });
    },
    async clearSearchData() {
      this.search = {
        name: "",
        enable: true,
        categories: []
      }
      await this.searchData()
    },
  },
}
</script>
