<template>
  <div
    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
  >
    <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
      {{ label }}
    </label>
    <div class="mt-1 sm:mt-0 sm:col-span-2">
      <input
        type="text"
        :name="name"
        :id="id"

        placeholder="0.00"
        @keypress="verifyKey"
        @input="$emit('update:modelValue', $event.target.value)"
        v-model="internalValue"
        class="block w-full max-w-lg border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:max-w-xs sm:text-sm"

        :required="required"
        ref="input"
      />
      <div v-if="error" class="mt-2 text-sm text-sys_error-700">{{ error }}</div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'v-input-money',
    inheritAttrs: false,
    props: {
        id: {
        type: String,
        default() {
            return `text-input-id`
        },
        },
        name: {
        type: String,
        default() {
            return `text-input-name`
        },
        },
        type: {
        type: String,
        default: 'text',
        },
        value: String,
        label: String,
        error: String,
        required: {
        type: Boolean,
        default() {
            return false
        },
        },
    },
    data() {
        return {
            internalValue       : this.value,
            moneySumbol         : 'R$',
            moneyTarget         : 'BRL'
        }
    },
    methods : {
        focus() {
        this.$refs.input.focus()
    },
    select() {
        this.$refs.input.select()
    },
    setSelectionRange(start, end) {
        this.$refs.input.setSelectionRange(start, end)
    },
        validateFormat(value){
            if(value == '')
                return true;
            return /^[0-9]+(\.[0-9]{1,2})?$|^[0-9]+\.$|^[0-9]+\.[0-9]{1,2}$/gm.test(value);
        },
        verifyKey(event){
            var currentValue = '';
            if(this.internalValue)
            {
                currentValue = this.internalValue;
            }

            currentValue += event.key;

            if(!this.validateFormat(currentValue)){
                event.preventDefault();
            }
        }
    },
    watch: {
        value:  function(newValue){
            if(!this.validateFormat(newValue))
                return;
            this.$nextTick(()=>{
                this.internalValue = newValue;
            })
        }
    },
    model: {
        prop: "value",
        event: "update"
    }
}
</script>
