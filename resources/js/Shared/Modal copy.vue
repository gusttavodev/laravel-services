<!-- This example requires Tailwind CSS v2.0+ -->
<template>
  <TransitionRoot as="template" :show="open">
    <Dialog
      as="div"
      static
      class="fixed inset-0 z-10 overflow-y-auto"
      @close="closeModal"
      :open="open"
    >
      <div
        class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
      >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0"
          enter-to="opacity-100"
          leave="ease-in duration-200"
          leave-from="opacity-100"
          leave-to="opacity-0"
        >
          <DialogOverlay class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" />
        </TransitionChild>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true"
          >&#8203;</span
        >
        <TransitionChild
          as="template"
          enter="ease-out duration-300"
          enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enter-to="opacity-100 translate-y-0 sm:scale-100"
          leave="ease-in duration-200"
          leave-from="opacity-100 translate-y-0 sm:scale-100"
          leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div
            class="flex items-center justify-center w-full h-full transition-all transform bg-red-800 rounded-lg shadow-xl"
          >
            <div class="container px-4 mx-auto sm:px-6 lg:px-8">
              <slot name="content"></slot>
            </div>

            <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
              <button
                type="button"
                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_success-600 hover:bg-sys_success-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                @click="confirmModal"
              >
                Adicionar ao carrinho
              </button>
              <button
                type="button"
                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                @click="closeModal"
                ref="cancelButtonRef"
              >
                Cancelar
              </button>
            </div>
          </div>
        </TransitionChild>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import {
  Dialog,
  DialogOverlay,
  DialogTitle,
  TransitionChild,
  TransitionRoot,
} from '@headlessui/vue'

export default {
  name: 'Modal',
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
  },
  props: {
    open: {
      type: Boolean,
      required: true,
    },
  },
  data() {
    return {}
  },
  methods: {
    confirmModal() {
      this.$emit('onConfirmModal')
    },
    closeModal() {
      this.$emit('onCloseModal')
    },
  },
}
</script>
<style scoped>
.modal-mask {
  position: fixed;
  z-index: 2;
  top: 0;
  left: 0;
  width: 80%;
  height: 90%;
  background-color: rgba(0, 0, 0, .5);
}
</style>
