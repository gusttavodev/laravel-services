import {
    SET_PAYMENT_MODE,
    SET_DELIVERY_MODE,
    SET_ADDRESS_INFORMATION,
    SET_CONTACT_INFORMATION,

    GET_ORDER,
    GET_DELIVERY_TAX,
    GET_VALUE_PAID_CASH
} from "@/store/mutationsTypes/Order";

import MoneyService from '@/Services/MoneyService'

export default {
    state: {
        order: {
            form: {
                contact_phone: "",
                contact_name: "",

                zip_code: "",
                street: "",
                city: "",
                country: "",
                district: "",
                state: "",
                number: "",
                complement: "",
                latitude: "",
                longitude: "",

                need_change: false,
                change_price: "0.00",
                value_paid_cash: "0.00",


                delivery_mode: null,
                delivery_tax: "0.00",
                payment_mode: null,
            }
        }
    },
    mutations: {
        [SET_DELIVERY_MODE]: (state, data) => {
            state.order.form.delivery_tax = "0.00"
            state.order.form.delivery_mode = data.delivery_mode
            if(state.order.form.delivery_mode == 0)  state.order.form.delivery_tax = data.delivery_tax
        },
        [SET_PAYMENT_MODE]: (state, form) => {
            state.order.form.payment_mode = form
        },
        [SET_ADDRESS_INFORMATION]: (state, address) => {
            state.order.form.zip_code = address?.zip_code
            state.order.form.city = address?.city
            state.order.form.complement = address?.complement
            state.order.form.country = address?.country
            state.order.form.district = address?.district
            state.order.form.state = address?.state
            state.order.form.street = address?.street
            state.order.form.number = address?.number
        },
        [SET_CONTACT_INFORMATION]: (state, contactInformation) => {
            state.order.form.contact_name = contactInformation?.contact_name
            state.order.form.contact_phone = contactInformation?.contact_phone
        }
    },
    getters: {
        [GET_DELIVERY_TAX]: (state) => {
            return MoneyService.convertFloatToMoney(state.order.form.delivery_tax)
        },

        [GET_ORDER]: (state) => {
            return state.order.form
        },

        [GET_VALUE_PAID_CASH]: (state) => {
            return MoneyService.convertFloatToMoney(state.order.form.value_paid_cash)
        },
    },
    actions: {
        [SET_DELIVERY_MODE]: ({ commit }, data) => {
            commit(SET_DELIVERY_MODE, data)
        },
        [SET_PAYMENT_MODE]: ({ commit }, payment_mode) => {
            commit(SET_PAYMENT_MODE, payment_mode)
        },
        [SET_ADDRESS_INFORMATION]: ({ commit }, address) => {
            commit(SET_ADDRESS_INFORMATION, address)
        },
        [SET_CONTACT_INFORMATION]: ({ commit }, contactInformation) => {
            commit(SET_CONTACT_INFORMATION, contactInformation)
        },
    }
};
