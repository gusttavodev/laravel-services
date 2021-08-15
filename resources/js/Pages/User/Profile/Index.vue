<template>
    <div class="px-4 py-2 mt-6 sm:px-6 lg:px-8 bg-gray-200">
        <div class="mx-4 my-6 space-y-6 bg-white sm:p-6 shadow sm:rounded-md sm:overflow-hidden">
            <Tabs
                title="Editar informações do perfil"
                :tabs="tabs"
                @onChangeTab="changeTab"
            />

            <Information v-show="currentTab == 0" :user="user" :errors="errors" />

            <Address v-show="currentTab == 1" :user="user" :errors="errors" />
        </div>
    </div>


</template>

<script>
import MenuLayout from '@/Shared/MenuLayout'
import Tabs from '@/Layouts/Tabs'

import Information from '@/Pages/User/Profile/Form/Information'
import Address from '@/Pages/User/Profile/Form/Address'

export default {
  metaInfo: { title: 'User Profile' },
  layout: MenuLayout,
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
