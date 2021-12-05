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
                        </div>
                    </span>
                </div>
            </div>

            <div class="ml-4 flex-shrink-0 flow-root cursor-pointer">
                <inertia-link
                    :href="route('productEdit', product.id)"
                    type="button"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
                >
                    <EyeIcon class="h-5 w-5  text-white-400" aria-hidden="true" />
                </inertia-link>
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
                    {{ productFormattedPrice.toFormat() }}
                </span>
            </p>

            <p class="mt-1 text-sm font-medium text-gray-900">
                Quantidade:
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
                    {{ product.quantity }}x
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
                    {{ additionalsFormattedPrice.toFormat()  }}
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
                    {{ totalFormattedPrice.toFormat() }}
                </span>
            </p>
        </div>
    </div>
</li>
</template>

<script>
import { EyeIcon } from '@heroicons/vue/solid'
import MoneyService from '@/Services/MoneyService'

export default {
  props: {
    product: [Object, Array]
  },
  components: {
    EyeIcon
  },
  computed: {
    productFormattedPrice() {
      return MoneyService.convertFloatToMoney(this.product.unity_price)
      const productPrice = MoneyService.convertFloatToMoney(this.product.unity_price)

      return  productPrice.multiply(this.product.quantity)
    },
    additionalsFormattedPrice() {
        const additionals = this.product.additionals

        return additionals.reduce((total, additional) => {
            return total.add(MoneyService.convertFloatToMoney(additional.unity_price).multiply(additional.quantity));
        }, MoneyService.convertFloatToMoney("0.00"));
    },
    totalFormattedPrice() {
      const productTotal = MoneyService.convertFloatToMoney(this.product.unity_price).multiply(this.product.quantity)
      return productTotal.add(this.additionalsFormattedPrice)
    },
  },
  methods: {
    created(){
        console.log("product ", this.product)
    },
  },
}
</script>
