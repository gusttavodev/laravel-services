<template>
<div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
    <div class="px-5 py-5 bg-gray-50 border-t border-y shadow">
        <slot name="body"></slot>
    </div>
    <div class="py-3 bg-gray-50 border-t border-y shadow smt-lg px-4 sm:rounded-b-lg">
        <slot name="footer"></slot>
    </div>
</div>

</template>

<script>
export default {
  name: "search-card"
}
</script>
