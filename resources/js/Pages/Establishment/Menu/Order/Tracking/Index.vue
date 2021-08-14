<template>
    <div class="px-4 py-2 mt-6 sm:px-6 lg:px-8 bg-gray-200">
  <div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Informações do pedido
      </h3>
      <p class="mt-1 max-w-2xl text-sm text-gray-500">
        Aqui você pode acompanhar o status do seu pedido
      </p>
    </div>
    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
      <dl class="sm:divide-y sm:divide-gray-200">
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Telefone do estabelecimento
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{establishment.data.phone}}
          </dd>
        </div>
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Inicio do pedido
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{order.data.date}}
          </dd>
        </div>
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Forma de Entrega
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
           {{ order.data.delivery_mode_label }}
          </dd>
        </div>
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Forma de Pagemento
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            {{ order.data.payment_mode_label }}
          </dd>
        </div>
        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Valor total
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
            R$ {{ order.data.total_price }}
          </dd>
        </div>

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
          <dt class="text-sm font-medium text-gray-500">
            Status
          </dt>
          <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
              <div class="flow-root">
                    <ul class="-mb-8">
                        <li v-for="(event, eventIdx) in formatedStatusChanges" :key="event.id">
                            <div class="relative pb-8">
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span :class="[event.iconBackground, 'h-8 w-8 rounded-full flex items-center justify-center ring-8 ring-white']">
                                            <component :is="event.icon" class="h-5 w-5 text-white" aria-hidden="true" />
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                    <div>
                                        <p class="text-sm text-gray-500">
                                        {{ event.content }} - <time :datetime="event.datetime">{{ event.date }}</time>
                                        </p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
          </dd>
        </div>

      </dl>
    </div>
  </div>

    </div>
</template>

<script>
import MenuLayout from '@/Shared/MenuLayout'
import { CheckIcon } from '@heroicons/vue/solid'

export default {
  name: 'EstablishmentOrder',
  layout: MenuLayout,
  components: {
    CheckIcon
  },
  props: {
    errors: Object,
    establishment: Array,
    order: Array,
    orderStatusChanges: Array,
  },
  created() {

  },
  computed: {
    formatedStatusChanges(){
        return this.orderStatusChanges.map(key => {
            return {
                id: key.value,
                content: key.label,
                href: '#',
                date: key?.time,
                icon: CheckIcon,
                iconBackground: key.completed ? 'bg-green-400' : 'bg-gray-400',
            }
        });
    },
    user() {
      return this.$page.props?.auth?.user?.data
    },
    steps() {
      return this.$store.getters[GET_STEPS]
    },
    currentStep() {
      return this.$store.getters[GET_CURRENT_STEP]
    }
  },
  data() {
    return {

    }
  },
  methods: {

  },
}
</script>
<style scoped>
.slide-fade-leave-active {
  transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>
