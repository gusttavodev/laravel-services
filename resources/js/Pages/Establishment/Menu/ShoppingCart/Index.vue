<template>
    <div
        v-if="cartCount > 0 && showFinishOrderButton"
        class="
            text-button-txt
            bg-button-bg hover:bg-button-hover
            fixed bottom-0 flex flex-wrap items-center justify-center w-3/4 pt-2
            text-center rounded-t-lg cursor-pointer lg:w-2/4 sm:w-2/4 md:w-2/4
        "
        style="z-index: 9999999999999999999999999; left: 50%; transform: translateX(-50%);"
        @click="showOrder"
    >
        <h1 class="p-2 text-2xl">Finalize Sua Compra</h1>

        <div class="relative">
            <div
                class="absolute top-0 right-0 px-1 -mt-1 -mr-2 text-xs font-bold rounded-full bg-counter-bg text-counter-txt"
            >
                {{ cartCount }}
            </div>
            <ShoppingCartIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
        </div>
    </div>

    <Cart
        ref="ShoppingCartModal"
        @onClose="showFinishOrderButton = true"
        @onOpen="showFinishOrderButton = false"
    />
</template>

<script>
import { ShoppingCartIcon } from '@heroicons/vue/solid'

import { CART_COUNT } from '@/store/mutationsTypes/StoreCart'

import Cart from '@Establishment/Menu/Cart'

export default {
    name: 'ShoppingCart',
    props: {},
    components: {
        ShoppingCartIcon,
        Cart
    },
    computed: {
        cartCount() {
            return this.$store.getters[CART_COUNT]
        },
    },
    data() {
        return {
            showFinishOrderButton: true
        };
    },
    mounted() {

    },
    methods: {
        showOrder(){
            this.$refs.ShoppingCartModal.openModal()
        }
    }
};
</script>

<style>
.cart-count {
    padding: 0 5px;
}
</style>
