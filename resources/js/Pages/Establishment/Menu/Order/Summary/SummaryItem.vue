<template>
<li class="flex py-6 px-4 sm:px-6">
    <div class="flex-shrink-0">
        <img :src="product.picture" :alt="product.name" class="w-20 rounded-md" />
    </div>

        <div class="ml-6 flex-1 flex flex-col">
        <div class="flex">
            <div class="min-w-0 flex-1">
                <h4 class="text-sm">
                    <a class="font-medium text-gray-700 hover:text-gray-800">
                    {{ product.name }}
                    </a>
                </h4>
                <div
                    v-for="additional in product.additionals"
                    :key="additional.id"
                    class="
                    inline-flex
                    items-center"
                >
                    <span
                        v-if="additional.quantity > 0"
                        class="
                            rounded-md
                            text-sm
                            font-medium
                            bg-blue-100
                            text-blue-800

                            px-1
                            py-0.5
                            m-0.5
                        "
                    >
                        <div class="flex flex-row">
                            <div>
                                {{ additional.quantity }}x
                            </div>
                            <div class="px-2">
                                {{ additional.name }}
                            </div>
                            <button @click="removeAdditional(additional.id)" type="button" >
                                <TrashIcon class="h-5 w-5  text-gray-400" aria-hidden="true" />
                            </button>
                        </div>
                    </span>
                </div>
            </div>

            <div class="ml-4 flex-shrink-0 flow-root">
            <button @click="removeItem" type="button" class="-m-2.5 bg-white p-2.5 flex items-center justify-center text-gray-400 hover:text-gray-500">
                <span class="sr-only">Remove</span>
                <TrashIcon class="h-5 w-5" aria-hidden="true" />
            </button>
            </div>
        </div>

        <div class="flex-1 pt-2 flex items-end justify-between">
            <p class="mt-1 text-sm font-medium text-gray-900">
                Produto:
                <span class="
                            rounded-md
                            text-sm
                            font-medium
                            bg-green-100
                            text-green-800

                            px-1
                            py-0.5
                            mt-1

                        "
                >
                    {{ product.invoice.product }}
                </span>
            </p>
            <p class="mt-1 text-sm font-medium text-gray-900">
                Adicionais:
                <span class="
                            rounded-md
                            text-sm
                            font-medium
                            bg-green-100
                            text-green-800

                            px-1
                            py-0.5
                            mt-1

                        "
                >
                    {{ product.invoice.additionals }}
                </span>
            </p>
            <p class="mt-1 text-sm font-medium text-gray-900">
                Total:
                <span class="
                            rounded-md
                            text-sm
                            font-medium
                            bg-green-100
                            text-green-800

                            px-1
                            py-0.5
                            mt-1

                        "
                >
                    {{ product.invoice.total }}
                </span>
            </p>

            <div class="ml-4">
            <label for="quantity" class="sr-only">Quantidade</label>
            <select
                @change="changeQuantity"
                v-model="product.quantity"
                id="quantity"
                name="quantity"
                class="
                    rounded-md border border-gray-300 text-base font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1
                  focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                ">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>
            </div>
        </div>
    </div>
</li>
</template>

<script>
import { MenuIcon, QuestionMarkCircleIcon, SearchIcon, ShoppingBagIcon, XIcon } from '@heroicons/vue/outline'
import { CheckCircleIcon, TrashIcon } from '@heroicons/vue/solid'
import { REMOVE_ITEM, CHANGE_QUANTITY, REMOVE_ADDITIONAL } from '@/store/mutationsTypes/StoreCart'

export default {
  props: {
    product: Object,
    productIndex: [String, Number],
  },
  components: {
    MenuIcon, QuestionMarkCircleIcon,
    CheckCircleIcon, TrashIcon,
    SearchIcon, ShoppingBagIcon, XIcon
  },
  methods: {
    created(){
        console.log("product ", this.product)
    },
    removeItem(){
        this.$store.dispatch(REMOVE_ITEM, this.index)
    },
    removeAdditional(id){
        this.$store.dispatch(REMOVE_ADDITIONAL, { additional_id: id, product_index: this.productIndex })
    },
    changeQuantity(event){
        this.$store.dispatch(CHANGE_QUANTITY, { id: this.product.id, quantity: event.target.value})
    }
  },
}
</script>
