<template>
   <div class="flex">
        <input
            :id="id"
            aria-describedby="comments-description"
            name="comments" type="checkbox"
            class="focus:ring-sys_primary-500 h-4 w-4 text-sys_primary-600 border-gray-300 rounded"
            @input="onChangeInput"
            :value="value"
            v-model="proxyChecked"
        />
        <label v-if="label" :for="id" class="block text-sm font-medium text-gray-700 px-2">
            {{ label }}
        </label>
   </div>
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
        label: {
            type: [String, Number],
            default: "",
        },
        id: {
            type: [String, Number],
            default: "",
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
