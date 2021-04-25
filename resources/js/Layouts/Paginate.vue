<template>
  <div class="flex items-center justify-between px-4 py-3 bg-white sm:px-6 sm:rounded-b-lg">
    <div class="flex justify-between flex-1 sm:hidden">
      <a
        href="#"
        class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500"
      >
        Previous
      </a>
      <a
        href="#"
        class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:text-gray-500"
      >
        Next
      </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Página
          {{ ' ' }}
          <span class="font-medium">{{ meta.current_page }}</span>
          {{ ' ' }}
          de
          {{ ' ' }}
          <span class="font-medium">{{ meta.last_page }}</span>
          {{ ' ' }}
          |
          {{ ' ' }}
          <span class="font-medium">{{ meta.total }}</span>
          {{ ' ' }}
          resultados
        </p>
      </div>
      <div>
        <nav
          class="relative z-0 inline-flex -space-x-px rounded-md shadow-sm"
          aria-label="Pagination"
        >
          <inertia-link
            v-if="links.prev"
            :href="links.prev"
            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50"
          >
            <span class="sr-only">Anterior</span>
            <ChevronLeftIcon class="w-5 h-5" aria-hidden="true" />
          </inertia-link>

          <inertia-link
            v-if="links.next"
            :href="links.next"
            class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50"
          >
            <span class="sr-only">Next</span>
            <ChevronRightIcon class="w-5 h-5" aria-hidden="true" />
          </inertia-link>
        </nav>
      </div>
    </div>
  </div>
</template>

<script>
import { ChevronLeftIcon, ChevronRightIcon } from '@heroicons/vue/solid'

export default {
  name: 'Paginate',
  components: {
    ChevronLeftIcon,
    ChevronRightIcon,
  },
  props: {
    meta: Object,
    links: Object,
  },
}
</script>

<style></style>
