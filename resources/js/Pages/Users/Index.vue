<template>
  <!-- Page title & actions -->
  <div class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
    <div class="flex-1 min-w-0">
      <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Home</h1>
    </div>
  </div>

  <div class="px-4 mt-6 sm:px-6 lg:px-8">
    <h2 class="text-lg font-medium leading-6 text-gray-900">Informações</h2>
    <div class="grid grid-cols-1 gap-5 mt-2 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Card -->
      <div v-for="card in cards" :key="card.name" class="overflow-hidden bg-white rounded-lg shadow">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <component :is="card.icon" class="w-6 h-6 text-gray-400" aria-hidden="true" />
            </div>
            <div class="flex-1 w-0 ml-5">
              <dl>
                <dt class="text-sm font-medium text-gray-500 truncate">
                  {{ card.name }}
                </dt>
                <dd>
                  <div class="text-lg font-medium text-gray-900">
                    {{ card.amount }}
                  </div>
                </dd>
              </dl>
            </div>
          </div>
        </div>
        <div class="px-5 py-3 bg-gray-50">
          <div class="text-sm">
            <a :href="card.href" class="font-medium text-cyan-700 hover:text-cyan-900"> View all </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from '../../Shared/Layout'
import { ref } from 'vue'
import { Dialog, DialogOverlay, Menu, MenuButton, MenuItem, MenuItems, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { BellIcon, ClockIcon, CogIcon, CreditCardIcon, DocumentReportIcon, HomeIcon, MenuAlt1Icon, QuestionMarkCircleIcon, ScaleIcon, ShieldCheckIcon, UserGroupIcon, XIcon } from '@heroicons/vue/outline'
import { CashIcon, CheckCircleIcon, ChevronDownIcon, ChevronRightIcon, OfficeBuildingIcon, SearchIcon } from '@heroicons/vue/solid'

const navigation = [
  { name: 'Home', href: '#', icon: HomeIcon, current: true },
  { name: 'History', href: '#', icon: ClockIcon, current: false },
  { name: 'Balances', href: '#', icon: ScaleIcon, current: false },
  { name: 'Cards', href: '#', icon: CreditCardIcon, current: false },
  { name: 'Recipients', href: '#', icon: UserGroupIcon, current: false },
  { name: 'Reports', href: '#', icon: DocumentReportIcon, current: false },
]
const secondaryNavigation = [
  { name: 'Settings', href: '#', icon: CogIcon },
  { name: 'Help', href: '#', icon: QuestionMarkCircleIcon },
  { name: 'Privacy', href: '#', icon: ShieldCheckIcon },
]
const cards = [
  { name: 'Account balance', href: '#', icon: ScaleIcon, amount: '$30,659.45' },
  { name: 'Account balance', href: '#', icon: ScaleIcon, amount: '$30,659.45' },
  { name: 'Account balance', href: '#', icon: ScaleIcon, amount: '$30,659.45' },
  // More items...
]
const transactions = [
  {
    id: 1,
    name: 'Payment to Molly Sanders',
    href: '#',
    amount: '$20,000',
    currency: 'USD',
    status: 'success',
    date: 'July 11, 2020',
    datetime: '2020-07-11',
  },
  // More transactions...
]
const statusStyles = {
  success: 'bg-green-100 text-green-800',
  processing: 'bg-yellow-100 text-yellow-800',
  failed: 'bg-gray-100 text-gray-800',
}

export default {
  metaInfo: { title: 'Users' },
  layout: Layout,
  components: {
    Dialog,
    DialogOverlay,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    TransitionChild,
    TransitionRoot,
    BellIcon,
    CashIcon,
    CheckCircleIcon,
    ChevronDownIcon,
    ChevronRightIcon,
    MenuAlt1Icon,
    OfficeBuildingIcon,
    SearchIcon,
    XIcon,
  },
  setup() {
    const sidebarOpen = ref(false)

    return {
      navigation,
      secondaryNavigation,
      cards,
      transactions,
      statusStyles,
      sidebarOpen,
    }
  },
}
</script>
