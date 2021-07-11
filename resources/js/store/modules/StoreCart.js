import MoneyService from '@/Services/MoneyService'
import { GET_CART, ADD_ITEM, REMOVE_ITEM, CART_COUNT, GET_CART_TOTAL_PRICE } from "@/store/mutationsTypes/StoreCart";

export default {
    state: {
        storeCart: [],
    },
    mutations: {
        [ADD_ITEM]: (state, product) => {
            let additionals = product.additionals

            let productMoneyPrice = MoneyService.convertFloatToMoney(product.price)
            let productPrice = product.quantity > 0 ? productMoneyPrice.multiply(product.quantity) : productMoneyPrice

            let additionalsPrice = additionals.reduce((total, elemento) => {
                let additionalsMoneyPrice = MoneyService.convertFloatToMoney(elemento.price)
                if (elemento.quantity > 0) return total.add(additionalsMoneyPrice.multiply(elemento.quantity));
                else return total
            }, MoneyService.convertFloatToMoney("0.00"));

            product.invoice = {
                total_amount: productPrice.add(additionalsPrice).getAmount(),
                product_amount: productPrice.toFormat(),
                additionals_amount: additionalsPrice.toFormat(),

                total: productPrice.add(additionalsPrice).toFormat(),
                product: productPrice.toFormat(),
                additionals: additionalsPrice.toFormat()
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
            let total = state.storeCart.reduce(function (initial, current) {
                console.log("current.invoice.total_amount ", current.invoice.total_amount);
                let moneyTotal =  MoneyService.convertAmountToFloat(current.invoice.total_amount)
                return initial.add(moneyTotal);
            }, MoneyService.convertFloatToMoney("0.00"));

            return total.toFormat()
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
