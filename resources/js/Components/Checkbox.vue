<template>
    <input
        type="checkbox" :value="value" v-model="proxyChecked"
        @input="onChangeInput"
        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    >
</template>

<script>
export default {
    emits: ['update:checked'],

    props: {
        checked: {
            type: [Array, Boolean],
            default: false,
        },
        value: {
            default: null,
        },
    },
    methods: {
        onChangeInput(){
            // this.$emit('onChangeInput', this.proxyChecked)
        }
    },
    computed: {
        proxyChecked: {
            get() {
                return this.checked;
            },

            set(val) {
                this.$emit('onChangeInput', this.proxyChecked)
                this.$emit("update:checked", val);
            },
        },
    },
}
</script>
