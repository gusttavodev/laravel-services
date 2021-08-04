import {
    GET_SHOW_ORDER, GET_STEPS, GET_CURRENT_STEP, GET_CONTACT_INFORMATION,
    GET_ADDRESS_INFORMATION, GET_DELIVERY_MODE, GET_DELIVERY_TAX, GET_CHANGE_PRICE,
    SET_SHOW_ORDER, SET_CONTACT_INFORMATION, SET_ADDRESS_INFORMATION,
    SET_PAYMENT_MODE, SET_DELIVERY_MODE, SET_DELIVERY_TAX, SET_CHANGE_PRICE,
    NEXT_STEP, PREVIOUS_STEP,
    CREATE_ORDER, GET_ORDER
} from "@/store/mutationsTypes/Order";

import MoneyService from '@/Services/MoneyService'

export default {
    state: {
        showOrder: false,
        order: {
            currentStep : { id: 0 , name: 'Informações de Contato',   status: 'current' },
            steps: [
                { id: 0 , name: 'Informações de Contato',   status: 'current' },
                { id: 1 , name: 'Informações de Entrega',   status: 'upcoming' },
                { id: 2 , name: 'Informações de Pagamento', status: 'upcoming' },
            ],
            form: {
                contact_phone: "",
                contact_name: "",

                delivery_mode: 0,
                address: {
                    zip_code: "",
                    street: "",
                    city: "",
                    country: "",
                    district: "",
                    state: "",
                    number: "",
                    complement: "",
                    latitude: "",
                    longitude: ""
                },

                delivery_tax: "0.00",

                payment_mode: 0,
                need_change: false,
                change_price: "0.00",
            }
        }
    },
    mutations: {
        [SET_SHOW_ORDER]: (state, showOrder) => {
            state.showOrder = showOrder
        },

        [SET_CONTACT_INFORMATION]: (state, form) => {
            state.order.form.contact_phone = form.contact_phone
            state.order.form.contact_name = form.contact_name
        },
        [SET_ADDRESS_INFORMATION]: (state, address) => {
            state.order.form.address = address
        },
        [SET_DELIVERY_MODE]: (state, delivery_mode) => {
            state.order.form.delivery_mode = delivery_mode
        },
        [SET_DELIVERY_TAX]: (state, delivery_tax) => {
            console.log("delivery_tax => ", delivery_tax)
            state.order.form.delivery_tax = delivery_tax
            console.log("state.order.form.delivery_tax => ", state.order.form.delivery_tax)
        },
        [SET_CHANGE_PRICE]: (state, change_price) => {
            state.order.form.change_price = change_price
        },
        [SET_PAYMENT_MODE]: (state, payment_mode) => {
            state.order.form.need_change = false
            if (payment_mode == 0) state.order.form.need_change = true
            state.order.form.payment_mode = payment_mode
        },

        [NEXT_STEP]: (state, step) => {
            const idx = state.order.steps.findIndex(o => o.id === step.id);
            state.order.steps[idx].status = "complete"
            state.order.currentStep = state.order.steps[idx+1]
        },
        [PREVIOUS_STEP]: (state, step) => {
            const idx = state.order.steps.findIndex(o => o.id === step.id);

            state.order.currentStep = state.order.steps[idx-1]
        },

        [CREATE_ORDER]: (state) => {
            state = {
                showOrder: false,
                order: {
                currentStep : { id: 0 , name: 'Informações de Contato',   status: 'current' },
                steps: [
                    { id: 0 , name: 'Informações de Contato',   status: 'current' },
                    { id: 1 , name: 'Informações de Entrega',   status: 'upcoming' },
                    { id: 2 , name: 'Informações de Pagamento', status: 'upcoming' },
                ],
                    form: {
                        contact_phone: "",
                        contact_name: "",

                        delivery_mode: 0,
                        address: {
                            zip_code: "",
                            street: "",
                            city: "",
                            country: "",
                            district: "",
                            state: "",
                            number: "",
                            complement: "",
                            latitude: "",
                            longitude: ""
                        },

                        delivery_tax: "0.00",

                        payment_mode: 0,
                        need_change: false,
                        change_price: "0.00",
                    }
                }
            }
        },
    },
    getters: {
        [GET_DELIVERY_TAX]: (state) => {
            return MoneyService.convertFloatToMoney(state.order.form.delivery_tax)
        },
        [GET_CHANGE_PRICE]: (state) => {
            return state.order.form.change_price
        },

        [GET_SHOW_ORDER]: (state) => {
            return state.showOrder
        },
        [GET_STEPS]: (state) => {
            return state.order.steps
        },
        [GET_CURRENT_STEP]: (state) => {
            return state.order.currentStep
        },

        [GET_CONTACT_INFORMATION]: (state) => {
             return {
                contact_phone: state.order.form.contact_phone,
                contact_name: state.order.form.contact_name
            }
        },
        [GET_ADDRESS_INFORMATION]: (state) => {
            if (state.order.form.address == null) {
                state.order.form.address = {
                    zip_code: "",
                    street: "",
                    city: "",
                    country: "",
                    district: "",
                    state: "",
                    number: "",
                    complement: "",
                    latitude: "",
                    longitude: ""
                }
            }
            return {
                zip_code: state.order.form.address.zip_code,
                street: state.order.form.address.street,
                city: state.order.form.address.city,
                country: state.order.form.address.country,
                district: state.order.form.address.district,
                state: state.order.form.address.state,
                number: state.order.form.address.number,
                complement: state.order.form.address.complement
            }
        },
        [GET_DELIVERY_MODE]: (state) => {
            return state.order.form.delivery_mode
        },

        [GET_ORDER]: (state) => {
            return state.order.form
        },
    },
    actions: {
        [SET_SHOW_ORDER]: ({ commit }, showOrder) => {
            commit(SET_SHOW_ORDER, showOrder)
        },

        [SET_CONTACT_INFORMATION]: ({ commit }, contact_information) => {
            commit(SET_CONTACT_INFORMATION, contact_information)
        },
        [SET_ADDRESS_INFORMATION]: ({ commit }, address) => {
            commit(SET_ADDRESS_INFORMATION, address)
        },
        [SET_DELIVERY_MODE]: ({ commit }, delivery_mode) => {
            commit(SET_DELIVERY_MODE, delivery_mode)
        },

        [SET_DELIVERY_TAX]: ({ commit }, delivery_tax) => {
            commit(SET_DELIVERY_TAX, delivery_tax)
        },
        [SET_CHANGE_PRICE]: ({ commit }, change_price) => {
            commit(SET_CHANGE_PRICE, change_price)
        },

        [SET_PAYMENT_MODE]: ({ commit }, payment_mode) => {
            commit(SET_PAYMENT_MODE, payment_mode)
        },

        [NEXT_STEP]: ({ commit }, step) => {
            commit(NEXT_STEP, step)
        },
        [PREVIOUS_STEP]: ({ commit }, step) => {
            commit(PREVIOUS_STEP, step)
        },

        [CREATE_ORDER]: ({ commit }) => {
            commit(CREATE_ORDER)
        }
    }
};
