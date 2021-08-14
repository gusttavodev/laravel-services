<template>
   <form @submit.prevent="submit">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-6 space-y-6 bg-white sm:p-6">
          <div>
            <h3 class="text-lg font-medium leading-6 text-gray-900">Atualizar o Pedido</h3>
            <p class="mt-1 text-sm text-gray-500">Altere o Status do pedido</p>
        </div>

        <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
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

        <p class="px-2 py-2 mt-1 text-sm text-gray-500">Atenção! ao alterar o status do pedido isso será informao ao cliente</p>
        </div>

        <div class="px-4 py-3 text-right bg-gray-50 sm:px-6">
          <button
            type="submit"
            class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm  bg-sys_primary-600 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sys_primary-500"
          >
            Próximo
          </button>
        </div>
      </div>
    </form>
</template>

<script>
import SelectInputBasic from '@/Shared/SelectInputBasic'
import { CheckIcon } from '@heroicons/vue/solid'
export default {
  components: {
    SelectInputBasic,
    CheckIcon
  },
  props: {
    errors: Object,
    order: Object,
    statusOptions: Array,
    orderStatusChanges: Array,
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
  },
  data() {
    return {

    }
  },
  created() {
    // if (this.order) {
    //   this.form = this.order.data
    // }
  },
  methods: {
    submit() {
      if(this.order) this.$inertia.post(route('orderNextStatus', this.order.data.id))
    },
  },
}
</script>
