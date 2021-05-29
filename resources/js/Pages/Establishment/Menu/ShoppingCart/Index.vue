<template>
    <div
        class="fixed bottom-0 flex flex-wrap items-center justify-center w-3/4 pt-2 text-center rounded-t-lg cursor-pointer lg:w-2/4 sm:w-2/4 md:w-2/4 bg-sys_primary-300 hover:bg-sys_primary-600 text-button-text"
        style="z-index: 9999999999999999999999999; left: 50%;
transform: translateX(-50%);"
        @click="showOrder"
    >
        <h1 class="p-2 text-2xl">Seu pedido</h1>

        <div class="relative">
            <div
                class="absolute top-0 right-0 px-1 -mt-1 -mr-2 text-xs font-bold rounded-full bg-sys_success-400"
            >
                3
            </div>
            <ShoppingCartIcon class="w-5 h-5 text-gray-400" aria-hidden="true" />
        </div>
    </div>
    <!-- </div> -->
</template>

<script>
import { ShoppingCartIcon } from '@heroicons/vue/solid'

export default {
    name: 'ShoppingCart',
    props: {},
    components: {
        ShoppingCartIcon
    },
    computed: {

    },
    data() {
        return {};
    },
    mounted() {

    },
    methods: {
        showOrder(){

        }
    }
};
</script>

<style>
.cart-count {
    padding: 0 5px;
}
</style>
