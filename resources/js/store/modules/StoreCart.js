import MoneyService from '@/Services/MoneyService'
import { GET_CART, ADD_ITEM, REMOVE_ITEM, CART_COUNT, GET_CART_TOTAL_PRICE } from "@/store/mutationsTypes/StoreCart";

export default {
    state: {
        storeCart: [],
        total: MoneyService.convertFloatToMoney("0.00")
    },
    mutations: {
        [ADD_ITEM]: (state, product) => {
            let additionals = product.additionals
            let productPrice = product.quantity > 0 ? product.formatted_price.multiply(product.quantity) : product.formatted_price
            let additionalsPrice = additionals.reduce((total, elemento) => {
                if (elemento.quantity > 0) return total.add(elemento.formatted_price.multiply(elemento.quantity));
                else return total
            }, MoneyService.convertFloatToMoney("0.00"));

            product.invoice = {
                total: productPrice.add(additionalsPrice),
                product: productPrice,
                additionals: additionalsPrice
            }

            state.storeCart.push(product);
        },
        [REMOVE_ITEM]: (state, index) => {
            state.storeCart.splice(index, 1);
        }
    },
    getters: {
        [GET_CART]: (state) => {
            return state.storeCart
        },
        [CART_COUNT]: (state) => {
            return state.storeCart.length
        },
        [GET_CART_TOTAL_PRICE]: (state) => {
            let total = state.storeCart.reduce(function(initial, current) {
                return initial.add(current.invoice.total);
            }, MoneyService.convertFloatToMoney("0.00"));

            return total
        }
    },
    actions: {
        [ADD_ITEM]: ({ commit }, product) => {
            commit(ADD_ITEM, product)
        },
        [REMOVE_ITEM]: ({ commit }, index) => {
            commit(REMOVE_ITEM, index)
        }
    }
};
