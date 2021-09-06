<template>
<v-search-card>
    <template v-slot:body>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 sm:col-span-4">
                <basic-input
                    :value="search.name"
                    v-model="search.name"
                    label="Nome"
                    type="text"
                />
            </div>
            <div class="col-span-12 sm:col-span-4">
                <basic-input
                    :value="search.email"
                    v-model="search.email"
                    label="Email"
                    type="text"
                />
            </div>
            <div class="col-span-12 sm:col-span-4">
                <v-select
                    v-model="search.roles"
                    :value="search.roles"
                    :options="roles.data"
                    labelName="name"
                    valueName="id"
                    label="Funções"
                />
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
    roles: Array,
    users: Object,
  },
  data() {
    return {
      search: {
        name: "",
        email: "",
        roles: []
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
        email: "",
        roles: []
      }
      await this.searchData()
    },
  },
}
</script>
