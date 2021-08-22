<template>
    <div class="px-4 py-2 mt-6 sm:px-6 lg:px-8 bg-gray-200">
        <div class="mx-4 my-6 space-y-6 bg-white sm:p-6 shadow sm:rounded-md sm:overflow-hidden px-5 py-5">
            <Tabs
                title="Editar informações do perfil"
                :tabs="tabs"
                @onChangeTab="changeTab"
            />

            <Information v-show="currentTab == 0" :user="user" :errors="errors" />

            <Address v-show="currentTab == 1" :user="user" :errors="errors" />

            <Orders v-show="currentTab == 2" :user="user" :errors="errors" :orders="orders" />

        </div>
    </div>


</template>

<script>
import MenuLayout from '@/Shared/MenuLayout'
import Tabs from '@/Layouts/Tabs'

import Information from '@/Pages/User/Profile/Form/Information'
import Address from '@/Pages/User/Profile/Form/Address'
import Orders from '@/Pages/User/Profile/Form/Orders'

export default {
  metaInfo: { title: 'User Profile' },
  layout: MenuLayout,
  components: {
    Tabs,
    Information,
    Address,
    Orders
  },
  props: {
    user: Object,
    orders: Array,
    errors: Object,
  },
  created() {
  },
  data() {
    return {
       currentTab: 2,
       tabs: [
            { name: 'Informações de Acesso', href: '#', current: true },
            { name: 'Endereço de Entrega', href: '#', current: false },
            { name: 'Pedidos', href: '#', current: false },
       ]
    }
  },
  methods: {
    changeTab(tab) {
      this.currentTab = tab
    },
  },
}
</script>
