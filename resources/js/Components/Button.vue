<template>
    <button
        :type="type"
        class="text-white bg-sys_primary-600 hover:bg-sys_primary-700 focus:ring-sys_primary-500 inline-flex justify-center px-4 py-2 text-sm font-medium border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
    >
        <slot />
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
