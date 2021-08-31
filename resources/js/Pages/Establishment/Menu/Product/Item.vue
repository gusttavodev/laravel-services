<template>
    <li class="py-6 flex">
        <div class="flex-shrink-0 w-24 h-24 border border-product-separator rounded-md overflow-hidden">
            <img :src="product.picture" :alt="product.name" class="w-full h-full object-center object-cover" />
        </div>

        <div class="ml-4 flex-1 flex flex-col">
        <div>
            <div class="flex justify-between text-base font-medium text-general-title">
            <h3>
                <a :href="product.href">
                {{ product.name }}
                </a>
            </h3>
            <p class="ml-4">
                <establishment-price>{{ product.invoice.total }}</establishment-price>
            </p>
            </div>

        </div>
        <div class="flex-1 flex items-end justify-between text-sm">
            <p >Qty {{ product.quantity }}</p>

            <div class="flex">
                <button @click="removeItem" type="button" class="font-medium">Remover</button>
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
