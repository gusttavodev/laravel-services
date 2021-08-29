<template>
  <div class="bg-personal-colors-primary text-content-color">
    <header class="relative">
      <nav aria-label="Top" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="border-b border-gray-200">
          <div class="h-16 flex items-center justify-between">
            <div class="flex-1 flex items-center lg:hidden">
              <a href="#" class="ml-2 p-2  hover:text-gray-500">
                <span class="sr-only">Search</span>
                <SearchIcon class="w-6 h-6" aria-hidden="true" />
              </a>
            </div>

            <a href="#" class="flex">
              <span class="sr-only">Workflow</span>
              <h1 class="h-8 w-auto"> {{$page.props.establishment.data.name}} </h1>
            </a>

            <div class="flex-1 flex items-center justify-end">
              <!-- Search -->
              <a href="#" class="hidden ml-6 p-2  hover:text-gray-500 lg:block">
                <span class="sr-only">Search</span>
                <SearchIcon class="w-6 h-6" aria-hidden="true" />
              </a>

              <!-- Account -->
              <a href="#" class="p-2  hover:text-gray-500 lg:ml-4">
                <span class="sr-only">Account</span>
                <UserIcon class="w-6 h-6" aria-hidden="true" />
              </a>

              <!-- Cart -->
              <div class="ml-4 flow-root lg:ml-6">
                <a href="#" class="group -m-2 p-2 flex items-center">
                  <ShoppingBagIcon class="flex-shrink-0 h-6 w-6  group-hover:text-gray-500" aria-hidden="true" />
                  <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">0</span>
                  <span class="sr-only">items in cart, view bag</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
  </div>
</template>

<script>
import { MenuIcon, SearchIcon, ShoppingBagIcon, UserIcon, XIcon } from '@heroicons/vue/outline'

export default {
  name: 'MenuLayoutHeader',
  components: {
    MenuIcon, SearchIcon, ShoppingBagIcon, UserIcon, XIcon
  }
}
</script>
