<template>
<div>
      <img
        class="object-cover w-full h-32 lg:h-48"
        :src="$page.props.establishment.data.background_picture"
        alt=""
      />
    </div>
    <div class="max-w-5xl px-4 mx-auto mb-2 sm:px-6 lg:px-8">
      <div class="-mt-12 sm:-mt-16 sm:flex sm:items-end sm:space-x-5">
        <div class="flex">
          <img
            class="w-24 h-24 rounded-full sm:h-32 sm:w-32"
            :src="$page.props.establishment.data.picture"
            alt=""
          />
        </div>
        <div
          class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1"
        >
          <div class="flex-1 min-w-0 mt-6 sm:hidden md:block">
            <h1 class="text-2xl font-bold text-gray-900 truncate">
              {{ $page.props.establishment.data.name }}
            </h1>
          </div>
          <div
            class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-y-0 sm:space-x-4"
          >
            <button
              type="button"
              class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
            >
              <MailIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              <span>Login</span>
            </button>
            <button
              type="button"
              class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500"
            >
              <UserAddIcon class="w-5 h-5 mr-2 -ml-1 text-gray-400" aria-hidden="true" />
              <span>Registrar</span>
            </button>
          </div>
        </div>
      </div>
      <div class="flex-1 hidden min-w-0 mt-6 sm:block md:hidden">
        <h1 class="text-2xl font-bold text-gray-900 truncate">
          {{$page.props.establishment.data.name}}
        </h1>
      </div>
 </div>
 <div>
    <slot />
 </div>
</template>

<script>
import {
  UserAddIcon,
  MailIcon
} from '@heroicons/vue/solid'

export default {
  name: "MenuHeader",
  components: {
    MailIcon,
    UserAddIcon
  },
  data() {
    return {

    }
  },
  methods: {

  },
}
</script>
