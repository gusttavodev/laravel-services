<template>
    <inertia-link
        v-if="type == 'redirect'"
        :href="href"
        :method="method"
        type="button"
        class="
            text-button-text bg-personal-colors-button-background hover:bg-personal-colors-button-hover  focus:ring-personal-colors-button-background

            flex justify-center items-center px-6 py-2 border border-transparent rounded-md
            shadow-sm text-base font-medium
        "
    >
        <slot />
    </inertia-link>
    <button
        v-else
        :type="type"
        class="
            text-button-text bg-personal-colors-button-background hover:bg-personal-colors-button-hover  focus:ring-personal-colors-button-background

            flex justify-center items-center px-6 py-3 border border-transparent rounded-md
            shadow-sm text-base font-medium"
        >
        <slot />
    </button>
</template>

<script>
    export default {
        name: "establishment-button",
        props: {
            type: {
                type: String,
                default: 'submit',
            },
            href: {
                type: String,
                default: "#",
            },
            method: {
                type: String,
                default: 'get'
            },
        }
    }
</script>
