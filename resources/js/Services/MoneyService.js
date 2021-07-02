import Dinero from 'dinero.js';
const Money = Dinero;

export default {
  convertFloatToMoney(amount, currency = 'BRL') {
    const precision = amount.toString().split('.')[1].length
    const amountInMinimalUnit = Math.round(Number(amount) * Math.pow(10, precision))

    return Money({ amount: amountInMinimalUnit, currency: currency, precision: precision })
  },
}
