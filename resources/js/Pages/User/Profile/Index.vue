<template>
    <div class="mx-4 space-y-6 sm:p-6">
        <v-tabs
            title="Editar informações do perfil"
            :tabs="tabs"
            @onChangeTab="changeTab"
            className="py-5 pl-8"
        />

        <Information v-show="currentTab == 0" :user="user" :errors="errors" />

        <Address v-show="currentTab == 1" :user="user" :errors="errors" />

        <Orders v-show="currentTab == 2" :user="user" :errors="errors" :orders="orders" />
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
            { name: 'Informações de acesso', href: '#', current: true },
            { name: 'Endereço de entrega', href: '#', current: false },
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
