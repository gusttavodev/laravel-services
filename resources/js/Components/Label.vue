<template>
    <label class="block font-medium text-sm text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script>
import { ExclamationCircleIcon } from '@heroicons/vue/solid'

    export default {
        props: ['value'],
        components: {
            ExclamationCircleIcon,
        }
    }
</script>
