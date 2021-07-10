<template>
  <Header title="Pedidos" buttonText="Criar" :buttonAction="route('orderCreate')" />

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
                  Tipo do Cliente
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Status
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Preço Total
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Estabelecimento
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Forma de Pagamento
                </th>



              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="order in orders.data" :key="order.id">
                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full">
                    {{ order.id }}
                  </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                  <span
                    v-if="order.user != null && order.wpp_user == null"
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-purple-800 bg-purple-100"
                  >
                    Registrado
                  </span>
                  <span
                    v-else-if="order.user == null && order.wpp_user != null"
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_success-800 bg-sys_success-100"
                  >
                    WhatsApp
                  </span>
                   <span
                    v-else
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-sys_error-800 bg-sys_error-100"
                  >
                    Sem Cliente
                  </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                    <span
                    class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full text-yellow-800 bg-yellow-100"
                    >
                        {{ order.total_price }}
                    </span>
                </td>


              </tr>
            </tbody>
          </table>
        </div>

        <Paginate :meta="orders.meta" :links="orders.links" />
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
    orders: Object,
  },
  methods: {
    remove(id) {
      this.$inertia.delete(route('orderDelete', id))
    },
  },
}
</script>
