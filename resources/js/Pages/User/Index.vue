<template>
  <Header title="Usuários" buttonText="Criar" :buttonAction="route('userCreate')" />


  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                <div class="grid grid-cols-12 gap-4 bg-white px-5 py-5">
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


            <div class="flex items-center justify-between py-3 bg-white px-4 sm:rounded-b-lg">
                <basic-button
                    @click="clearSearchData"
                >
                    Limpar   <TrashIcon class="mx-2 h-5 w-5  text-sys_error-500" aria-hidden="true" />
                </basic-button>
                <basic-button
                    @click="searchData"
                >
                    Pesquisar   <SearchIcon class="ml-2 h-5 w-5  text-sys_success-400" aria-hidden="true" />
                </basic-button>
            </div>
        </div>

      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b bord:rounded-er-gray-200 shadow smt-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Name
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Email
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Funções
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="user in users.data" :key="user.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full" :src="user.picture" alt="" />
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                        {{ user.name }}
                      </div>
                      <div class="text-sm text-gray-500">
                        {{ user.email }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span
                    v-if="user.email_verified_at !== null"
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_success-800 bg-sys_success-100"
                  >
                    Verificado
                  </span>
                  <span
                    v-else
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_error-800 bg-sys_error-100"
                  >
                    Não Verificado
                  </span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                  <span
                    v-for="role in user.roles"
                    :key="role"
                    class="m-1 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-sys_secondary-100 text-sys_secondary-800"
                  >
                    {{ role }}
                  </span>
                </td>
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <inertia-link
                    :href="route('userEdit', user.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                    >Editar
                  </inertia-link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <Paginate :meta="users.meta" :links="users.links" />
      </div>
    </div>
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import Header from '@/Layouts/Header'
import Paginate from '@/Layouts/Paginate'
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

import BasicInput from '@/Components/Input'
import BasicButton from '@/Components/Button'

import { SearchIcon } from '@heroicons/vue/outline'
import {  TrashIcon } from '@heroicons/vue/solid'

export default {
  metaInfo: { title: 'Users' },
  layout: Layout,
  components: {
    ChevronLeftIcon,
    ChevronRightIcon,
    Header,
    Paginate,

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
