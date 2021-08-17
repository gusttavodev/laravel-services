import MoneyService from '@/Services/MoneyService'

import { SET_PRODUCT, GET_PRODUCT, DELETE_PRODUCT, HAS_PRODUCT, GET_TOTAL_PRICE } from "@/store/mutationsTypes/Product";

export default {
    state: {
        product: {}
    },
    mutations: {
        [SET_PRODUCT]: (state, product) => {
            // Create a Copy of Value to not alter base Value
            state.product = {...product};

            state.product.formatted_price = MoneyService.convertFloatToMoney(product.price).toFormat()
            state.product.quantity = 1
            state.product.additionals = product.additionals.map(additionalValue => ({
                ...additionalValue,
                quantity: 0,
                formatted_price: MoneyService.convertFloatToMoney(additionalValue.price).toFormat()
            }))
            console.log("PRODUTO SETADO => ", state.product)
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

            let moneyProductPrice = MoneyService.convertFloatToMoney(product.price)
            let productPrice = product.quantity > 0 ? moneyProductPrice.multiply(product.quantity) : moneyProductPrice

            let additionalsPrice = additionals.reduce((total, elemento) => {
                let moneyAdditionalsPrice = MoneyService.convertFloatToMoney(elemento.price)
                return total.add(moneyAdditionalsPrice.multiply(elemento.quantity));
            }, MoneyService.convertFloatToMoney("0.00"));

            return {
                total: productPrice.add(additionalsPrice).toFormat(),
                product: productPrice.toFormat(),
                additionals: additionalsPrice.toFormat()
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
