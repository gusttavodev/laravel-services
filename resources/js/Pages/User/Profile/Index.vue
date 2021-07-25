<template>
    <Tabs
        title="Editar informações do perfil"
        :tabs="tabs"
        @onChangeTab="changeTab"
    />

    <Information v-show="currentTab == 0" :user="user" :errors="errors" />

    <Address v-show="currentTab == 1" :user="user" :errors="errors" />

</template>

<script>
import Layout from '@/Shared/Layout'
import Tabs from '@/Layouts/Tabs'

import Information from '@/Pages/User/Profile/Form/Information'
import Address from '@/Pages/User/Profile/Form/Address'

export default {
  metaInfo: { title: 'User Profile' },
  layout: Layout,
  components: {
    Tabs,
    Information,
    Address
  },
  props: {
    user: Object,
    errors: Object,
  },
  created() {
  },
  data() {
    return {
       currentTab: 0,
       tabs: [
            { name: 'Informações de Acesso', href: '#', current: true },
            { name: 'Endereço de Entrega', href: '#', current: false },
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
