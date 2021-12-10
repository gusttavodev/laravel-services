import MoneyService from '@/Services/MoneyService'
import {
    GET_CART, ADD_ITEM, REMOVE_ITEM,
    CART_COUNT, GET_CART_TOTAL_PRICE,
    GET_CART_PRODUCTS_LIST,
    GET_CART_TOTAL_MONEY,
    CHANGE_QUANTITY,
    REMOVE_ADDITIONAL,
    GET_INVOICE
} from "@/store/mutationsTypes/StoreCart";


function calculateInvoice(product){

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
        product_amount: productPrice.getAmount(),
        additionals_amount: additionalsPrice.getAmount(),

        total: productPrice.add(additionalsPrice).toFormat(),
        product: productPrice.toFormat(),
        additionals: additionalsPrice.toFormat()
    }

    return product
}

function formatTotalInvoice(storeCart){

    let total = storeCart.reduce(function (initial, current) {
        let moneyTotal =  MoneyService.convertAmountToFloat(current.invoice.total_amount)
        return initial.add(moneyTotal);
    }, MoneyService.convertFloatToMoney("0.00"));
    let productTotal = storeCart.reduce(function (initial, current) {
        let moneyTotal =  MoneyService.convertAmountToFloat(current.invoice.product_amount)
        return initial.add(moneyTotal);
    }, MoneyService.convertFloatToMoney("0.00"));
    let additionalTotal = storeCart.reduce(function (initial, current) {
        let moneyTotal =  MoneyService.convertAmountToFloat(current.invoice.additionals_amount)
        return initial.add(moneyTotal);
    }, MoneyService.convertFloatToMoney("0.00"));

    return {total:  total.toFormat(), productTotal: productTotal.toFormat(), additionalTotal: additionalTotal.toFormat()}
}

function overFlowProduct(findProduct, newProduct){
    findProduct.quantity += newProduct.quantity

    findProduct.additionals.forEach(element => {
        const findedAdditional = newProduct.additionals.findIndex(item => item.id === element.id)
        if(findedAdditional >= 0){
            findProduct.additionals[findedAdditional].quantity += newProduct.additionals[findedAdditional].quantity
        }
    });
    return findProduct
}

export default {
    state: {
        storeCart: [],
    },
    mutations: {
        [ADD_ITEM]: (state, product) => {
            const finded = state.storeCart.findIndex(item => item.id === product.id)
            if(finded >= 0){
                state.storeCart[finded] = calculateInvoice(overFlowProduct(state.storeCart[finded], product))
                return
            }
            return state.storeCart.push(calculateInvoice(product));
        },
        [REMOVE_ITEM]: (state, index) => {
            state.storeCart.splice(index, 1);
        },
        [REMOVE_ADDITIONAL]: (state, item) => {
            let product = state.storeCart[item.product_index]

            if(product.additionals.length > 0) {
                const additionalIndex = product.additionals.findIndex(o => o.id === item.additional_id);
                product.additionals.splice(additionalIndex, 1);

                state.storeCart[item.product_index] = calculateInvoice(product)
            }
        },
        [CHANGE_QUANTITY]: (state, value) => {
            const idx = state.storeCart.findIndex(o => o.id === value.id);
            let product = state.storeCart[idx]
            product.quantity = value.quantity

            state.storeCart[idx] = calculateInvoice(product)
        },
    },
    getters: {
        [GET_CART_PRODUCTS_LIST]: (state) => {
            let list = state.storeCart.map(function (productElement) {
                return {
                    id: productElement.id,
                    quantity: productElement.quantity,
                    additionals: productElement.additionals.map(function (additionalsElement) {
                        return {
                            id: additionalsElement.id,
                            quantity: additionalsElement.quantity,
                        }
                    }),
                }
            })
            return list
        },
        [GET_CART]: (state) => {
            return state.storeCart
        },
        [CART_COUNT]: (state) => {
            return state.storeCart.length
        },
        [GET_CART_TOTAL_PRICE]: (state) => {
            let total = state.storeCart.reduce(function (initial, current) {
                let moneyTotal =  MoneyService.convertAmountToFloat(current.invoice.total_amount)
                return initial.add(moneyTotal);
            }, MoneyService.convertFloatToMoney("0.00"));

            return total.toFormat()
        },
        [GET_CART_TOTAL_MONEY]: (state) => {
            let total = state.storeCart.reduce(function (initial, current) {
                let moneyTotal =  MoneyService.convertAmountToFloat(current.invoice.total_amount)
                return initial.add(moneyTotal);
            }, MoneyService.convertFloatToMoney("0.00"));

            return total
        },
        [GET_INVOICE]: (state) => {
            return formatTotalInvoice(state.storeCart)
        },
    },
    actions: {
        [ADD_ITEM]: ({ commit }, product) => {
            commit(ADD_ITEM, product)
        },
        [REMOVE_ADDITIONAL]: ({ commit }, index) => {
            commit(REMOVE_ADDITIONAL, index)
        },
        [REMOVE_ITEM]: ({ commit }, index) => {
            commit(REMOVE_ITEM, index)
        },
        [CHANGE_QUANTITY]: ({ commit }, value) => {
            commit(CHANGE_QUANTITY, value)
        }
    }
};
