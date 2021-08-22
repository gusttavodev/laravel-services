<template>
    <li class="py-6 flex">
        <div class="flex-shrink-0 w-24 h-24 border border-gray-200 rounded-md overflow-hidden">
            <img :src="product.picture" :alt="product.name" class="w-full h-full object-center object-cover" />
        </div>

        <div class="ml-4 flex-1 flex flex-col">
        <div>
            <div class="flex justify-between text-base font-medium text-gray-900">
            <h3>
                <a :href="product.href">
                {{ product.name }}
                </a>
            </h3>
            <p class="ml-4">
                {{ product.invoice.total }}
            </p>
            </div>
            <p class="mt-1 text-sm text-gray-500">
            {{ product.color }}
            </p>
        </div>
        <div class="flex-1 flex items-end justify-between text-sm">
            <p class="text-gray-500">Qty {{ product.quantity }}</p>

            <div class="flex">
                <button @click="removeItem" type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remover</button>
            </div>
        </div>
        </div>
    </li>
</template>

<script>
import { REMOVE_ITEM } from '@/store/mutationsTypes/StoreCart'
export default {
    props: {
        product: Object,
    },
    methods: {
        removeItem(){
            this.$store.dispatch(REMOVE_ITEM, this.index)
        }
    },
}
</script>
