<template>
  <div
    class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8"
  >
    <div class="flex-1 min-w-0">
      <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">{{ title }}</h1>
    </div>
    <div class="flex mt-4 sm:mt-0 sm:ml-4">
      <inertia-link
        :href="buttonAction"
        type="button"
        class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-sys_primary-600 order-0 hover:bg-sys_primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3"
        >{{ buttonText }}
      </inertia-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Header',
  props: {
    title: Object,
    buttonText: Object,
    buttonAction: Function,
  },
}
</script>

<style></style>
