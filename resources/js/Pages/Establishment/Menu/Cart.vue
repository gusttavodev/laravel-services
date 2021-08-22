<template>
  <TransitionRoot as="template" :show="open">
    <Dialog as="div" class="fixed inset-0 overflow-hidden" @close="closeMenu">
      <div class="absolute inset-0 overflow-hidden">
        <TransitionChild as="template" enter="ease-in-out duration-500" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-500" leave-from="opacity-100" leave-to="opacity-0">
          <DialogOverlay class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
        </TransitionChild>

        <div class="fixed inset-y-0 right-0 pl-10 max-w-full flex">
          <TransitionChild as="template" enter="transform transition ease-in-out duration-500 sm:duration-700" enter-from="translate-x-full" enter-to="translate-x-0" leave="transform transition ease-in-out duration-500 sm:duration-700" leave-from="translate-x-0" leave-to="translate-x-full">
            <div class="w-screen max-w-md">
              <div class="h-full flex flex-col bg-white shadow-xl overflow-y-scroll">
                <div class="flex-1 py-6 overflow-y-auto px-4 sm:px-6">
                  <div class="flex items-start justify-between">
                    <DialogTitle class="text-lg font-medium text-gray-900">
                      Carrinho De Compras
                    </DialogTitle>
                    <div class="ml-3 h-7 flex items-center">
                      <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="closeMenu">
                        <span class="sr-only">Fechar</span>
                        <XIcon class="h-6 w-6" aria-hidden="true" />
                      </button>
                    </div>
                  </div>

                  <div class="mt-8">
                   <ProductList/>
                  </div>
                </div>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                  <div class="flex justify-between text-base font-medium text-gray-900">
                    <p>Sub Total</p>
                    <p>R$ 262.00</p>
                  </div>
                  <p class="mt-0.5 text-sm text-gray-500">Finalize sua compra para conferir as taxas de entrega.</p>
                  <div class="mt-6">
                    <inertia-link
                        :href="route('establishmentOrderCreate', $page.props.establishment.data.public_link_name)"
                        type="button"
                        class="
                            flex justify-center items-center px-6 py-3 border border-transparent rounded-md
                            shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700
                        "
                    >
                        Finalizar
                    </inertia-link>
                  </div>
                  <div class="mt-6 flex justify-center text-sm text-center text-gray-500">
                    <p>
                      ou <button type="button" class="text-indigo-600 font-medium hover:text-indigo-500" @click="closeMenu">Continuar Comprando<span aria-hidden="true"> &rarr;</span></button>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </TransitionChild>
        </div>
      </div>
    </Dialog>
  </TransitionRoot>
</template>

<script>
import { Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot } from '@headlessui/vue'
import { XIcon } from '@heroicons/vue/outline'

import { HAS_PRODUCT } from '@/store/mutationsTypes/Product'
import { GET_CART, GET_CART_TOTAL_PRICE } from '@/store/mutationsTypes/StoreCart'

import ProductList from '@Establishment/Menu/Product/List'

export default {
  components: {
    Dialog,
    DialogOverlay,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
    XIcon,
    ProductList
  },
  methods: {
    openModal(){
       this.open = true
       this.$emit('onOpen')
    },
    closeMenu(){
       this.open = false
       this.$emit('onClose')
    }
  },
  props: {
    users: Object,
  },
  computed: {
    totalPrice() {
      return this.$store.getters[GET_CART_TOTAL_PRICE]
    },
    hasProduct() {
      return this.$store.getters[HAS_PRODUCT]
    },
    cartProducts() {
      return this.$store.getters[GET_CART]
    },
  },
  data() {
    return {
        open: false,
        products: [
            {
                id: 1,
                name: 'Throwback Hip Bag',
                href: '#',
                color: 'Salmon',
                price: '$90.00',
                quantity: 1,
                imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg',
                imageAlt: 'Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt.',
            },
            {
                id: 2,
                name: 'Medium Stuff Satchel',
                href: '#',
                color: 'Blue',
                price: '$32.00',
                quantity: 1,
                imageSrc: 'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg',
                imageAlt:
                'Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch.',
            },
        ]
    }
  },
}
</script>
