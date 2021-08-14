<template>
    <form @submit.prevent="submit" class="px-4 py-2 mt-6 sm:px-6 lg:px-8 bg-gray-200">
        <div class="mx-4 my-6 space-y-6 bg-white sm:p-6 shadow sm:rounded-md sm:overflow-hidden">
            <Steps
                class=" bg-white"
                title="Editar informações do perfil"
                :steps="steps"
                @onNextStep="nextStep"
                @onPreviusStep="previusStep"
                @onJumpToStep="jumpToStep"
            />

            <transition name="slide-fade">
                <ContactInformation v-show="currentStep.id == 0" :user="user" :errors="errors" :step="currentStep"/>
            </transition>
            <transition name="slide-fade">
               <AddressInformation v-show="currentStep.id == 1" :establishment="establishment" :user="user" :errors="errors" :step="currentStep" :delivery_mode_options="delivery_mode_options"/>
            </transition>
            <transition name="slide-fade">
               <PaymentInformation v-show="currentStep.id == 2" :establishment="establishment" :user="user" :errors="errors" :step="currentStep" :payment_mode_options="payment_mode_options"/>
            </transition>
        </div>
    </form>
</template>

<script>
import MenuLayout from '@/Shared/MenuLayout'

import Steps from '@/Layouts/Steps'

import ContactInformation from '@Establishment/Menu/Order/Steps/ContactInformation'
import AddressInformation from '@Establishment/Menu/Order/Steps/AddressInformation'
import PaymentInformation from '@Establishment/Menu/Order/Steps/PaymentInformation'


import { GET_STEPS, GET_CURRENT_STEP } from '@/store/mutationsTypes/Order'

export default {
  name: 'EstablishmentOrder',
  metaInfo: { title: 'establishment' },
  layout: MenuLayout,
  components: {
    Steps,
    ContactInformation,
    AddressInformation,
    PaymentInformation
  },
  props: {
    errors: Object,
    delivery_mode_options: Array,
    payment_mode_options: Array,
    establishment: Array
  },
  created() {

  },
  computed: {
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
    jumpToStep(step) {
        // this.currentStep = step
    },
    onNextStep(step) {
    //   this.currentStep = step
    },
    onPreviusStep(step) {
    //   this.currentStep = step
    },
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
