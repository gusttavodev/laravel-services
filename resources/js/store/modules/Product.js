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
            return Object.keys( state.product).length === 0 ? false : true
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
