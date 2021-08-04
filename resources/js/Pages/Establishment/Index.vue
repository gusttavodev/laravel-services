<template>
  <Header title="Usuários" buttonText="Criar" :buttonAction="route('establishmentCreate')" />

  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-t-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  ID
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Nome
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Minimo para entrega
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Tempo médio para entrega
                </th>
                 <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Taxa de entrega padrão
                </th>
                 <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Precisa Confirmar Entrega
                </th>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Dono
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Ações</span>
                </th>
              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="establishment in establishments.data" :key="establishment.id">
                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ establishment.id }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full" :src="establishment.picture" alt="" />
                    </div>
                    <div class="ml-4">

                    <inertia-link
                        :href="route('establishmentShowPublic', establishment.public_link_name)"
                        type="button"
                        class="text-sm font-medium text-gray-900"
                    >
                        {{ establishment.name }}
                    </inertia-link>

                    </div>
                  </div>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ establishment.min_value }}
                  </span>
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ establishment.delivery_time }}
                  </span>
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ establishment.default_delivery_tax }}
                  </span>
                </td>
                 <td class="px-6 py-4 text-left whitespace-nowrap">
                   <span
                    v-if="establishment.need_confirm_order"
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_success-800 bg-sys_success-100"
                  >
                    SIM
                  </span>
                  <span
                    v-else
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_error-800 bg-sys_error-100"
                  >
                    NÃO
                  </span>
                </td>



                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_primary-800 bg-sys_primary-100"
                  >
                    {{ establishment.user.name }}
                  </span>
                </td>
                <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">

                      <inertia-link
                    :href="route('establishmentCustomize', establishment.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_success-600 order-0 hover:bg-sys_success-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                    >Personalizar
                  </inertia-link>


                  <inertia-link
                    :href="route('establishmentEdit', establishment.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                    >Editar
                  </inertia-link>

                  <button
                    @click="remove(establishment.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_error-600 order-0 hover:bg-sys_error-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                  >
                    Remover
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <Paginate :meta="establishments.meta" :links="establishments.links" />
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
    establishments: Object,
  },
  methods: {
    remove(id) {
      this.$inertia.delete(route('establishmentDelete', id))
    },
  },
}
</script>
