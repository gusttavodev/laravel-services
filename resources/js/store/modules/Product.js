import MoneyService from '@/Services/MoneyService'

import { SET_PRODUCT, GET_PRODUCT, DELETE_PRODUCT, HAS_PRODUCT, GET_TOTAL_PRICE } from "@/store/mutationsTypes/Product";

export default {
    state: {
        product: {}
    },
    mutations: {
        [SET_PRODUCT]: (state, product) => {
            state.product = product;
            state.product.formatted_price = MoneyService.convertFloatToMoney(product.price)
            state.product.quantity = 1
            state.product.additionals = product.additionals.map(additionalValue => ({
                ...additionalValue,
                formatted_price: MoneyService.convertFloatToMoney(additionalValue.price)
            }))
        },
        [DELETE_PRODUCT]: (state) => {
            state.product = {}
        }
    },
    getters: {
        [GET_PRODUCT]: (state) => {
            return state.product
        },
        [HAS_PRODUCT]: (state) => {
            return Object.keys( state.product).length === 0 ? false : true
        },
        [GET_TOTAL_PRICE]: (state) => {
            let product = state.product
            let additionals = product.additionals

            let productPrice = product.quantity > 0 ? product.formatted_price.multiply(product.quantity) : product.formatted_price

            let additionalsPrice = additionals.reduce((total, elemento) => {
                if (elemento.quantity > 0) return total.add(elemento.formatted_price.multiply(elemento.quantity));
                else return total
            }, MoneyService.convertFloatToMoney("0.00"));

            return {
                total: productPrice.add(additionalsPrice),
                product: productPrice,
                additionals: additionalsPrice
            }
        }
    },
    actions: {
        [SET_PRODUCT]: ({ commit }, product) => {
            commit(SET_PRODUCT, product)
        },
        [DELETE_PRODUCT]: ({ commit }) => {
            commit(DELETE_PRODUCT)
        }
    }
};
