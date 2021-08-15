<template>
    <div class="px-4 mt-6 sm:px-6 lg:px-8">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
           <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-t-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  #
                </th>
                 <th
                  scope="col"
                  class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                >
                  Data
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
                  Total
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
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                    >Acompanhar
                </inertia-link>
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                     {{ order.date }}
                </td>
                 <td class="px-6 py-4 text-left whitespace-nowrap">
                     {{ order.payment_mode_label }}
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                     {{ order.delivery_mode_label }}
                </td>
                <td class="px-6 py-4 text-left whitespace-nowrap">
                     {{ order.total_price }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <Paginate :meta="orders.meta" :links="orders.links" />
      </div>
    </div>
</template>

<script>

export default {
  props: {
    user: Object,
    orders: Array,
    errors: Object,
  },
  created() {
  },
  data() {
    return {
    }
  },
  methods: {
  },
}
</script>
