<template>
  <Header title="Usuários" buttonText="Criar" :buttonAction="route('additionalCreate')" />

  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-t-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                >
                  ID
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                >
                  Nome
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                >
                  Preço
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                >
                  Quantidade Max.
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase "
                >
                  Produtos
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Ações</span>
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="additional in additionals.data" :key="additional.id">
                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ additional.id }}
                  </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ additional.name }}
                  </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ additional.price }}
                  </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full  text-sys_alert-800 bg-sys_alert-100"
                  >
                    {{ additional.quantity_limit }}
                  </span>
                </td>

                <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                  <span
                    v-for="product in additional.products.slice(0, 2)"
                    :key="product"
                    class="
                      m-1
                      inline-flex
                      items-center
                      px-2.5
                      py-0.5
                      rounded-md
                      text-sm
                      font-medium
                      bg-sys_secondary-100
                      text-sys_secondary-800
                    "
                  >
                    {{ product.name }}
                  </span>
                  <span
                     v-if="additional.products.length > 2"
                     class="
                      m-1
                      inline-flex
                      items-center
                      px-2.5
                      py-0.5
                      rounded-md
                      text-sm
                      font-medium
                      bg-sys_secondary-100
                      text-sys_secondary-800
                    "
                  >
                    +
                  </span>
                </td>

                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                  <inertia-link
                    :href="route('additionalEdit', additional.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm  bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                    >Editar
                  </inertia-link>

                  <button
                    @click="remove(additional.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm  bg-sys_error-600 order-0 hover:bg-sys_error-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                  >
                    Remover
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <Paginate :meta="additionals.meta" :links="additionals.links" />
      </div>
    </div>
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import Header from '@/Layouts/Header'
import Paginate from '@/Layouts/Paginate'

export default {
  metaInfo: { title: 'Produtos' },
  layout: Layout,
  components: {
    Paginate,
    Header,
  },
  props: {
    additionals: Object,
  },
  methods: {
    remove(id) {
      this.$inertia.delete(route('additionalDelete', id))
    },
  },
}
</script>
