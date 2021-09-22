import Dinero from 'dinero.js';
const Money = Dinero;

export default {
    convertFloatToMoney(amount, currency = 'BRL', precision = 2) {
        if(amount.toString().split('.')[1]){
            precision = amount.toString().split('.')[1].length
        }

        const amountInMinimalUnit = Math.round(Number(amount) * Math.pow(10, precision))

        return Money({ amount: amountInMinimalUnit, currency: currency, precision: precision })
    },
    convertAmountToFloat(amount, currency = 'BRL') {
        return Money({ amount: amount, currency: currency, precision: 2 })
    },
}
