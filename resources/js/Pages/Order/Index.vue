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

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Forma de Entrega
                </th>

                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Ações
                </th>



              </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="order in orders.data" :key="order.id">
                <td class="px-6 py-4 text-left whitespace-nowrap">
                    <inertia-link
                        :href="route('establishmentOrderShow',{
                            public_link_name: order.establishment.public_link_name,
                            tracking_link: order.tracking_link
                        })"
                        type="button"
                        class="text-sm font-medium text-gray-900"
                    >
                        {{ order.id }}
                    </inertia-link>
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
                        {{ order.status_label }}
                    </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                    <span
                        class="text-sm font-medium text-gray-900"
                    >
                        {{ order.total_price }}
                    </span>
                </td>

                <td class="px-6 py-4 text-left whitespace-nowrap">
                    <inertia-link
                        :href="route('establishmentShowPublic', order.establishment.public_link_name)"
                        type="button"
                        class="text-sm font-medium text-gray-900"
                    >
                        {{ order.establishment.name }}
                    </inertia-link>
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                    <span
                        class="text-sm font-medium text-gray-900"
                    >
                        {{ order.payment_mode_label }}
                    </span>
                </td>
                 <td class="px-6 py-4 text-left whitespace-nowrap">
                    <span
                        class="text-sm font-medium text-gray-900"
                    >
                        {{ order.delivery_mode_label }}
                    </span>
                </td>

                 <td class="px-6 py-4 text-left whitespace-nowrap">
                   <inertia-link
                    :href="route('orderEdit', order.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                    >Vêr
                  </inertia-link>
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
