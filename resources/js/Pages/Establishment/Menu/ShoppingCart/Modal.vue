<template>
    <Modal v-if="showModal" :open="showModal" @onCloseModal="closeModal">
      <template v-slot:title>
       <div class="py-2">
            <span class="px-2 py-1 text-lg font-medium">
          Finalize Sua Compra
        </span>

       </div>
      </template>
      <template v-slot:body>
        <div class="flex flex-wrap justify-center">

          <div class="w-full p-1">
            <!-- <AdditionalList :additionals="selectedProduct.additionals" /> -->
          </div>

           <div class="w-full ">
          <span class="px-2 py-1 text-lg font-medium">
          Preço Total
        </span>
        <span class="px-2 py-1 text-lg font-medium text-green-800 bg-green-100 rounded-full">
            R$ 10
        </span>
          </div>
        </div>
      </template>
      <template v-slot:footer>
        <button
          @click="finishSell()"
          type="button"
          class="flex items-center justify-center w-full h-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        >
          Finalizar Compra
        </button>
      </template>
    </Modal>
</template>

<script>
import Modal from '@/Shared/Modal'

export default {
  name: 'ShoppingCartModal',
  components: {
    Modal
  },
  computed: {
  },
  data() {
    return {
        showModal: false
    }
  },
  methods: {
    openModal(){
       this.showModal = true
    },
    closeModal() {
      this.showModal = false
    },
    finishSell() {
        console.log("VENDA FINALIZADA");
    }
  },
}
</script>

